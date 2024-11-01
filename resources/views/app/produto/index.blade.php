@extends('app.layouts.basico')

@section('titulo', 'produto')
@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Produtos-index</p>
        </div>
        <div class="menu">

            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Pesquisar</a></li>
                <li><a href="">Registros Deletados</a></li>

            </ul>
            <br>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right: auto ">

                <table border="1"; width="100%">
                    <thead>
                        <th>Unidade ID</th>
                        <th>Nome</th>
                        <th>Peso</th>
                        <th>Descrição</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </thead>
                    <tbody>
                        @if ($produtos->count())
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->peso }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                    <td>
                                        <form action="{{route('produto.show',['produto'=>$produto->id])}}">
                                            <button type="submit"; style="background-color: rgb(43, 102, 31)">Visualizar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('produto.edit',['produto'=>$produto->id])}}">
                                            <button type="submit"; style="background-color: rgb(110, 110, 236)">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form id="form_{{$produto->id}}" action="{{route('produto.destroy',['produto'=>$produto->id])}}" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"; style="background-color: rgb(238, 94, 94)">Excluir</button>
                                           {{--  <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit">Excluir</a> --}}
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <!-- Mensagem para o caso de não haver resultados -->
                            <p>{{ $mensagem ?? 'Nenhum fornecedor encontrado.' }}</p>
                        @endif
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}

            </div>
        </div>

    </div>
@endsection
