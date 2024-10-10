<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabela filiais
    schema::create('filiais',function( Blueprint $table){
        $table->id();
        $table->string('filiais',30);
        $table->timestamps();
    });
    //tabela produtos filiais
    schema::create('produto_filiais',function( Blueprint $table){
        $table->id();
        $table->unsignedBigInteger('filial_id');
        $table->unsignedBigInteger('produto_id');
        $table->integer('estoque_min');
        $table->integer('estoque_max');
        $table->float('preco_venda',8,2);
        $table->timestamps();
         //constraints foreign key
        $table->foreign('filial_id')->references('id')->on('filiais');
        $table->foreign('produto_id')->references('id')->on('produtos');
    });
    //removendo colunas da tabela produtos
    schema::table('produtos',function( Blueprint $table){
        $table->dropColumn(['estoque_min','estoque_max','preco_venda']);  
    });

   
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
    schema::table('produtos',function( Blueprint $table){
        $table->integer('estoque_min');
        $table->integer('estoque_max');
        $table->float('preco_venda',8,2);
});
Schema::dropIfExists('produto_filiais');
    Schema::dropIfExists('filiais');
    }
 }
