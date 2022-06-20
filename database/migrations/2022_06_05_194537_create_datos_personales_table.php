<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosPersonales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('idUser');
            $table->string('genero');
            $table->string('email');
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('numeroTelefono');
            $table->boolean('entregaDomicilio');
            $table->longText('direccion')->nullable();
            $table->integer('cp')->nullable();
            $table->longText('ciudad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_personales');
    }
}
