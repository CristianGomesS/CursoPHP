<?php

namespace App\Http\Services;

use App\Http\Repositories\RepositoryPrincipal;

class ServicePrincipal

{
    protected $repostoryPrincipal;

    public function __construct(RepositoryPrincipal $motivo)
    {   
        $this->repostoryPrincipal = $motivo;
    }   
    public function ServiceGetMotivo()
    {
            return $this->repostoryPrincipal->GetAllMotivo();
    }

    public function ServiceCreatMotivo($data)
    {
            return $this->repostoryPrincipal->CreateMotivo($data);
          }
}
