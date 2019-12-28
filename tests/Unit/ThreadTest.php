<?php

namespace Tests\Unit;

use App\Thread;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThreadTest extends UnitTestCase
{
    /** @test */
    function should_have_author()
    {
        $thread = new Thread;

        $this->assertInstanceOf(BelongsTo::class, $thread->author());
    }

    /** @test */
    public function should_have_path()
    {
        $thread = new Thread;

        $thread->id = 2077;

        $this->assertSame(url('threads/2077'), $thread->path());
    }
}
