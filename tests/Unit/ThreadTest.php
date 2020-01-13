<?php

namespace Tests\Unit;

use App\Channel;
use App\Thread;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ThreadTest extends UnitTestCase
{
    /** @var Thread */
    private $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = new Thread;
    }

    /** @test */
    public function should_have_replies()
    {
        $this->assertInstanceOf(HasMany::class, $this->thread->replies());
    }

    /** @test */
    function should_belong_to_author()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->thread->author());
    }

    /** @test */
    function should_belong_to_channel()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->thread->channel());
    }

    /** @test */
    public function should_have_url()
    {
        $this->thread->id = 2077;

        $this->assertSame(url('threads/2077'), $this->thread->url());
    }

    /** @test */
    public function may_have_url_with_channel_slug()
    {
        $this->thread->id = 2077;
        $this->thread->channel = new Channel(['slug' => 'tech']);
        $expected = url('threads/tech/2077');

        $this->assertSame($expected, $this->thread->url());
    }
}
