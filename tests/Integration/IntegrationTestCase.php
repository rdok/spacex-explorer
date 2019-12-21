<?php

namespace Tests\Integration;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class IntegrationTestCase extends TestCase {
   use DatabaseTransactions;
}
