<?php

namespace App\Http\Controllers;

use App\Http\Resources\FechamentoResource;
use App\Fechamento;
use Illuminate\Http\Request;

class FechamentoController extends Controller
{
    /**
     * @var Fechamento
     */
    private $fechamento;

    /**
     * FechamentoController constructor.
     * @param Fechamento $fechamento
     */
    public function __construct(Fechamento $fechamento)
    {
        $this->fechamento = $fechamento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FechamentoResource::collection($this->fechamento->orderBy('updated_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Fechamento cadastrado com sucesso', 'data' => $this->fechamento->create($request->only('nome'))], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => $this->fechamento->findOrFail($id)], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(['data' => $this->fechamento->findOrFail($id)->update($request->only('nome'))], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['data' => $this->fechamento->findOrFail($id)->delete()], 203);
    }
}
