<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsociacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idUbigeos')->unsigned();
            $table->foreign('idUbigeos')->references('id')->on('ubigeos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_organizacion', 250)->nullable()->default('');
            $table->string('siglas_asociacion', 100)->nullable()->default('');
            $table->string('partida_registral', 100)->nullable()->default('');
            $table->string('direccion', 100)->nullable()->default('');
            $table->string('celular', 50)->nullable()->default('');
            $table->string('correo', 50)->nullable()->default('');
            $table->boolean('status')->nullable()->default(true);
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
        Schema::dropIfExists('asociaciones');
    }
}
