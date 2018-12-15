<?php

namespace App\Domain\Model\Interfaces;

interface ThumbnailInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getExtension(): string;
}