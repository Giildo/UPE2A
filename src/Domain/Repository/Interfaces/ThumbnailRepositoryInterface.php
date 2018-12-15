<?php

namespace App\Domain\Repository\Interfaces;

interface ThumbnailRepositoryInterface
{
    /**
     * Loads all entities.
     *
     * @return array|[]
     */
    public function loadEntities(): ?array;
}