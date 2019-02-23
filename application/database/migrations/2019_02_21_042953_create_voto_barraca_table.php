<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotoBarracaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_barraca', function (Blueprint $table) {
            $table->increments('id');
           // $table->foreign('idusuario')->references('id')->on('users');
           // $table->data('data');
            //$table->foreign('idbarraca')->references('id')->on('barraca');
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
        Schema::dropIfExists('voto_barraca');
    }
}
