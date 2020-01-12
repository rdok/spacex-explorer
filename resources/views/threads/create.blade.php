<?php /** @var \App\Thread $thread */ ?>
@extends('layouts.app')

@section('content')

    <form action="{{ route('threads.store') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <input
                type="text"
                class="form-control"
                name="title"
                placeholder="Type title..."
                aria-label="Type title..."
                aria-describedby="basic-addon2"
            />
        </div>

        <div class="form-group">
            <input
                type="text"
                class="form-control"
                name="body"
                placeholder="Type body..."
                aria-label="Type body..."
                aria-describedby="basic-addon2"
            />
        </div>


        <div class="form-group">
            <div class="input-group-append">
                <button
                    class="btn btn-outline-secondary"
                    type="submit">
                    Create
                </button>
            </div>
        </div>

    </form>

@endsection
