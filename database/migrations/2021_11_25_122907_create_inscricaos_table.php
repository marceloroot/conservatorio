<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->nullable()->unsigned();
           $table->string('nome',800);
           $table->string('cpf',14)->unique();
           $table->string('telefone',800);
           $table->string('instrumento',300);
           $table->string('turno',300);
           $table->string('cursandoensino',300);
           $table->string('nomeinstituicao',300)->nullable();
           $table->string('jatocainstrumento',300);
           $table->date('datanasc');
           $table->decimal('nota1',5,2)->nullable();
           $table->decimal('nota2',5,2)->nullable();;
           $table->decimal('notafinal',5,2)->nullable();
         

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('inscricaos');
    }
}
