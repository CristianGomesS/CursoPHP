@extends('site.layout.basico_template')
@section('titulo',$titulo)

@section('conteudo')
    <body>
  
        <div class = "conteudo-pagina">
        <div class = "titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class = "informacao-pagina">
            <div class = "contato-principal">
                   @component('site.layout._components.form_contato', ['classe'=>"borda-preta"])
                    <h3><p>Passando instruções HTML para o componente, Instrução da tela contato</p></h3>
                   @endcomponent
                </div>
            </div>  
        </div>
  @endsection