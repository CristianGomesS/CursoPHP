<h2>Fornecedor (view)</h2>

{{-- Comentario que sera descartado pelo interpretador--}}{{--}}
{{'Texto de teste'}}
<br>   
<?= 'texto de teste'?>--}}
@php 
/*
    if(isset($variavel)){ //retorna true se a variavel existe 
    if(empty($variavel)){ //retorna true se a variavel estiver vazia - '', 0, 0.0,"0",null,False,Array(),$var
    }
*/
@endphp 


  {{--@SWITCH($fornecedores[2]['ddd'])
    @case (11)
        São Paulo 
        @break
    @case(71)
        Salvador
        @break
    @case(32)
        Minas Gerais
        @break
    @default    
    Contato nao identificado
    @endswitch--}}


    <!-- isset
    Se a variavel testada não estiver definida 
    ou
    se a variavel testada possuir o valor null
    -->
   {{-- @isset($fornecedores[1]['cnpj'])
        Cnpj: {{$fornecedores[1]['cnpj']}}
        @empty($fornecedores[1]['cnpj'])
        -vazio
        @endempty
        <br>
    @endisset
@endisset

UNLESS  inverso do if
-if, caso condição for verdadeira tem um resultado 
unlesse, caso a condição for falsa tem outro resultado, coloca os dois no codigo com a msm condição do se

@if($fornecedores[0]['status'] == 'N')
fornecedor inativo
@endif
@unless($fornecedores[0]['status'] == 'N') //executa se a condição for falsa
Fornecedor ativo
@endUnless
--------------------------FOR--------------------
 @for ($i = 0;isset($fornecedores[$i]); $i++)
@endfor
------------------------While--------------------
@php 
    $i=0 //Para usar o While tem que instanciar a variavel $i para o loop funcionar
@endphp
   @While(isset($fornecedores[$i]))
   
        Fornecedor: {{$fornecedores[$i]['Nome']}}
        <br>
        Status: {{$fornecedores[$i]['status']}}
        <br>
        CNPJ: {{$fornecedores[$i]['cnpj']?? 'Dado nao informado'}}
        <br>
        DDD: {{$fornecedores[$i]['ddd']?? 'Dado nao informado'}}
        <br>
        TELEFONE: {{$fornecedores[$i]['telefone']?? 'Dado nao informado'}}
        <br>
        <hr>
@php 
$i++
@endphp
    @endWhile
---------------------ForEach------------------------
@foreach ($fornecedores as $indice=> $fornecedor)
        (variavel com as arrays   AS  (indice= apelido para acesso aos incides da array, logo após atribuir uma variavel para receber cada um dos arrays($fornecedor) ))
@endforeach
--}}
@isset($fornecedores)
    @forelse($fornecedores as $indice =>$fornecedor)    
    Iteração atual: {{$loop->iteration}}
   
    <br>
        Fornecedor: {{$fornecedor['Nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj']?? 'Dado nao informado'}}
        <br>
        DDD: {{$fornecedor['ddd']?? 'Dado nao informado'}}
        <br>
        TELEFONE: {{$fornecedor['telefone']?? 'Dado nao informado'}}
        <br>
        @if ($loop->first)
            primeira iteração do loop
        @endif
        @if ($loop->last)
            Ultima iteração do loop
            <br>
             Total de registros: {{$loop->count}}
        @endif
        <hr>
    @empty
    Não existe fornecedores cadastrados!!!!!
@endforelse

@endisset

