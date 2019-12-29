<?php /** @var \App\Thread $thread */ ?>
<div class="card mt-2">
    <div class="card-header bg-white"><a href="{{ $thread->url() }}">{{ $thread->title }}</a></div>
    <div class="card-body">
        <p class="card-text">{{ $thread->body }}</p>
    </div>
</div>
