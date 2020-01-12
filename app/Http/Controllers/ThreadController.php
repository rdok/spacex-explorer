<?php

namespace App\Http\Controllers;

use App\Http\Requests\Thread\StoreThreadRequest;
use App\Thread;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    public function index()
    {
        $threads = Thread::query()->paginate();

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

    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }
}
