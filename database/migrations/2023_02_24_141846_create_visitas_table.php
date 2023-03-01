<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idDireccion')->unsigned();
            $table->foreign('idDireccion')->references('id')->on('direcciones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('altitud',200)->nullable()->default('');
            $table->string('longitud',200)->nullable()->default('');
            $table->string('latitud',200)->nullable()->default('');
            $table->string('comentarios', 250)->nullable()->default('');
            $table->boolean('viveaqui')->default(false);
            $table->bigInteger('Usuario')->unsigned();
            $table->date('FechaVisita');
            $table->foreign('Usuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('visitas');
    }
}
