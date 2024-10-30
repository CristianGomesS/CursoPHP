<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
       $produtos = Produto::paginate(10);
       return view('app.produto.index',['produtos'=>$produtos,'request'=>$request->all()]);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }


    public function show(Produto $produto)
    {
        //
    }

    
    public function edit(Produto $produto)
    {
        //
    }

    public function update(Request $request, Produto $produto)
    {
        //
    }


    public function destroy(Produto $produto)
    {
        //
    }
}
