@extends('app.layouts.basico')

@section('titulo','Cliente')
@section('conteudo')
       <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
        <p>fornecedor-listar</p>
        </div >
        <div class="menu">
                
                <ul>
                        <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                        <li><a href="{{route('app.fornecedor')}}">Pesquisar</a></li>
                     
                </ul>

        </div>
        <div class="informacao-pagina">
                <div style="width: 90%; margin-left:auto; margin-right: auto ">
                    <table>
                        <thead>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                            
                        </thead>
                        <tbody>
                            @if($fornecedorAll->count())
                              @foreach($fornecedorAll as $fornecedor)
                            <tr>
                                      <td>{{ $fornecedor->nome }}</td>
                                      <td>{{ $fornecedor->site }}</td>
                                      <td>{{ $fornecedor->uf }}</td>
                                      <td>{{ $fornecedor->email }}</td>
                                      <td> <a href="{{route('app.fornecedor.details',['id'=>$fornecedor->id])}}">Atualizar</a></td>
                                      <td> <a href="{{route('app.fornecedor.destroy',['id'=>$fornecedor->id])}}">Excluir</a></td>
                            </tr>
                              @endforeach
                          @else
                              <!-- Mensagem para o caso de não haver resultados -->
                              <p>{{ $mensagem ?? 'Nenhum fornecedor encontrado.' }}</p>
                          @endif
                        </tbody>
                    </table>
                        
                </div>
        </div>

       </div>
@endsection
