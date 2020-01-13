<?php

namespace Tests\Integration;

use App\Channel;

class ChannelTest extends IntegrationTestCase
{
    /** @test */
    function should_have_model_fields()
    {
        $data = ['name' => 'ChannelName', 'slug' => 'ChannelSlug'];

        $this->assertDatabaseMissing('channels', $data);

        (new Channel($data))->save();

        $this->assertDatabaseHas('channels', $data);
    }
}
