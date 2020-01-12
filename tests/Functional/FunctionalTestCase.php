<?php

namespace Tests\Functional;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class FunctionalTestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public $baseUrl = 'http://localhost';

    protected function actingAsUser()
    {
        $user = create(User::class);

        return $this->actingAs($user);
    }
}
