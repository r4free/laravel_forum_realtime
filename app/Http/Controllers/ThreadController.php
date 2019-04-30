<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Http\Resources\ThreadResource;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * @var Thread
     */
    private $thread;

    /**
     * ThreadController constructor.
     * @param Thread $thread
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return request()->ajax() ? ThreadResource::collection($this->thread->getFiltered()): view('threads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ThreadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $thread = $this->thread->create($request->all());
        $response = [
            'created'=>'success',
            'thread'=>$thread,
        ];

        if (request()->ajax()) {
            return response()->json($response, 201);
        }

        return view('thread.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread $thread
     * @return ThreadResource
     */
    public function show($id)
    {
        $thread = $this->thread->with('user')->findOrFail($id);

        if (request()->ajax()) {
            return new ThreadResource($thread);
        }

        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
