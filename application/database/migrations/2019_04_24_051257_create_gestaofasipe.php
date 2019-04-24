<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestaofasipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestaofasipe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idbarraca')->unsigned();
            $table->foreign('idbarraca')->references('id')->on('barraca');
            $table->double('vendaigresso')->default(0);
            $table->double('dadosaplicativo')->default(0);
            $table->double('workshop')->default(0);
            $table->double('reuniaovigilancia')->default(0);
            $table->integer('idusuario')->unsigned();
            $table->foreign('idusuario')->references('id')->on('users');
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
        Schema::dropIfExists('gestaofasipe');
    }
}
