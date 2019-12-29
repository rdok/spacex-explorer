<?php

namespace Tests\Feature;

class TestResponse extends \Illuminate\Foundation\Testing\TestResponse
{
    public function assertSeeCardUrlTitle($url, $title)
    {
        $title = sprintf('<a href="%s">%s</a>', $url, $title);

        return $this->assertSeeCardTitle($title);
    }

    public function assertSeeCardHeader($header)
    {
        $cardHeader = sprintf('<div class="card-header">%s</div>', $header);

        return $this->assertSee($cardHeader);
    }

    public function assertSeeCardTitle($title)
    {
        $value = sprintf('<h5 class="card-title">%s</h5>', $title);

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
