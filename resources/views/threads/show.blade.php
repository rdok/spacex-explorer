<?php /** @var \App\Thread $thread */?>
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">{{ $thread->title }} - {{ $thread->author->name }}</div>

                    <div class="card-body">
                        <p class="card-text">{{ $thread->body }}</p>
                    </div>
                </div>
            </div>

            @foreach($thread->replies as $reply)
                @include('threads._reply', compact('reply'))
            @endforeach
        </div>
    </div>
@endsection
