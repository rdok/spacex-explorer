<?php

namespace Tests\Functional\Thread;

use App\Thread;
use App\User;
use Tests\Functional\FunctionalTestCase;

class ReplyTest extends FunctionalTestCase
{
    /** @test */
    public function should_validate_reply_form()
    {
        /** @var Thread $thread */
        $thread = create(Thread::class);
        $user = create(User::class);

        $this->actingAs($user)
            ->visit($thread->url())
            ->press('Reply')
            ->seeInElement('div.alert.alert-danger', 'The body field is required.');
    }


    /** @test */
    public function should_reply_via_the_form()
    {
        /** @var Thread $thread */
        $thread = create(Thread::class);
        $user = create(User::class);
        $expected = ['body' => 'reply-value'];

        $this->dontSeeInDatabase('replies', $expected);

        $this->actingAs($user)
            ->visit($thread->url())
            ->dontSeeInElement('p.card-text', $expected['body'])
            ->type($expected['body'], 'body')
            ->press('Reply')
            ->seePageIs($thread->url())
            ->seeInElement('p.card-text', $expected['body']);

        $this->seeInDatabase('replies', array_merge($expected, [
            'author_id' => $user->id,
            'thread_id' => $thread->id
        ]));

    }

    /** @test */
    public function should_not_show_reply_form_to_guests()
    {
        /** @var Thread $thread */
        $thread = create(Thread::class);
        $user = create(User::class);
        $replyFormElement = 'input[name=body]';

        $this->visit($thread->url())
            ->dontSeeElement($replyFormElement)
            ->seeInElement(
                'div.alert.alert-secondary',
                'Please <a href="' . url('login') . '">sign in</a> in to participate.'
            );

        $this->actingAs($user)
            ->visit($thread->url())
            ->dontSeeElement('div.alert.alert-primary')
            ->seeElement($replyFormElement);
    }

    /** @test */
    public function should_require_login_submitting_a_reply_form()
    {
        $thread = new Thread;
        $thread->id = 2077;

        $this->post($thread->url('replies'))
            ->assertRedirectedTo('login');
    }
}
