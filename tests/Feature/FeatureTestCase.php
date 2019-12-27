<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class FeatureTestCase extends TestCase {
   use DatabaseTransactions;
}
