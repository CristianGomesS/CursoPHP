<?php

namespace App\Http\Controllers;

use App\Http\Services\ServiceContato;
use Illuminate\Http\Request;


class ContatoController extends Controller
{
    protected $serviceContato;
    public function __construct(ServiceContato $contato)

    {
        $this->serviceContato = $contato;
    }
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedback =     [
            'nome.min' => 'o campo nome precisa de 3 caracteres',
            'nome.max' => 'o campo nome maximo 40 caracteres',
            'email.unique' => 'Email ja existe',
            'required' => 'O compo :attribute deve ser preenchido'

        ];

        $data = $request->validate($regras, $feedback);

        $this->serviceContato->createService($data);

        $motivo_contatos = $this->serviceContato->serviceGetMotivo();
        // $contato->save();
        // print_r($contato->getAttributes());
        $redirect_url = $request->input('redirect_url');

        //return redirect()->back()-with('Success','Contato enviado com suceso!');
        //return view('site.contato', ['titulo' => 'Contato (teste)','motivo_contatos'=>$motivo_contatos]);
        if ($redirect_url) {
            return redirect($redirect_url);
        }

        // Caso não tenha URL, redireciona para uma página padrão (contato)
        return view('site.contato', [
            'titulo' => 'Contato (teste)',
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function contato()
    {
        // Busca os motivos de contato
        $motivo_contatos = $this->serviceContato->serviceGetMotivo();
        return view('site.contato', [
            'titulo' => 'Contato (teste)',
            'motivo_contatos' => $motivo_contatos // Passa a variável para a view
        ]);
    }
}
