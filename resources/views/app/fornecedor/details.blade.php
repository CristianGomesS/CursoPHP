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
                <div style="width: 100%; margin-left:auto; margin-right: auto ">
                        <div style="width: 30%; margin-left:auto; margin-right: auto ">
                             
                                <form action="{{route('app.fornecedor.update',['id'=>$details->id])}}" method="POST">
                                    @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{$details->nome}}">  
                                <input type="text" name="site" class="borda-preta" placeholder="site" value="{{$details->site}}">  
                                <input type="text" name="uf" class="borda-preta" placeholder="UF" value="{{$details->uf}}">  
                                <input type="text" name="email" class="borda-preta" placeholder="Email" value="{{$details->email}}"> 
                                
                                <button type="submit" class="borda-preta">Atualizar</button>
                                </form>
                        </div>
                </div>
        </div>

       </div>
@endsection
