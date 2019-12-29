<?php

namespace Tests\Feature\Assertions;

use App\Reply;
use App\Thread;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Tests\Feature\TestResponse;

trait ThreadResponse
{
    public function assertSeeCardLink($path, $title): void
    {
        $link = sprintf('<a href="%s">%s</a>', $path, $title);
        $this->assertSee($link);
    }

    public function assertSeeThread(Thread $thread): void
    {
        $this->assertSeeCardHeader($thread->title);
        $this->assertSeeCardText($thread->body);
    }

    public function assertSeeCardHeader($header): TestResponse
    {
        $cardHeader = sprintf('<div class="card-header">%s</div>', $header);

        return $this->assertSee($cardHeader);
    }

    public function assertSeeCardText($body): void
    {
        $value = sprintf('<div class="body">%s</div>', $body);
        $this->assertSee($value);
    }

    public function assertSeeThreadReplies(Collection $replies)
    {
        /** @var Reply $reply */
        foreach ($replies as $reply) {
            /** @var Carbon $createdAt */
            $createdAt = $reply->created_at;

            $this->assertSeeCardTitle($reply->author->name);
            $this->assertSeeCardText($reply->body);
            $this->assertSeeCardTextMuted($createdAt->diffForHumans());
        }
    }

    public function assertSeeCardTitle($title)
    {
        $value = sprintf('<h5 class="card-title">%s</h5>', $title);
        $this->assertSee($value);
    }

    public function assertSeeCardTextMuted($text)
    {
        $value = sprintf('<p class="card-text">%s</p>', $text);
        $this->assertSee($value);
    }
}
