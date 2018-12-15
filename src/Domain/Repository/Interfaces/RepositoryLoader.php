<?php

namespace App\Domain\Repository\Interfaces;

use App\Domain\DTO\Interfaces\OutputItemInterface;
use Doctrine\ORM\NonUniqueResultException;

interface RepositoryLoader
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

    /**
     * Loads the control according to their id.
     *
     * @param int $id
     *
     * @return OutputItemInterface|null
     *
     * @throws NonUniqueResultException
     */
    public function loadEntityById(int $id): ?OutputItemInterface;
}
