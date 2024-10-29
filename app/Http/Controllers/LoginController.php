<?php

namespace App\Http\Controllers;

use App\Http\Services\ServiceLogin;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    protected $serviceLogin;

    public function __construct(ServiceLogin $login)
    {
        $this->serviceLogin = $login;
    }
    //
    public function index(Request $request)
    {
        $erro = '';
        if (   $erro =$request->get('erro') == 1) {
           $erro = 'usuario e ou senha nao existe';
        }
     
        if (   $erro =$request->get('erro') == 2) {
            $erro = 'necessario realizar login para ter acesso';
         }


        return view('site.login', ['titulo' => 'Login','erro'=>$erro]);
    }
    public function autenticar(Request $request)
    {

         
        $regras = [
            'usuario' =>'email',
            'senha'=>'required'   
        ];
        
        $feedback = [
            'usuario.email' =>'o campo email é obrigatorio',
            'senha.required'=>'o campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);
       
    return  $this->serviceLogin->findService($request);
    
    }
    public function sair()
    {
            session_destroy();
            return redirect()->route('site.index');
    }

}
