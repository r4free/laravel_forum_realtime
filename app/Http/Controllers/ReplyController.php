<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * @var Reply
     */
    private $reply;

    /**
     * ReplyController constructor.
     */
    public function __construct(Reply $reply)
    {

        $this->reply = $reply;
    }

    public function index($thread_id,$pagination = 10){

        $replies = $this->reply->where('thread_id',$thread_id)->orderBy('created_at','desc')->paginate($pagination);

        if(request()->ajax()){
            return response()->json($replies,200);
        }

        return abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = 1;
        $response = $this->reply->create($data);

        if(request()->ajax()){
            return response()->json($response,201);
        }

        return redirect()->route('thread.show',$request->thread_id);

    }
}
