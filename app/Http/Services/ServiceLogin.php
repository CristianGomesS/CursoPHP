<?php

namespace App\Http\Services;

use App\Http\Repositories\RepositoryLogin;
use Illuminate\Validation\Rules\Exists;

class ServiceLogin
{
    protected $repositoryLogin;

    public function __construct(RepositoryLogin $repositoryLogin)
    {
        $this->repositoryLogin  = $repositoryLogin;
    }


    public function createSevice($data)
    {
        return $this->repositoryLogin->createRep($data);
    }
    public function updateService($data)
    {
        return $this->repositoryLogin->updateRep($data);
    }
    public function findService($request)
    {

        $usuario = $request->get('usuario');
        $senha = $request->get('senha');
        $existe = $this->repositoryLogin->autenticar($usuario, $senha);

        if ($existe->isEmpty()) {
            // Caso não encontre nenhum usuário
            return redirect()->route('site.login',['erro'=>'Usuario nao encontrado']);
        }
    
        // Acessa o primeiro item do resultado
        foreach ($existe as $login){
            if ($login->usuario === $usuario && $login->senha === $senha) {
                session_start();
                $_SESSION['usuario'] = $login->usuario;
                $_SESSION['senha'] = $login->senha;
                
                return redirect()->route('app.home');
            } else {
                return redirect()->route('site.login',['erro'=>1]);
            }
        }
        }
    
          
        
    }

