<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    use DatabaseTransactions;
}
