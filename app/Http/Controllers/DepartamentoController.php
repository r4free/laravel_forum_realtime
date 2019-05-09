<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartamentoResource;
use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * @var Departamento
     */
    private $departamento;

    /**
     * DepartamentoController constructor.
     * @param Departamento $departamento
     */
    public function __construct(Departamento $departamento)
    {
        $this->departamento = $departamento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return DepartamentoResource::collection($this->departamento->orderBy('updated_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Departamento cadastrado com sucesso', 'data' => $this->departamento->create($request->only('nome'))], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => $this->departamento->findOrFail($id)], 200);
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
        return response()->json(['data' => $this->departamento->findOrFail($id)->update($request->only('nome'))], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['data' => $this->departamento->findOrFail($id)->delete()], 203);
    }
}
