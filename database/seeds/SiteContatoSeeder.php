<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        SiteContato::create([
            'nome'=>'Carlos',
            'telefone'=>'7199999-8888',
            'email'=>'andre@email.com',
            'Motivo_contato'=>'4',
            'mensagem'=>'Teste mensagem site contato',
        ]);

        SiteContato::create([
            'nome'=>'andre',
            'telefone'=>'7199999-9999',
            'email'=>'Carlos@email.com',
            'Motivo_contato'=>'2',
            'mensagem'=>'Teste mensagem site contato',
        ]);
    }
}
