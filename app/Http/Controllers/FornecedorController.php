<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Break_;

class FornecedorController extends Controller
{
    public function index(){
    $fornecedores = [
        0 =>[
            'Nome'=>'fornecedor 1',
            'status'=>'N',
            'cnpj'=>'00.000.000/000-00',
            'ddd'=> '11',//SP
            'telefone'=> '9999-9999'
        ],
        1 =>[
            'Nome'=>'fornecedor 2',
            'status'=>'S',
            'cnpj' =>'0',
            'ddd'=> '71',//ssa
            'telefone'=> '9999-9999'
        ],
        2 =>[
            'Nome'=>'fornecedor 3',
            'status'=>'S',
            'cnpj' => null,
            'ddd'=> '32', //MG
            'telefone'=> '9999-9999'
            ]
    ];

    //(condição) ? 'se verdadeiro' : 'se falso';
    echo isset($fornecedores[1]['cnpj']) ? 'cnjp informado':'cnpj nao informado';

    return view('app.fornecedor.index',compact('fornecedores'));
    //return view('app.fornecedor.index');
    }
}