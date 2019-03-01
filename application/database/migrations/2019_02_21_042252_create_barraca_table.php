<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarracaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barraca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('semestre')->default(0);
            $table->string('periodo')->default('Definir');
            $table->integer('idcurso')->unsigned()->default(0);
            $table->foreign('idcurso')->references('id')->on('curso');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('pagamento')->default('Definir');
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
        Schema::dropIfExists('barraca');
    }
}


