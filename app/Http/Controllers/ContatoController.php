<?php

namespace App\Http\Controllers;

use App\Http\Services\ServiceContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    protected $serviceContato;
    public function __construct(ServiceContato $contato)
    
    {
     $this->serviceContato = $contato;   
    }
    public function store(Request $request) {

        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        // print_r($contato->getAttributes());
        $contato->save();
        */
       
        $this->serviceContato->createService($request->all());
        // $contato->save();
        // print_r($contato->getAttributes());

        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }

    public function contato()
    {
        
        return view('site.contato', ['titulo' => 'Contato (teste)']);

    }
}
