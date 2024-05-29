<?php

namespace Faker\Provider;

class BookProvider extends \Faker\Provider\Base
{
    public function bookTitle($nbWords = 5)
    {
        $sentence = $this->generator->sentence($nbWords);
        return substr($sentence, 0, strlen($sentence) - 1);
    }

    public function ISBN()
    {
        return $this->generator->ean13();
    }

    public function bookThumbnail()
    {
        $thumbnailUrl = 'https://picsum.photos/200/300'; // Generate your thumbnail URL
        $hashedThumbnailUrl = hash('sha256', $thumbnailUrl); // Hash the thumbnail URL

        return $thumbnailUrl;
    }

    public function bookAuthor()
    {
        // Generate a fake author name
        return $this->generator->name();
    }

    public function bookPrice($min = 0, $max = 3000)
    {
        // Generate a random price between $min and $max
        return $this->generator->randomFloat(2, $min, $max);
    }

    public function bookSummary($nbSentences = 3)
    {
        // Generate a summary with a specified number of sentences
        $summary = '';
        for ($i = 0; $i < $nbSentences; $i++) {
            $summary .= $this->generator->sentence() . ' ';
        }
        return rtrim($summary);
    }
}
