@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    @include('_card.header', ['header' => $thread->title])

                    <div class="card-body">
                        @include('_card.text', ['text' => $thread->body])
                    </div>
                </div>
            </div>

            @foreach($thread->replies as $reply)
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-body">
                            @include('_card.title', [
                                 'title' => $reply->author->name
                            ])
                            @include('_card.text', ['text' => $reply->body])
                            @include('_card.createdSince', [
                                'value' => $reply->created_at->diffForHumans()
                            ])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
