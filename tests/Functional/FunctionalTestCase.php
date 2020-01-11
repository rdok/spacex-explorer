<?php

namespace Tests\Functional;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class FunctionalTestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public $baseUrl = 'http://localhost';
}
