<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\Assert as PHPUnit;

class TestResponse extends \Illuminate\Foundation\Testing\TestResponse
{
    public function assertSeeCardHeaderUrl($url, $text)
    {
        $pattern = sprintf(
            '<a href="%s">\s*%s\s*\<\/a>',
            preg_quote($url, '/'),
            preg_quote($text, '/')
        );

        return $this->assertSeeCardHeader($pattern, false);
    }

    public function assertSeeCardHeader($value, $quoteRegex = true)
    {
        $pattern = sprintf(
            '/<div class="card-header bg-white">\s*%s\s*\<\/div>/m',
            $quoteRegex ? preg_quote($value) : $value
        );

        PHPUnit::assertRegExp($pattern, $this->getContent());

        return $this;
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
