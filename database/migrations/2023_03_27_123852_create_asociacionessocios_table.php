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
            $table->bigInteger('iddiscapacitados')->unsigned();
            $table->foreign('iddiscapacitados')->references('id')->on('discapacitados')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipo_socio', 100)->nullable()->default('');
            $table->boolean('status')->default(true);
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
