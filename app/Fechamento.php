<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fechamento extends Model
{
    protected $fillable = ['nome'];

    public function links(){
        return $this->hasMany(Link::class);
    }
}
