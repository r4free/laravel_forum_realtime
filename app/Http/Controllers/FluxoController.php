<?php

namespace App\Http\Controllers;

use App\Fluxo;
use App\Http\Resources\FluxoResource;
use Illuminate\Http\Request;

class FluxoController extends Controller
{
    /**
     * @var Fluxo
     */
    private $fluxo;

    /**
     * FluxoController constructor.
     */
    public function __construct(Fluxo $fluxo)
    {
        $this->fluxo = $fluxo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FluxoResource::collection($this->fluxo->orderBy('updated_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Execucao cadastrado com sucesso', 'data' => $this->fluxo->create($request->all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => $this->fluxo->findOrFail($id)], 200);
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
        return response()->json(['data' => $this->fluxo->findOrFail($id)->update($request->all())], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['data' => $this->fluxo->findOrFail($id)->delete()], 203);
    }
}
