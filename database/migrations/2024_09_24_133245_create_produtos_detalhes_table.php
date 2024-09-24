<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento',8,2);
            $table->float('altura',8,2);
            $table->float('largura',8,2);
            $table->timestamps();

            //constraint - relacionamento chave primaria 
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos_detalhes',function(Blueprint $table){
            $table->dropForeign('produtos_detalhes_produto_id_foreign');
            $table->dropColumn('produto_id');
        });
        Schema::dropIfExists('produtos_detalhes');
    }
}
