<?php

namespace App\Http\Repositories;

use App\Login;
use Illuminate\Database\Eloquent\Model;

class RepositoryLogin
{

protected $model;

public function __construct(Login $login)
{
  $this->model = $login;
    
}
public function createRep($data)
{
    return $this->model->create($data);
}

public function updateRep($data)
{
    return $this->model->update($data);
}
public function autenticar($usuario,$senha)
{
  
        $model =$this->model->where('usuario',$usuario)->where('senha',$senha)->get();
    
    return $model;
}
}
