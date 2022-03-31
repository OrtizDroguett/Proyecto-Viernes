<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('estadoPaciente');
            $table->bigInteger('fkPaciente')->unsigned();
            $table->bigInteger('fkMedico')->unsigned();
            $table->integer('activo')->unsigned();
            $table->timestamps();
            $table->foreign('fkPaciente')->references('id')->on('pacientes');
            $table->foreign('fkMedico')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
