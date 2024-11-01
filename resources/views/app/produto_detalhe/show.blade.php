@extends('app.layouts.basico')

@section('titulo', 'Cliente')
@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Produto-show</p>
        </div>
        <div class="menu">

            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="{{route('produto.index')}}">Lista</a></li>
            </ul>

        </div>
        <div class="informacao-pagina">
            <div style="width: 100%; margin-left:auto; margin-right: auto ">
                <div style="width: 50%; margin-left:auto; margin-right: auto ">
                    @if ($show)
                        <table border="1" style="text-align: left">
                            <tr>
                                <td>ID:</td>
                                <td>{{ $show->id }}</td>
                            </tr>
                            <tr>
                                <td>Nome:</td>
                                <td>{{ $show->nome }}</td>
                            </tr>
                            <tr>
                                <td>Descricao:</td>
                                <td>{{ $show->descricao }}</td>
                            </tr>
                            <tr>
                                <td>Peso:</td>
                                <td>{{ $show->peso }}</td>
                            </tr>
                            <tr>
                                <td>Unidade:</td>
                                <td>{{ $show->unidade_id }}</td>
                            </tr>



                        </table>
                    @else
                        <p>Fornecedor não encontrado.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
