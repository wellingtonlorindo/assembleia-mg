<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelasDeputadoETipoDespesaEVerbaIndenizatoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deputados', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome')->default('');
            $table->string('partido')->default('');
            $table->timestamps();
        });
 
        Schema::create('tipos_despesas', function(Blueprint $table) {
            $table->increments('codTipoDespesa');
            $table->text('descTipoDespesa')->default('');
            $table->timestamps();
        });

        Schema::create('verbas_indenizatorias', function(Blueprint $table) {
            $table->increments('idVerba');
            $table->integer('idDeputado')->unsigned()->default(0);
            $table->foreign('idDeputado')->references('id')->on('deputados')->onDelete('cascade');
            $table->integer('codTipoDespesa')->unsigned()->default(0);
            $table->foreign('codTipoDespesa')->references('codTipoDespesa')->on('tipos_despesas')->onDelete('cascade');
            $table->text('dataReferencia')->default('');
            $table->numeric('valor')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deputados');
        Schema::drop('tipos_despesas');
        Schema::drop('verbas_indenizatorias');
    }
}
