<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Assertions\Thread as ThreadAssertions;
use Tests\TestCase;

abstract class FeatureTestCase extends TestCase
{
    use DatabaseTransactions, ThreadAssertions;
}
