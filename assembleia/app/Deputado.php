<?php

namespace App;

use App\BaseModel;

class Deputado extends BaseModel
{
	protected $fillable = array(
		'id',
		'nome',
		'partido'
	);

	public static function getModel()
	{
		return new Deputado();
	}

    public function verbasIndenizatorias()
    {
    	return $this->hasMany('App\VerbasIndenizatoria');
    }

}
