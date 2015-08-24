<?php

namespace App\Services;

Interface IServices {

	/**
	 * Busca a tabela do serviço
	 * @return Illuminate\Database\Query\Builder tabela
	 */
	public function getTable();

	/**
	 * Cria uma instância do serviço
	 * @return object
	 */
	public static function getService();
	
}