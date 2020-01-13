<?php

namespace Tests\Functional\Thread;

use Tests\Functional\FunctionalTestCase;

class CreateThreadTest extends FunctionalTestCase
{
    /** @test */
    function should_validate_thread_creation_form()
    {
        $this->actingAsUser()
            ->visit('threads/create')
            ->seeInElement('div.card-header', 'New Thread')
            ->seeInElement('div.card-header', 'New Thread')
            ->press('Create')
            ->seeInElement('div.alert.alert-danger', 'The title field is required.')
            ->seeInElement('div.alert.alert-danger', 'The body field is required.');
    }

    /** @test */
    function should_create_thread_via_form()
    {
        $expected = ['title' => 'title-value', 'body' => 'body-value'];

        $this->actingAsUser()
            ->visit('threads')
            ->click('Create')
            ->seePageIs('threads/create')
            ->type($expected['title'], 'title')
            ->type($expected['body'], 'body')
            ->dontSeeInDatabase('threads', $expected)
            ->press('Create')
            ->seeInElement('div.alert.alert-success', 'Thread created.')
            ->seeInDatabase('threads', $expected);
    }

    /** @test */
    function should_require_login_for_accessing_thread_creation_form()
    {
        $this->visit('threads/create')
            ->seePageIs('login');
    }

    /** @test */
    function should_require_login_for_submitting_a_thread_form()
    {
        $this->post(route('threads.store'))
            ->assertRedirectedTo('login');
    }
}
