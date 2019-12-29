<?php /** @var \App\Thread $thread */?>
<div class="card p-3 mt-2">
    <div class="body">
        <h5 class="card-title"><a href="{{ $thread->url() }}">{{ $thread->title }}</a></h5>

        <p class="card-text">{{ $thread->body }}</p>
    </div>
</div>
