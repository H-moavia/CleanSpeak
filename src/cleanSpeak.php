<?php

namespace CleanSpeak;

class CleanSpeakFilter
{
    protected $abusiveWords = ['bad', 'rude', 'offensive'];

    public function filter(string $text): string
    {
        return str_ireplace($this->abusiveWords, '***', $text);
    }
}
<?