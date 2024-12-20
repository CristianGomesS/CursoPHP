<?php

use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Middleware\LogAcessoMiddleware;
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
    return 'Olá, seja bem vindo ao curso!';
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@store')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('log.acesso', 'autenticacao:metodo_autenticacao,perfil')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'loginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    //fornecedor - LISTAR
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar/{key}', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar/{key}', 'FornecedorController@listar')->name('app.fornecedor.listar');
    //DETALHES
    Route::get('/fornecedor/details/{id}', 'FornecedorController@details')->name('app.fornecedor.details');
    Route::put('/fornecedor/details/{id}', 'FornecedorController@update')->name('app.fornecedor.update');
    //ADICIONAR
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@store')->name('app.fornecedor.store');
    //delete
    Route::get('/fornecedor/delete/{key}', 'FornecedorController@listar')->name('app.fornecedor.Destroyer');
    Route::delete('/fornecedor/delete/{id}', 'FornecedorController@destroy')->name('app.fornecedor.destroy');

    Route::resource('produto', 'ProdutoController');
    Route::resource('produto-detalhe','ProdutoDetalheController');
});



Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para ir para página inicial';
});
