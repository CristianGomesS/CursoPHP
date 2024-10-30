@extends('app.layouts.basico')

@section('titulo', 'produto')
@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Produtos-lista</p>
        </div>
        <div class="menu">

            <ul>
                <li><a href="">Novo</a></li>
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
                                    <td>
                                        <form action="">
                                            <button type="submit">Atualizar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"; style="background-color: red">Excluir</button>
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
