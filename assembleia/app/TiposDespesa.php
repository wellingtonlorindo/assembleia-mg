<?php

namespace App;

use App\BaseModel;

class TiposDespesa extends BaseModel
{
	/**
	 * Campos que podem ser preenchidos
	 * @var array
	 */
	protected $fillable = array(
		'idDeputado',
		'codTipoDespesa',
		'dataReferencia',
		'valor'
	);

	/**
	 * Busca uma instância do model
	 * @return App\TiposDespesa objeto
	 */
	public static function getModel()
	{
		return new TiposDespesa();
	}

	/**
	 * Um tipo de despesa tem muitas verbas indenizatórias
	 * @return void
	 */
    public function verbasIndenizatorias()
    {
    	return $this->hasMany('App\VerbasIndenizatoria');
    }
}
