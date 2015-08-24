@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xs-12">
    <br >
        <div class="page-header">
            <h3><?= $topDeputados[0]->descTipoDespesa;?></h3>
        </div>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Top 5 deputados que mais gastaram verbas em 2014</th>
            </tr>
            <tr>
                <th>Deputado</th>
                <th>Partido</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
        
        <?php 
            $total = 0;

            foreach ($topDeputados as $deputado): 
                $total += $deputado->valor;
        ?>
            <tr>
                <td><?= $deputado->nome ?></td>
                <td><?= $deputado->partido ?></td>
                <td><?= 'R$ ' . number_format($deputado->valor, 2, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>
            <tr>
                <td colspan="2">Total</td>
                <td><?= 'R$ ' . number_format($total, 2, ',', '.') ?></td>
            </tr>
        </tbody>
        </table>
    </div>

    <div class="btn_voltar">
        <a target="_self" href="javascript:history.back();">
            <strong>&lt;&lt; Voltar</strong>
        </a>
    </div>
    
</div>

@endsection
