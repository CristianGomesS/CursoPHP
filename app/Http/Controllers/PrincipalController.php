<?php

namespace App\Http\Controllers;

use App\Http\Services\ServiceContato;
use App\Http\Services\ServicePrincipal;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    protected $serviceContato; 
    protected $servicePrincipal;

public function __construct(ServiceContato $Contato, ServicePrincipal $principal)
{
    $this->serviceContato = $Contato;
    $this->servicePrincipal = $principal;
}

    public function principal() {

        $motivo_contatos = $this->serviceContato->ServiceGetMotivo();


        return view('site.principal',['motivo_contatos'=>$motivo_contatos]);
    }

    public function store(Request $request)
    {
    }
}
