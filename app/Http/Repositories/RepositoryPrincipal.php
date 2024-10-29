<?php

namespace App\Http\Repositories;

use App\MotivoContato;

class RepositoryPrincipal
{
    protected $modelMotivoContato;

    public function __construct(MotivoContato $motivo)
    {
            $this->modelMotivoContato = $motivo;
    }

    public function GetAllMotivo()
    {
            return MotivoContato::all();
    }

    public function CreateMotivo($data)
    {
            return MotivoContato::create($data);
    }

}


