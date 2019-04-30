<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FluxoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'departamento' => $this->departamento,


            'assunto' => $this->assunto,

            'fechamento' => $this->fechamento,

            'execucao' => $this->execucao,
        ];
    }
}
