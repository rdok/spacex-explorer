<?php /** @var \App\Thread $thread */ ?>
@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">New Thread</div>
        <form action="{{ route('threads.store') }}" method="POST">

            {{ csrf_field() }}

            <div class="card-body">
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
                    <textarea
                        type="text"
                        class="form-control"
                        name="body"
                        placeholder="Type body..."
                        aria-label="Type body..."
                        aria-describedby="basic-addon2"
                    ></textarea>
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
            </div>

        </form>

    </div>

@endsection
