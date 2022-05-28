<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEs');
            $table->string('nombreEn');
            $table->string('imagen');
            $table->string('codigoArticulo');
            $table->string('tipoArticulo');
            $table->string('tallas');
            $table->float('precio');
            $table->longText('detallesEs');
            $table->longText('detallesEn');
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
        Schema::dropIfExists('equipamientos');
    }
}
