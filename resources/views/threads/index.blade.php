@extends('layouts.app')

@section('content')

    <div class="card mb-3">
        @include('_card.header', ['header' => 'Threads'])
    </div>

    <?php /** @var \App\Thread $thread */?>
    @foreach($threads as $thread)
        <div class="card p-3 mt-2">
            <div class="body">
                @include('_card.url_title', [
                    'title' => $thread->title,
                     'url' => $thread->url()
                 ])

                @include('_card.text', ['text' => $thread->body])
            </div>
        </div>
    @endforeach


@endsection
