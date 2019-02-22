<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('idusuario')->references('id')->on('users');
            $table->dataTime('data');
            $table->foreign('idbarraca')->references('id')->on('barraca');
            $table->foreign('idprato')->references('id')->on('prato');
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
        Schema::dropIfExists('voto');
    }
}
