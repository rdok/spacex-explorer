<div class="card mt-2">
    <div class="card-body">
        <h5 class="card-title">{{ $reply->author->name }}</h5>

        <p class="card-text">{{ $reply->body }}</p>

        <p class="card-text"><small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small></p>
    </div>
</div>
