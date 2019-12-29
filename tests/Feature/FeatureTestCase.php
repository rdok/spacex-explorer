<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * @method TestResponse get($uri, array $headers = [])
 */
abstract class FeatureTestCase extends TestCase
{
    use DatabaseTransactions;

    protected function createTestResponse($response)
    {
        return \Tests\Feature\TestResponse::fromBaseResponse($response);
    }
}
