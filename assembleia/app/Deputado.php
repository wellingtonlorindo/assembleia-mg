<?php

namespace App;

use App\BaseModel;

class Deputado extends BaseModel
{
	/**
	 * Campos que podem ser preenchidos
	 * @var array
	 */
	protected $fillable = array(
		'id',
		'nome',
		'partido'
	);

	/**
	 * Busca uma instância do model
	 * @return App\Deputado objeto
	 */
	public static function getModel()
	{
		return new Deputado();
	}

	/**
	 * Um deputado tem muitas verbas indenizatórias
	 * @return void
	 */
    public function verbasIndenizatorias()
    {
    	return $this->hasMany('App\VerbasIndenizatoria');
    }

}
