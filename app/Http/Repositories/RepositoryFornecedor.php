<?php

namespace App\Http\Repositories;

use App\Fornecedor;

class RepositoryFornecedor
{
    protected $modelFornecedor;
 
    public function __construct(Fornecedor $model)
    {
        $this->modelFornecedor = $model;
    }

    public function createFornecedor($data)
    {

        return $this->modelFornecedor->create($data);
    }

    public function getAllRep($request)
    {
       // return $this->modelFornecedor->all();
       return $this->modelFornecedor->where('nome','like','%'.$request->input('nome').'%')->
       where('site','like','%'.$request->input('site').'%')->
       where('uf','like','%'.$request->input('uf').'%')->
       where('email','like','%'.$request->input('email').'%')->get();
    }
    
    public function details($id)
    {
        return $this->modelFornecedor->where('id',$id)->first();
    }

    public function update($id, $data)
    {
        $fornecedor = $this->modelFornecedor->findOrFail($id);
        $fornecedor->update($data);
        return $fornecedor;
    }
    
    public function delete($id)
    {
        $fornecedor = $this->modelFornecedor->findOrFail($id);
        if ($fornecedor) {
            # code...
        }
        return $fornecedor;
    }

}
