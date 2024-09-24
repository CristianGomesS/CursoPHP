<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::table('fornecedor_models', function (Blueprint $table) {
            $table->string('uf',2);
            $table->string('Email',150);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedor_models', function (Blueprint $table) {
           // $table->dropColumn('uf',2);
           // $table->dropColumn('Email',80);  dropColumn e passar um array com os nomes das colunas
           $table->dropColumn(['uf','Email']);
        });
    }
}
