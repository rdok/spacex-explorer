<?php

namespace Tests\Feature;

class TestResponse extends \Illuminate\Foundation\Testing\TestResponse
{
    public function assertSeeCardHeaderUrl($url, $text)
    {
        $value = sprintf( '<a href="%s">%s</a>', $url, $text );

        return $this->assertSeeCardHeader($value);
    }

    public function assertSeeCardHeader($value)
    {
        $value = sprintf('<div class="card-header bg-white">%s</div>', $value);

        return $this->assertSee($value);
    }

    public function assertSeeCardTitle($value)
    {
        $value = htmlspecialchars($value, ENT_QUOTES);

        $value = sprintf('<h5 class="card-title">%s</h5>', $value);

        return $this->assertSee($value);
    }

    public function assertSeeCardText($text)
    {
        $text = htmlspecialchars($text, ENT_QUOTES);
        $text = sprintf('<p class="card-text">%s</p>', $text);

        return $this->assertSee($text);
    }

    public function assertSeeCardTextMuted($text)
    {
        $value = sprintf(
            '<p class="card-text"><small class="text-muted">%s</small></p>',
            $text
        );

        return $this->assertSee($value);
    }
}
