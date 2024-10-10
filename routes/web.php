<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route:: get('/bemvindo', function() {
return 'Seja bem vindo!';
});

Route:: get('/sobre-nos', function() {
    return 'pagina sobre-nos';
});

-------------ROTA PASSANDO PARAMETROS -------
- (?) serve para, caso nao tenha nenhum parametro ele retorna o valor padrão

Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
    function(
        string $nome = 'Desconhecido',
        string $categoria = 'Informação',
        string $assunto = 'Contato',
        string $mensagem = 'mensagem não informada'
    ) {
        echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
    }
);
    -----------------REDIRECIONAMENTO DE ROTAS--------------------------
 route::get('/rota1',function(){
       return redirect()-> route('site.rota2');
    })->name('site.rota1');

    route::get('/rota2',function(){
        echo'rota 2';
    })->name('site.rota2');

    //route::redirect('/rota1','/rota2');

*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@SobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@Contato')->name('site.contato');
Route::post('/contato', 'ContatoController@Contato')->name('site.contato');

route:: get('/login',function() {return 'login';})->name('site.login');

    route::prefix('/app')->group(function(){
        route:: get('/cliente',function(){ return 'Clientes';})->name('app.cliente');
        route:: get('/fornecedores','FornecedorController@index')->name('app.fornecedores');
        route:: get('/produtos',function(){ return 'Produtos';})->name('app.produtos');
    });

    //Rota costumizada para caso tenho algum erro nas rotas
    Route::fallBack(function(){
        echo 'Rota não encontrada. <a href="'.route('site.index').'"> Clique aqui</a> para voltar a pagina inicial';
    });
   

//passa os parametro p1 e p2 para o controlador que ira somar os dois numeros
    Route::get('/teste/{p1}/{p2}','TesteController@Teste')->name('site.teste');
  //  Route::get('/pokemons',Function (){
       // return 'hello';
   // });