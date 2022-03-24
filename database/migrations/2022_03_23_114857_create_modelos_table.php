<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEs');
            $table->string('nombreEn');
            $table->string('previewEs');
            $table->string('previewEn');
            $table->longText('textoEs');
            $table->longText('textoEn');
            $table->longText('destacadoEs');
            $table->longText('destacadoEn');
            $table->string('enlace');
            $table->string('tipoMotorEs');
            $table->string('tipoMotorEn');
            $table->float('precio');
            $table->float('cv');
            $table->float('cc');
            $table->float('nm');
            $table->float('alturaAsiento');
            $table->string('sonidoMotor');
            $table->string('imagen');
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
        Schema::dropIfExists('modelos');
    }
}
