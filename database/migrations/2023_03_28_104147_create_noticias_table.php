<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo', 100)->nullable()->default('');
            $table->text('Descripcion')->nullable();
            $table->date('Fecha')->nullable();
            $table->boolean('publicar')->nullable()->default(false);
            $table->boolean('modal')->nullable()->default(false);
            $table->string('archivo', 250)->nullable()->default('');
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
        Schema::dropIfExists('noticias');
    }
}
