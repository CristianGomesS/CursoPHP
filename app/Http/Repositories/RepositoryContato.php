<?php

namespace App\Http\Repositories;

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

}
