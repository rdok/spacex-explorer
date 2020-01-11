<?php

namespace Tests\Functional;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class FunctionalTestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';

    public function setUp(): void
    {
        parent::setUp();;

        config(['database.default' => 'none']);
    }
}
