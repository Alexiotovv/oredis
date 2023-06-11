<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApoderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idDisc')->unsigned();
            $table->foreign('idDisc')->references('id')->on('discapacitados')->onDelete('cascade');
            $table->string('dni', 100)->nullable()->default('text');
            $table->string('nombres', 100)->nullable()->default('text');
            $table->string('apellidos', 100)->nullable()->default('text');
            $table->string('direccion', 100)->nullable()->default('text');
            $table->string('parentesco', 100)->nullable()->default('text');
            $table->string('correo', 100)->nullable()->default('text');
            $table->string('telefono', 100)->nullable()->default('text');
            $table->boolean('status')->nullable()->default(true);//indica si está activo o no
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
        Schema::dropIfExists('apoderados');
    }
}
