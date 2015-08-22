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
        Schema::create('deputado', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome')->default('');
            $table->string('partido')->default('');
            $table->timestamps();
        });
 
        Schema::create('tipo_despesa', function(Blueprint $table) {
            $table->increments('codTipoDespesa');
            $table->text('descTipoDespesa')->default('');
            $table->timestamps();
        });

        Schema::create('verba_indenizatoria', function(Blueprint $table) {
            $table->increments('idVerba');
            $table->integer('idDeputado')->unsigned()->default(0);
            $table->foreign('idDeputado')->references('id')->on('deputado')->onDelete('cascade');
            $table->integer('codTipoDespesa')->unsigned()->default(0);
            $table->foreign('codTipoDespesa')->references('codTipoDespesa')->on('tipo_despesa')->onDelete('cascade');
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
        Schema::drop('deputado');
        Schema::drop('tipo_despesa');
        Schema::drop('verba_indenizatoria');
    }
}
