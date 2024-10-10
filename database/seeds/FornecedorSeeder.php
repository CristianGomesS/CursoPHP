<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mockery\Exception\NoMatchingExpectationException;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'João';
        $fornecedor->site='fornecedor100.com.br';
        $fornecedor->uf='BA';
        $fornecedor->email='Fornecedor@contato.com.br';
        $fornecedor->save();
        
        //utilizando o metodo create 
        Fornecedor::create([
            'nome'=>'Fornecedor 200',
            'site'=>'fornecedor123.com.br',
            'uf'=>'SP',
            'email'=>'fornecedor123@email.com'
        ]);

        //insert

        DB::table('fornecedores')-> insert([
            'nome'=>'Fornecedor 300',
            'site'=>'fornecedor456.com.br',
            'uf'=>'RJ',
            'email'=>'fornecedor456@email.com'
        ]);
    }
}
