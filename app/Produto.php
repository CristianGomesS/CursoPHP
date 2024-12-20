<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    //

    protected $table = 'produtos';
    protected $fillable = ['nome', 'peso', 'descricao','unidade_id'];

    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
