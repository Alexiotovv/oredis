<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscapacitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discapacitados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable()->default('');
            $table->string('apellido_paterno', 100)->nullable()->default('');
            $table->string('apellido_materno', 100)->nullable()->default('');
            $table->string('doc_identidad',10)->nullable()->default('');
            $table->string('nro_doc_identidad',10)->nullable()->unique();
            $table->string('correo',100)->nullable()->default('');
            $table->string('telefono',100)->nullable()->default('');
            $table->date('fecha_nacimiento');
            $table->string('estado_civil',50)->nullable()->default('');
            $table->string('sexo',2)->nullable()->default('');
            $table->string('ocupacion',100)->nullable()->default('');
            $table->string('grado_instruccion',100)->nullable()->default('');
            $table->string('flag_certifi_discapacidad',5)->nullable()->default('');
            $table->date('fecha_caducidad_carnet')->nullable();
            $table->string('tipo_discapacidad',50)->nullable()->default('');
            $table->string('diagnostico_discapacidad',50)->nullable()->default('');
            $table->string('requiere_ayuda',2)->nullable()->default('');
            $table->string('tipo_ayuda',100)->nullable()->default('');
            $table->string('ayuda_mecanica',100)->nullable()->default('');
            $table->string('nombre_apoderado',100)->nullable()->default('');
            $table->string('dni_apoderado',100)->nullable()->default('');
            $table->string('parentesco',100)->nullable()->default('');
            $table->string('direccion_apoderado',100)->nullable()->default('');
            $table->string('correo_apoderado',100)->nullable()->default('');
            $table->string('telefono_apoderado',100)->nullable()->default('');
            $table->string('tipo_seguro',100)->nullable()->default('');
            $table->string('seguro_salud',100)->nullable()->default('');
            $table->string('fecha_empadronamiento',100)->nullable()->default('');
            $table->string('flg_carnet_did',100)->nullable()->default('');
            $table->tinyInteger('delete')->default(0);
            $table->bigInteger('Usuario')->unsigned();
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
        Schema::dropIfExists('discapacitados');
    }
}
