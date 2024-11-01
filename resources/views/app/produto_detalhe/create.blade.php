@extends('app.layouts.basico')

@section('titulo','Cliente')
@section('conteudo')
       <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
           <p>Adicionar Produto </p>       
        </div >
        <div class="menu">
                
                <ul>
                        <li><a href="{{route('produto.create')}}">Novo</a></li>
                        <li><a href="{{route('produto.index')}}">Pesquisar</a></li>
                </ul>

        </div>
        <div class="informacao-pagina">
                <div style="width: 100%; margin-left:auto; margin-right: auto ">
                        <div style="width: 30%; margin-left:auto; margin-right: auto ">
                                @component('app.produto_detalhe._components.form_create_edit',['unidade'=>$unidade,'produto_detalhe'=>$produto_detalhe])
                                    
                                @endcomponent
                        </div>
                </div>
        </div>

       </div>
@endsection
