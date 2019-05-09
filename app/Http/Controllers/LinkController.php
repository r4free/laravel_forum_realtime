<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkResource;
use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * @var Link
     */
    private $link;

    /**
     * LinkController constructor.
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return LinkResource::collection($this->link->orderBy('updated_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Link cadastrado com sucesso', 'data' => $this->link->create($request->all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => $this->link->findOrFail($id)], 200);
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
        return response()->json(['data' => $this->link->findOrFail($id)->update($request->only('nome','nova_aba','link'))], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['data' => $this->link->findOrFail($id)->delete()], 203);
    }
}
