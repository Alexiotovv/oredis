<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('disc_id')->unsigned();
            $table->foreign('disc_id')->references('id')->on('discapacitados')->onDelete('cascade');
            $table->bigInteger('ubigeo_id')->unsigned();
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos')->onDelete('cascade');
            $table->string('direccion', 250)->nullable()->default('');
            $table->string('numero', 150)->nullable()->default('');
            $table->boolean('activo')->default(false);
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
        Schema::dropIfExists('direcciones');
    }
}
