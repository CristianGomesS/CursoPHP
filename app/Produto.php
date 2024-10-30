<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //
    use SoftDeletes;

    protected $table = 'produtos';
    protected $fillable = ['nome', 'peso', 'descricao','unidade_id'];
}