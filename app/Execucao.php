<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Execucao extends Model
{
    protected $table = 'execucoes';
    protected $fillable = ['nome'];
}
