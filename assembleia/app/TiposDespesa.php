<?php

namespace App;

use App\BaseModel;

class TiposDespesa extends BaseModel
{
	protected $fillable = array(
		'idDeputado',
		'codTipoDespesa',
		'dataReferencia',
		'valor'
	);

	public static function getModel()
	{
		return new TiposDespesa();
	}

    public function verbasIndenizatorias()
    {
    	return $this->hasMany('App\VerbasIndenizatoria');
    }
}
