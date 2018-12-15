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

    /**
     * Loads all entities filtered.
     *
     * @param string $param
     *
     * @return array|[]
     */
    public function loadEntitiesByParam(string $param): ?array;
}