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

    public function getAllRep($request, $key)
    {
       // return $this->modelFornecedor->all();

      switch ($key) {
        case '1':
            return $this->modelFornecedor->onlyTrashed()->where('nome','like','%'.$request->input('nome').'%')->
        where('site','like','%'.$request->input('site').'%')->
        where('uf','like','%'.$request->input('uf').'%')->
        where('email','like','%'.$request->input('email').'%')->paginate(2);
            break;
        
        default:
        return $this->modelFornecedor->where('nome','like','%'.$request->input('nome').'%')->
        where('site','like','%'.$request->input('site').'%')->
        where('uf','like','%'.$request->input('uf').'%')->
        where('email','like','%'.$request->input('email').'%')->paginate(2);
            break;
      }
     }

    
     public function details($id)
     {
        
         $fornecedor = $this->modelFornecedor->onlyTrashed()->where('id', $id)->first();
         if ($fornecedor) {
            $fornecedor->restore();  // Restaura o fornecedor
        } else {
            // Caso o fornecedor não esteja na lixeira, verifica se existe no banco
           return $this->modelFornecedor->where('id', $id)->first();
            
        }
     }

    public function update($id, $data)
    {
        // Busca o fornecedor na lixeira
        $fornecedor = $this->modelFornecedor->onlyTrashed()->where('id', $id)->first();
    
        // Verifica se o fornecedor foi encontrado na lixeira
        if ($fornecedor) {
            $fornecedor->restore();  // Restaura o fornecedor
        } else {
            // Caso o fornecedor não esteja na lixeira, verifica se existe no banco
            $fornecedor = $this->modelFornecedor->find($id);
            
          
        }
        // Atualiza os dados do fornecedor, caso o registro seja encontrado
        $fornecedor->update($data);
        return $fornecedor;
    }
    
    public function delete($id)
{
    // Tenta encontrar o registro com esse ID (incluindo os soft-deleted)
    $fornecedor = $this->modelFornecedor->withTrashed()->findOrFail($id);

    // Se o registro já estiver na lixeira, realiza a exclusão definitiva
    if ($fornecedor->trashed()) {
        $fornecedor->forceDelete();
    } else {
        // Caso contrário, realiza o soft delete
        $fornecedor->delete();
    }

    return $fornecedor;
}

}
