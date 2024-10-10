<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    //o nome da tabela que sera armazenado
    protected $table = 'fornecedores';
    //os parametros que sera passado para o filable tera que esta presente nessa variavel
    protected $fillable =['nome', 'site', 'uf', 'email'];
}
