@extends('app.layouts.basico')

@section('titulo', 'Detalhes Do Produto')
@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Editar Detalhes Do Produto</p>
        </div>
        <div class="menu">

            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Pesquisar</a></li>
            </ul>

        </div>
        <div class="informacao-pagina">
            <h4>Produto</h4>
            <div>Nome: {{ $produto_detalhe->produto->nome }}</div><br>
            <div>Decrição: {{ $produto_detalhe->produto->descricao }}</div><br>

            <div style="width: 100%; margin-left:auto; margin-right: auto ">
                <div style="width: 30%; margin-left:auto; margin-right: auto ">
                    @component('app.produto_detalhe._components.form_create_edit', [
                        'produto_detalhe' => $produto_detalhe,
                        'unidade' => $unidade,
                    ])
                    @endcomponent
                </div>
            </div>
        </div>

    </div>
@endsection
