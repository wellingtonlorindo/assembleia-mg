<?php

namespace App;

use App\BaseModel;

class VerbasIndenizatoria extends BaseModel
{
	protected $fillable = array(
		'codTipoDespesa',
		'descTipoDespesa'
	);

	public static function getModel()
	{
		return new VerbasIndenizatoria();
	}

    public function deputado()
    {
    	return $this->belongsTo('App\Deputado');
    }

    public function tipoDespesa()
    {
    	return $this->hasOne('App\TiposDespesa');
    }
}
