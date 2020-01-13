@extends('layouts.app')

@section('content')

    <div class="card mb-3">
        <div class="card-header bg-white">
            Threads

            <a
                href="{{ url('threads/create') }}"
                type="button"
                class="btn btn-sm btn-outline-primary float-right"
            >
                Create
            </a>
        </div>
    </div>

    @foreach($threads as $thread)
        @include('threads._thread', compact('thread'))
    @endforeach

    <div class="mt-3">
        {{ $threads->links() }}
    </div>

@endsection
