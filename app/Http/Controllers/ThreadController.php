<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\Thread\StoreThreadRequest;
use App\Thread;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $threads = Thread::query()->orderBy('created_at', 'desc')->paginate();

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(StoreThreadRequest $request)
    {
        $fillable = $request->only($request->keys());

        $thread = new Thread($fillable);
        $thread->author()->associate($request->user());
        $thread->save();

        session()->flash('alert-class', 'success');
        session()->flash('alert-message', 'Thread created.');

        return redirect()->route('threads.show', compact('thread'));
    }

    public function show(Channel $channel, Thread $thread)
    {
        if ($thread->channel_id != $channel->id) {
            return abort(404);
        }

        return view('threads.show', compact('thread'));
    }
}
