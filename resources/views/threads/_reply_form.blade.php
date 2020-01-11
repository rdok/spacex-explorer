<?php /** @var \App\Thread $thread */ ?>

@auth
    <form action="{{ $thread->url() }}/replies" method="POST">
        {{ csrf_field() }}

        <div class="input-group mt-3">
            <input
                type="text"
                class="form-control"
                name="body"
                placeholder="Reply"
                aria-label="Reply"
                aria-describedby="basic-addon2"
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
