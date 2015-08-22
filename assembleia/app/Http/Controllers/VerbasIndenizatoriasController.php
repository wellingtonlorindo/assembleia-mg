<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VerbasIndenizatoriasController extends Controller
{

    /**
     * Exibe a listagem do gasto total em verbas indenizatórias por
     * categoria no ano de 2014 ordenados do maior para o menor
     * @return void
     */
    public function index()
    {
        /*$serviceVerbaIndenizatoria = $this->Service->get('VerbaIndenizatoria');
        $totalAnualPorCategoria = $serviceVerbaIndenizatoria->buscarTotalAnualPorCategoria();

        $serviceTipoDespesa = $this->Service->get('TipoDespesa');
        $tiposDespesa = $serviceTipoDespesa->selectFormat('descTipoDespesa');

        $this->set(compact('totalAnualPorCategoria', 'tiposDespesa'));*/
    }

    /**
     * Mostra os top 5 deputados que mais gastaram verbas na categoria
     * informada
     *
     * @param number $codTipoDespesa id da categoria
     * @return void
     */
    public function topCincoDeputadosCategoria($codTipoDespesa)
    {
        /*$serviceDeputado = $this->Service->get('Deputado');
        $topDeputados = $serviceDeputado->buscarTopDeputadosPorDespesa($codTipoDespesa);
        
        $serviceTipoDespesa = $this->Service->get('TipoDespesa');
        $tiposDespesa = $serviceTipoDespesa->selectFormat('descTipoDespesa');

        $this->set(compact('topDeputados', 'tiposDespesa', 'codTipoDespesa'));*/
    }
}
