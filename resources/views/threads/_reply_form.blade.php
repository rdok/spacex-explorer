<?php /** @var \App\Thread $thread */ ?>

<div class="mt-2 mb-5 pb-5">
    @auth
        <form
            action="{{ $thread->url('replies') }}"
            method="POST"
        >
            {{ csrf_field() }}

            <div class="input-group mt-3">
                <input
                    type="text"
                    class="form-control"
                    name="body"
                    placeholder="Have something to say?"
                    aria-label="Have something to say?"
                    aria-describedby="basic-addon2"
                    autofocus
                >
                <div class="input-group-append">
                    <button
                        class="btn btn-outline-secondary"
                        type="submit">
                        Reply
                    </button>
                </div>
            </div>

        </form>
    @endauth

    @guest
        <div class="alert alert-secondary" role="alert">
            Please <a href="{{ url('login') }}">sign in</a> in to participate.
        </div>
    @endguest

</div>
