<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\VerbasIndenizatorias;
use App\Services\Deputados;
use App\Services\TiposDespesas;

class VerbasIndenizatoriasController extends Controller
{

    /**
     * Exibe a listagem do gasto total em verbas indenizatórias por
     * categoria no ano de 2014 ordenados do maior para o menor
     * @return void
     */
    public function index()
    {
        $serviceVerbaIndenizatoria = VerbasIndenizatorias::getService();
        $totalAnualPorCategoria = $serviceVerbaIndenizatoria->buscarTotalAnualPorCategoria();
        
        return view('verbas_indenizatorias.index', compact('totalAnualPorCategoria'));
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
        $serviceDeputado = Deputados::getService();;
        $topDeputados = $serviceDeputado->buscarTopDeputadosPorDespesa($codTipoDespesa);

        return view('verbas_indenizatorias.top_cinco_deputados_categoria', ['topDeputados' => $topDeputados]);

    }
}
