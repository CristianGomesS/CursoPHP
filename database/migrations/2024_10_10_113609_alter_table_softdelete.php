<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSoftDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('site_contato', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contato', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('fornecedores', function (Blueprint $table) {
           $table->dropSoftDeletes();
        });
       
    }
}
