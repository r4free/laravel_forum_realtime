<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fluxo extends Model
{
    protected $fillable = ['departamento_id','assunto_id','execucao_id','fechamento_id'];
    public function departamento()
    {
        return $this->belongsTo(Departamento::class );
    }

    public function assunto()
    {
        return $this->belongsTo(Assunto::class );
    }

    public function execucao()
    {
        return $this->belongsTo(Execucao::class );
    }

    public function fechamento()
    {
        return $this->belongsTo(Fechamento::class);
    }
}
