<?php

namespace App\Http\Controllers;

use App\Item;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        // Obtém uma lista paginada de produtos, com 10 produtos por página
        $produtos = Item::paginate(10);
    
       /*  // Itera sobre cada produto na coleção $produtos
        foreach ($produtos as $key => $produto) {
            // Busca o detalhe do produto associado (comprimento, largura e altura) para o produto atual pelo ID
            $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
    
            // Verifica se foram encontrados detalhes para o produto atual
            if (isset($produto_detalhe)) {
                // Adiciona o comprimento do detalhe do produto ao índice atual na coleção $produtos
                $produtos[$key]['comprimento'] = $produto_detalhe->comprimento;
    
                // Adiciona a largura do detalhe do produto ao índice atual na coleção $produtos
                $produtos[$key]['largura'] = $produto_detalhe->largura;
    
                // Adiciona a altura do detalhe do produto ao índice atual na coleção $produtos
                $produtos[$key]['altura'] = $produto_detalhe->altura;
            }
        }
     */
    
        // Retorna a view 'app.produto.index', passando a coleção de produtos paginados e os parâmetros da requisição (caso existam)
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }


    public function create(Produto $produto)
    {
        $unidade = Unidade::all();
        return view('app.produto.create', ['unidade' => $unidade, 'produto' => $produto]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'peso' => 'required',
            'unidade_id' => 'exists:unidades,id'
        ]);
        Produto::create($data);
        return redirect()->route('produto.index');
    }


    public function show(Produto $produto)
    {
        return view('app.produto.show', ['show' => $produto]);
    }


    public function edit(Produto $produto)
    {
        $unidade = Unidade::all();
        //return view('app.produto.create', ['produto' => $produto, 'unidade' => $unidade]);
        return view('app.produto.edit', ['produto' => $produto, 'unidade' => $unidade]);
    }

    public function update(Request $request, Produto $produto)
    {
        $data = $request->except(['_token', '_method']);
        $produto->update($data);
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }


    public function destroy(Produto $produto, $key)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
