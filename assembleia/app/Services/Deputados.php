<?php

namespace App\Services;

use App\Deputado as ModelDeputados;
use DB;

class Deputados implements IServices
{
    /**
     * tabela do serviço
     * @var Illuminate\Database\Query\Builder tabela deputados
     */
	private $table;

    public function __construct()
    {
        $this->table = DB::table('deputados');
    }

    /**
     * Busca a tabela do serviço
     * @return Illuminate\Database\Query\Builder tabela deputados
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Cria uma instância do serviço
     * @return App\Services\Deputados
     */
	public static function getService()
	{
		return new Deputados();
	}

	/**
     * Busca os deputados que mais gastaram verbas na categoria informada
     * @param  number  $codTipoDespesa código da categoria
     * @param  integer $limite quantidade de deputados. O limite padrão é 5
     * @return stdClass[] lista de deputados
     */
    public function buscarTopDeputadosPorDespesa($codTipoDespesa, $limite = 5)
    {
    	$topDeputados = $this->getTable()
            ->join('verbas_indenizatorias', 'verbas_indenizatorias.idDeputado', '=', 'deputados.id')
            ->join('tipos_despesas', 'tipos_despesas.codTipoDespesa', '=', 'verbas_indenizatorias.codTipoDespesa')
            ->selectRaw('deputados.nome, deputados.partido, verbas_indenizatorias.valor, tipos_despesas.descTipoDespesa')
            ->where('verbas_indenizatorias.codTipoDespesa', $codTipoDespesa)
            ->orderBy('verbas_indenizatorias.valor', 'desc');

        if (!empty($limite)) {
            $topDeputados->take($limite);
        }

        return $topDeputados->get();
    }
	
    
}
