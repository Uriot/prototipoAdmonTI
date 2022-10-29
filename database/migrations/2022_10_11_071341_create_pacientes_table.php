<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('primer_Nombre');
            $table->string('segundo_Nombre');
            $table->string('tercer_Nombre');
            $table->string('primer_Apellido');
            $table->string('segundo_Apellido');
            $table->string('Apellido_de_Casado');
            $table->string('Estado_Civil');
            $table->integer('Telefono');
            $table->string('idDatos_DPI');
            $table->string('Acceso_al_Igss');
            $table->string('Nacionalidad');
            $table->integer('Edad');
            $table->string('Fecha_Nacimiento');
            $table->string('id_Estado_Paciente');
            $table->string('Religion');
            $table->string('Direccion');
            $table->string('Zona');
            $table->string('Colonia_Barrio_Aldea');
            $table->string('ID_Municipio');
            $table->string('Referencia_Vivienda');
            $table->string('Telefono_Casa');
            $table->string('Celular_1');
            $table->string('Celular_2');
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
        Schema::dropIfExists('pacientes');
    }
}
