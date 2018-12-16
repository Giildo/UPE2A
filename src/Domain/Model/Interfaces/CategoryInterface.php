<?php

namespace App\Domain\Model\Interfaces;

interface CategoryInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;
}