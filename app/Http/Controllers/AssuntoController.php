<?php

namespace App\Http\Controllers;

use App\Assunto;
use App\Http\Resources\AssuntoResource;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    /**
     * @var Assunto
     */
    private $assunto;

    /**
     * AssuntoController constructor.
     * @param Assunto $assunto
     */
    public function __construct(Assunto $assunto)
    {
        $this->assunto = $assunto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AssuntoResource::collection($this->assunto->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Assunto cadastrado com sucesso', 'data' => $this->assunto->store([$request->only('nome')])], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => $this->assunto->findOrFail($id)], 200);
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
        return response()->json(['data' => $this->assunto->findOrFail($id)->update($request->only('nome'))], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['data' => response()->findOrFail($id)->delete()], 203);
    }
}
