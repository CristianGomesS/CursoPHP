<?php

namespace App\Http\Services;

use App\Http\Repositories\RepositoryFornecedor;

class ServiceFornecedor
{
    protected $repositoryFornecedor;

    public function __construct(RepositoryFornecedor $forncedor)
    {
        $this->repositoryFornecedor = $forncedor;
    }

    public function createService($data)
    {
       
        if($data != ''){
         
        $this->repositoryFornecedor->createFornecedor($data);
        $msg ='Fornecedor Adicionado com sucesso';
    }
    return view('app.fornecedor.adicionar',['msg'=>$msg]);
    }

    public function fornecedorGetAll($request)
    {
        $todosFornecedores = $this->repositoryFornecedor->getAllRep($request);
         $mensagem = empty($todosFornecedores) ? 'Nenhum fornecedor encontrado.' : null;
        return view('app.fornecedor.listar', ['fornecedorAll' => $todosFornecedores, 'mensagem' => $mensagem]);
        
        
       /*  $FornecedoresFiltrados = [];
        // Verifica se algum parâmetro de pesquisa foi passado
        if ($request->nome || $request->site || $request->uf || $request->email) {

            // Filtra todos os fornecedores com base nos critérios
            foreach ($todosFornecedores as $fornecedor) {
                if ($fornecedor->nome == $request->nome || $fornecedor->site == $request->site || $fornecedor->uf == $request->uf || $fornecedor->email == $request->email) {
                    $FornecedoresFiltrados[] = $fornecedor;
                }
            }
        } else {
            // Se nenhum parâmetro foi passado, retorna todos os fornecedores
            $FornecedoresFiltrados = $todosFornecedores;
        }
        $mensagem = empty($FornecedoresFiltrados) ? 'Nenhum fornecedor encontrado.' : null;

        return view('app.fornecedor.listar', ['fornecedorAll' => $FornecedoresFiltrados, 'mensagem' => $mensagem]); */
    }

    public function detailsFornecedor($id)
    {
        $details = $this->repositoryFornecedor->details($id);
        return view('app.fornecedor.details', ['details' => $details]);
    }
    public function updateFornecedor($id, $data)
    {
       $this->repositoryFornecedor->update($id, $data);
       
        return redirect(route('app.fornecedor.listar'));
    }
    public function destroyFornecedor($id)
    {
       $this->repositoryFornecedor->delete($id);
       
        return redirect(route('app.fornecedor.listar'));
    }
   
}
