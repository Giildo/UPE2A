<?php

namespace App\Application\Helper\Interfaces;

interface SluggerInterface
{
    /**
     * Slugs the word.
     *
     * @param string $text
     *
     * @return string
     */
    public function slugify(string $text): string;
}