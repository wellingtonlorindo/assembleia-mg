<?php

namespace App;

use App\BaseModel;

class VerbasIndenizatoria extends BaseModel
{
	/**
	 * Campos que podem ser preenchidos
	 * @var array
	 */
	protected $fillable = array(
		'codTipoDespesa',
		'descTipoDespesa'
	);

	/**
	 * Busca uma instância do model
	 * @return App\VerbasIndenizatoria objeto
	 */
	public static function getModel()
	{
		return new VerbasIndenizatoria();
	}

	/**
	 * Uma verba indenizatória pertence a um deputado
	 * @return void
	 */
    public function deputado()
    {
    	return $this->belongsTo('App\Deputado');
    }

    /**
     * Uma verba tem um tipo de despesa
     * @return void
     */
    public function tipoDespesa()
    {
    	return $this->hasOne('App\TiposDespesa');
    }
}
