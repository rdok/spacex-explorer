<?php

namespace Tests\Unit;

use App\Thread;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ThreadTest extends UnitTestCase
{
    /** @var Thread  */
    private $thread;

    public function setUp():void
    {
        parent::setUp();;

        $this->thread = new Thread;
    }

    /** @test */
    public function should_have_replies()
    {
        $this->assertInstanceOf(HasMany::class, $this->thread->replies());
    }

    /** @test */
    function should_have_author()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->thread->author());
    }

    /** @test */
    public function should_have_url()
    {
        $this->thread->id = 2077;

        $this->assertSame(url('threads/2077'), $this->thread->url());
    }
}
