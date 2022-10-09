<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_1');
            $table->string('nombre_2');
            $table->string('nombre_3');
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->string('apellido_de_casado');
            $table->string('estado_civil');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('dpi');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('estado_dpi');
            $table->string('fecha_vencimiento_dpi');
            $table->string('acceso_al_iggs');
            $table->string('nacionalidad');
            $table->string('edad');
            $table->string('fecha_de_nacimiento');
            $table->string('estado_paciente');
            $table->string('region');
            $table->string('zona');
            $table->string('colonia_barrio_aldea');
            $table->string('departamento_actual');
            $table->string('municipio_actual');
            $table->string('referencia_vivienda');
            $table->string('telefono_casa');
            $table->string('celular_1');
            $table->string('celular_2');
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
        Schema::dropIfExists('patients');
    }
}
