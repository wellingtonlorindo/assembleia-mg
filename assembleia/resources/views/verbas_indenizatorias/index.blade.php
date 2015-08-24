@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xs-12">
    <br >
        <div class="page-header">
            <h3>Gastos com verbas indenizatórias em 2014</h3>
        </div>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (empty($totalAnualPorCategoria)) {
        ?>
            <tr>
                <td colspan="2">Nenhum valor encontrado.</td>
            </tr>
        <?php 
            }

            $total = 0;

            foreach ($totalAnualPorCategoria as $categoria): 
                $total += $categoria->valor;
        ?>
            <tr>
                <td><?= $categoria->descTipoDespesa; ?></td>
                <td><?= 'R$ ' . number_format($categoria->valor, 2, ',', '.')?></td>
                <td>
                    <a href="/topCincoDeputadosCategoria/<?= $categoria->codTipoDespesa?>">
                        Ver top 5 Deputados
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>
            <tr>
                <td>Total</td>
                <td><?= 'R$ ' . number_format($total, 2, ',', '.') ?></td>
                <td></td>
            </tr>
        </tbody>
        </table>
    </div>
    
</div>
@endsection
