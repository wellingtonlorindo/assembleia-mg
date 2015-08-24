<?php

namespace App\Services;

use App\TiposDespesa;

class TiposDespesas implements IServices
{
	private $table;

	/**
	 * Busca a tabela do serviço
	 * @return Illuminate\Database\Query\Builder tabela
	 */
    public function getTable()
    {
        return $this->table;
    }

    /**
	 * Cria uma instância do serviço
	 * @return App\Services\TiposDespesas
	 */
	public static function getService()
	{
		return new TiposDespesas();
	}
}
