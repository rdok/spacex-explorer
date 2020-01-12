<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reply\StoreReplyRequest;
use App\Reply;
use App\Thread;

class ReplyController extends Controller
{
    public function store(Thread $thread, StoreReplyRequest $request)
    {
        $reply = new Reply($request->all());
        $reply->author()->associate($request->user());
        $reply->thread()->associate($thread);
        $reply->save();

        return redirect($thread->url());
    }
}
