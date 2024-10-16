<?php

namespace App\Http\Services;

use App\Http\Repositories\RepositoryContato;

class ServiceContato
{
    protected $repositoryContato;

    public function __construct(RepositoryContato $contato)
    {
        $this->repositoryContato = $contato;
    }

    public function createService($Request )
    {
       
        $data = $Request->validate([
            'nome'=>'required',
            'telefone'=>'required',
            'email'=>'required',
            'motivo_conatato'=>'required',
            'mensagem'=>'required'
        ]);

        return $this->repositoryContato->createContato($data);
    }
}
