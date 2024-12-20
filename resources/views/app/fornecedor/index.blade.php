@extends('app.layouts.basico')

@section('titulo','Cliente')
@section('conteudo')
       <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
        <p>fornecedor</p>
        </div >
        <div class="menu">
                
                <ul>
                        <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                        <li><a href="{{route('app.fornecedor.listar',['key'=>'0'])}}">Listar</a></li>
                </ul>

        </div>
        <div class="informacao-pagina">
                <div style="width: 30%; margin-left:auto; margin-right: auto ">
                        <form action="{{route('app.fornecedor.listar',['key'=>'0'])}}" method="POST">
                                @csrf
                        <input type="text" name="nome" class="borda-preta" placeholder="Nome">  
                        <input type="text" name="site" class="borda-preta" placeholder="Site">  
                        <input type="text" name="uf" class="borda-preta" placeholder="UF">  
                        <input type="text" name="email" class="borda-preta" placeholder="E-mail"> 
                        
                        <button type="submit" class="borda-preta">Pesquisa</button>
                        </form>
                </div>
        </div>

       </div>
@endsection
