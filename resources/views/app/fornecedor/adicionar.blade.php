@extends('app.layouts.basico')

@section('titulo','Cliente')
@section('conteudo')
       <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
        <p>fornecedor - adicionar</p>
        </div >
        <div class="menu">
                
                <ul>
                        <li><a href="{{route('app.fornecedor.listar')}}">Listar</a></li>
                        <li><a href="{{route('app.fornecedor')}}">Pesquisar</a></li>
                </ul>

        </div>
        <div class="informacao-pagina">
                {{$msg}}
                <div style="width: 30%; margin-left:auto; margin-right: auto ">
                      
                        <form action="{{route('app.fornecedor.store')}}" method="POST">
                            @csrf
                        <input type="text" name="nome" value="{{old('nome')}}" class="borda-preta" placeholder="Nome">  
                        {{$errors->has('nome')? $errors->first('nome'):''}}
                        <input type="text" name="site" value="{{old('site')}}" class="borda-preta" placeholder="Site"> 
                        {{$errors->has('site')? $errors->first('site'):''}} 
                        <input type="text" name="uf" value="{{old('uf')}}" class="borda-preta" placeholder="UF">  
                        {{$errors->has('uf')? $errors->first('uf'):''}}
                        <input type="text" name="email" value="{{old('email')}}" class="borda-preta" placeholder="E-mail"> 
                        {{$errors->has('email')? $errors->first('email'):''}}
                        
                        <button type="submit" class="borda-preta">Cadastrar</button>
                        </form>
                </div>
        </div>

       </div>
@endsection
