<?php

namespace App\Http\Repositories;

use App\MotivoContato;
use App\SiteContato;

class RepositoryContato
{
    protected $modelSiteContato;
 
    public function __construct(SiteContato $model)
    {
        $this->modelSiteContato = $model;
    }

    public function createContato($data)
    {

        return $this->modelSiteContato->create($data);
    }

    public function GetAllContato()
    {
        return $this->modelSiteContato->all();
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
