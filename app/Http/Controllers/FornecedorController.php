<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Http\Services\ServiceFornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    protected $serviceFornecedor;
    public function __construct(ServiceFornecedor $serviceFornecedor)
    {
        $this->serviceFornecedor = $serviceFornecedor;
    }
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request, $key)
    {
        return $this->serviceFornecedor->fornecedorGetAll($request, $key);
    }

    public function adicionar()
    {
        $msg='';
        return view('app.fornecedor.adicionar',['msg'=>$msg]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'nome' => 'required',
            'site' => 'required',
            'uf' => 'required',
            'email' => 'required'
        ]);

        return $this->serviceFornecedor->createService($data);
    }

    public function details($id)
{
    $listar = $this->serviceFornecedor->detailsFornecedor($id);

    if (!$listar) {
        return redirect()->back()->with('mensagem', 'Fornecedor não encontrado.');
    }
    return $listar;
}
    public function update(Request $request, $id)
    {
        
        $data = $request->except(['_token', '_method']);
        return $this->serviceFornecedor->updateFornecedor($id, $data);
    }
    public function destroy($id)
    {
        return $this->serviceFornecedor->destroyFornecedor($id);
    }
}
