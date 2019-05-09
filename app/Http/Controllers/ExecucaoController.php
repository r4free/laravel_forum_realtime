<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExecucaoResource;
use App\Execucao;
use Illuminate\Http\Request;

class ExecucaoController extends Controller
{
    /**
     * @var Execucao
     */
    private $execucao;

    /**
     * ExecucaoController constructor.
     * @param Execucao $execucao
     */
    public function __construct(Execucao $execucao)
    {
        $this->execucao = $execucao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ExecucaoResource::collection($this->execucao->orderBy('updated_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Execucao cadastrado com sucesso', 'data' => $this->execucao->create($request->all('nome'))], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => $this->execucao->findOrFail($id)], 200);
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
        return response()->json(['data' => $this->execucao->findOrFail($id)->update($request->only('nome'))], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['data' => $this->execucao->findOrFail($id)->delete()], 203);
    }
}
