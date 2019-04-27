<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->timestamps();
        });

        DB::table('curso')->insert(['nome' => '']);
        DB::table('curso')->insert(['nome' => 'Administração']);
        DB::table('curso')->insert(['nome' => 'Análise e Desenvolvimento de Sistemas']);
        DB::table('curso')->insert(['nome' => 'Arquitetura e Urbanismo']);
        DB::table('curso')->insert(['nome' => 'Biomedicina']);
        DB::table('curso')->insert(['nome' => 'Ciências Contábeis']);
        DB::table('curso')->insert(['nome' => 'Direito']);
        DB::table('curso')->insert(['nome' => 'Educação Física']);
        DB::table('curso')->insert(['nome' => 'Enfermagem']);
        DB::table('curso')->insert(['nome' => 'Engenharia Civil']);
        DB::table('curso')->insert(['nome' => 'Engenharia de Produção']);
        DB::table('curso')->insert(['nome' => 'Estética e Cosmética']);
        DB::table('curso')->insert(['nome' => 'Farmácia']);
        DB::table('curso')->insert(['nome' => 'Fisioterapia']);
        DB::table('curso')->insert(['nome' => 'Gastronomia']);
        DB::table('curso')->insert(['nome' => 'Jornalismo']);
        DB::table('curso')->insert(['nome' => 'Nutrição']);
        DB::table('curso')->insert(['nome' => 'Odontologia']);
        DB::table('curso')->insert(['nome' => 'Psicologia']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso');
    }
}
