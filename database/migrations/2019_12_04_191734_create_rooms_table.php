<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre'); 
            $table->string('ubicacion');
            $table->string('precio'); 
            $table->string('contacto');
            $table->string('descripcion'); 
            $table->string('foto_principal');
            $table->string('foto_secundaria');
            $table->string('foto_auxiliar');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('cities');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
