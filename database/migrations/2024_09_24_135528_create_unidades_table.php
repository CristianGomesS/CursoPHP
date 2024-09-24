<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unidade_id');
            $table->string('sigla',5);
            $table->string('descricao');
            $table->timestamps();
        });
        //constraint com a tabela proutos
        Schema::table('produtos', function(Blueprint $table){ 
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
  
           
        //relacionamento com a tabela produtos_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){ 
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover o relacionamento entre as tabelas primeiro
        //relacionamento com a tabela produtos_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){ 
            //remover a chave estrangeira 
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');//[tabela]_[coluna que vai deletar a chave]_foreing

            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
           //relacionamento com a tabela proutos
        Schema::table('produtos', function(Blueprint $table){ 
              //remover a chave estrangeira 
              $table->dropForeign('produtos_unidade_id_foreign');//[tabela]_[coluna que vai deletar a chave]_foreing

              //remover a coluna unidade_id
              $table->dropColumn('unidade_id');
        });
    }
}
