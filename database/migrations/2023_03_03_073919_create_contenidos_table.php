<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id();
            $table->string('texto_banner', 60)->nullable()->default('Bienvenido al portal de personas con capacidades diferentes.');
            $table->string('pie_banner', 72)->nullable()->default('Brindamos un portal de administración para el registro de las personas.');
            $table->string('foto_banner',250)->nullable();
            $table->string('foto_objetivo', 250)->nullable()->default('');
            $table->text('objetivo')->nullable();
            $table->string('texto_evento',78)->nullable();
            $table->text('pie_evento')->nullable();
            $table->string('telefono', 20)->nullable()->default('+51 99999999');
            $table->string('correo', 50)->nullable()->default('correo@mail.com');
            $table->string('direccion', 150)->nullable()->default('Av. Quiñonez');
            $table->string('nombre_enlace1', 100)->nullable()->default('enlaceinterés1');
            $table->string('enlace1', 100)->nullable()->default('enlace.com');
            $table->string('nombre_enlace2', 100)->nullable()->default('enlaceinterés2');
            $table->string('enlace2', 100)->nullable()->default('enlace2.com');
            $table->string('nombre_enlace3', 100)->nullable()->default('enlaceinterés3');
            $table->string('enlace3', 100)->nullable()->default('enlace3.com');
            // $table->char('defecto', 4)->default('0');
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
        Schema::dropIfExists('contenidos');
    }
}
