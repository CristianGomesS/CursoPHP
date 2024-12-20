<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
         
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //apos criar a coluna motivo_contatos_id, atribuimos os valor da caluna motivo_contatos para motivos_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criação da chave estrangeira, removendo a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
         
            $table->foreign('motivo_contatos_id')->references('id')->on('motivos_contato');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->string('motivo_contato',20);
            $table->dropForeign(['motivo_contatos_id']);
        });
        //revertendo os foi feito no banco
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            
            $table->dropColumn('motivo_contatos_id');
        });

    
    }
} 
