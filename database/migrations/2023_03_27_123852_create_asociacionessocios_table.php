<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsociacionessociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacionessocios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idasociaciones')->unsigned();
            $table->foreign('idasociaciones')->references('id')->on('asociaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_socio', 100)->nullable()->default('');
            $table->string('apellido_socio', 100)->nullable()->default('');
            $table->string('tipo_socio', 100)->nullable()->default('');
            $table->string('celular_socio', 100)->nullable()->default('');
            $table->string('correo_socio', 100)->nullable()->default('');
            $table->string('tipo_discapacidad', 100)->nullable()->default('');
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
        Schema::dropIfExists('asociacionessocios');
    }
}
