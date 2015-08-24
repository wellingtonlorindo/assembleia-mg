<?php

namespace App\Services;

/**
 * Classe para buscar os dados abertos da Assembléia de MG
 */
class AssembleiaWs implements IServices
{

    /**
     * URL base do webservice da assembleia
     */
    const URL_BASE = 'http://dadosabertos.almg.gov.br/ws/';

    /**
     * Código da legislatura de 2014
     */
    const LEGISLATURA_2014 = 17;

    /**
     * Ano utilizado para buscar a verba dos deputados por padrão
     */
    const ANO_PADRAO = 2014;

    
    public function getTable()
    {

    }

    /**
     * Instancia o Service
     * @return App\Services\AssembleiaWs
     */
    public static function getService()
    {
        return new AssembleiaWs();
    }

    /**
     * Busca as informações da legislatura atual
     * @param  string $formato    formato do retorno - json ou xml
     * @return json|xml
     */
    public static function buscarDadosLegislaturaAtual($formato = 'json')
    {
        $url = self::URL_BASE.'legislaturas/atual?formato='.$formato;
        $dados = self::buscarDados($url);
        return $dados;
    }

    /**
     * Busca as verbas indenizatórias do deputado no ano informado
     * @param  number $idDeputado código do deputado
     * @param  number $ano        o ano em que foi gasto a verba
     * @param  string $formato    formato do retorno - json ou xml
     * @return json|xml
     */
    public static function buscarVerbasIndenizatoriasDeputado($idDeputado, $ano = self::ANO_PADRAO, $formato = 'json')
    {
        $url = self::URL_BASE.'prestacao_contas/verbas_indenizatorias/deputados/'.$idDeputado.'/'.$ano.'/1?formato='.$formato;;
        $dados = self::buscarDados($url);
        return $dados;
    }

    /**
     * Busca os deputados de uma determinada legislatura
     * @param  number $idLegislatura código da legislatura
     * @param  string $formato       formato do retorno - json ou xml
     * @return json|xml
     */
    public static function buscarDeputadosPorLegislatura($idLegislatura = self::LEGISLATURA_2014, $formato = 'json')
    {
        $url = self::URL_BASE.'legislaturas/'.$idLegislatura.'/deputados/em_exercicio?formato='.$formato;
        $dados = self::buscarDados($url);
        return $dados;
    }

    /**
     * Busca os dados de uma url informada
     * @param  string $url endereço onde devem ser buscados os dados
     * @return json|xml
     */
    public static function buscarDados($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $dados = curl_exec($ch);
        curl_close($ch);

        if (!$dados) {
            throw new \Exception('Não foi possível recuperar os dados de '.$url);        
        }

        return $dados;
    }
}
