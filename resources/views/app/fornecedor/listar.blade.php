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
                        <li><a href="{{route('app.fornecedor.Destroyer',['key'=>'1'])}}">Registros Deletados</a></li>
                     
                </ul>
<br>
        </div>
        <div class="informacao-pagina">
                <div style="width: 90%; margin-left:auto; margin-right: auto ">
              
                    <table border="1"; width="100%">
                        <thead>
                            <th>ID</th>
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
                                     <td>{{ $fornecedor->id }}</td>
                                      <td>{{ $fornecedor->nome }}</td>
                                      <td>{{ $fornecedor->site }}</td>
                                      <td>{{ $fornecedor->uf }}</td>
                                      <td>{{ $fornecedor->email }}</td>
                                      <td>
                                        <form action="{{ route('app.fornecedor.details', ['id' => $fornecedor->id]) }}" method="GET);">
                                            <button type="submit">Atualizar</button>
                                        </form></td>
                                      <td><form action="{{ route('app.fornecedor.destroy', ['id' => $fornecedor->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"; style="background-color: red">Excluir</button>
                                    </form></td>
                                    
                            </tr>
                              @endforeach
                          @else
                              <!-- Mensagem para o caso de não haver resultados -->
                              <p>{{ $mensagem ?? 'Nenhum fornecedor encontrado.' }}</p>
                          @endif
                        </tbody>
                    </table>
                    {{$fornecedorAll->appends($old)->links()}}
                        
                </div>
        </div>

       </div>
@endsection
