<?php

namespace App\Domain\Model\Interfaces;

interface ThumbnailInterface extends ModelInterface
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