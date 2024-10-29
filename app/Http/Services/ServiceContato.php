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

    public function createService($data )
    {
    
        return $this->repositoryContato->createContato($data);
    }

    public function serviceGetMotivo()
    {
        return $this->repositoryContato->GetAllMotivo();
    }

}
