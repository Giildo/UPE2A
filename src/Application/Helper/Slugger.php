<?php

namespace App\Application\Helper;

use App\Application\Helper\Interfaces\SluggerInterface;

class Slugger implements SluggerInterface
{
    /**
     * Slugs the word.
     *
     * @param string $text
     *
     * @return string
     */
    public function slugify(string $text): string
    {
        $text = str_replace(
            ['É', 'È', 'Ê', 'Ë', 'é', 'è', 'ê', 'ë',],
            'e',
            $text
        );
        $text = str_replace(
            ['À', 'Â', 'à', 'â',],
            'a',
            $text
        );
        $text = str_replace(
            ['Ô', 'ô',],
            'o',
            $text
        );
        $text = str_replace(
            ['Ù', 'Û', 'Ü', 'ù', 'û', 'ü',],
            'u',
            $text
        );
        $text = str_replace(
            ['Ç','ç',],
            'c',
            $text
        );
        $text = str_replace(
            ['Æ','æ',],
            'ae',
            $text
        );
        $text = str_replace(
            ['Œ','œ',],
            'oe',
            $text
        );

        $text = strtolower($text);

        $text = preg_replace(
            '/[[:punct:]]+/',
            '_',
            $text
        );
        $text = preg_replace(
            '/[^\w]+/',
            '_',
            $text
        );

        return trim(strip_tags($text));
    }
}
