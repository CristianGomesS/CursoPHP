<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteContato extends Model

{
    use SoftDeletes;
    protected $table='site_contato';
    protected $fillable = ['nome', 'telefone', 'email', 'Motivo_contato', 'mensagem'];
}
