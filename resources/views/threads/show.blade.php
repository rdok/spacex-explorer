<?php /** @var \App\Thread $thread */ ?>
@extends('layouts.app')

@section('content')

    <div class="card mb-3">
        <div class="card-header bg-white">{{ $thread->title }} - {{ $thread->author->name }}</div>

        <div class="card-body">
            <p class="card-text">{{ $thread->body }}</p>
        </div>
    </div>

    @foreach($thread->replies as $reply)
        @include('threads._reply', compact('reply'))
    @endforeach

@endsection
