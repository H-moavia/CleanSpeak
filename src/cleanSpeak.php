<?php

namespace CleanSpeak;

class CleanSpeakFilter
{
    protected $abusiveWords = [];

    public function __construct()
    {
        // Load abusive words from a file or any other source
        $this->abusiveWords = $this->loadAbusiveWords();
    }

    public function filter(string $text): string
    {
        $pattern = '/\b(' . implode('|', array_map('preg_quote', $this->abusiveWords)) . ')\b/i';
        return preg_replace($pattern, '***', $text);
    }

    protected function loadAbusiveWords(): array
    {
        // Example: Load abusive words from a file
        $fileContents = file_get_contents('/src/etc/abusive-words.txt');

        // Split the words into an array
        return explode("\n", $fileContents);
    }
}
