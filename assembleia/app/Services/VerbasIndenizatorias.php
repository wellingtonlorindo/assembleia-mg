<?php

namespace App\Services;

use App\Services\IServices;
use App\VerbasIndenizatoria as ModelVerbas;
use App\Services\AssembleiaWs;
use DB;

class VerbasIndenizatorias implements IServices
{
    /**
     * tabela do serviço
     * @var Illuminate\Database\Query\Builder tabela verbas_indenizatorias
     */
    private $table;

    public function __construct()
    {
        $this->table = DB::table('verbas_indenizatorias');
    }

    /**
     * Busca a tabela do serviço
     * @return Illuminate\Database\Query\Builder tabela verbas_indenizatorias
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Cria uma instância do serviço
     * @return App\Services\VerbasIndenizatorias
     */
	public static function getService()
	{
		return new VerbasIndenizatorias();
	}

    /**
     * Busca o total anual por tipo de despesa do ano informado
     * @param  number $ano - o ano de 2014 é o padrão
     * @return stdClass[] lista de depesas 
     */
    public function buscarTotalAnualPorCategoria($ano = AssembleiaWs::ANO_PADRAO)
    {
    	$between = array(
    		$ano.'-01-01',
            $ano.'-12-31' 
    	);
        
        return $this->getTable()
            ->join('tipos_despesas', 'tipos_despesas.codTipoDespesa', '=', 'verbas_indenizatorias.codTipoDespesa')
            ->selectRaw('verbas_indenizatorias.codTipoDespesa, sum(valor) as valor, tipos_despesas.descTipoDespesa')
            ->whereBetween('dataReferencia', $between)
            ->groupBy('verbas_indenizatorias.codTipoDespesa')
            ->orderBy('valor', 'desc')
            ->get();
    }
}
