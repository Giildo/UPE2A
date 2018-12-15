<?php

namespace App\Domain\Loader\Interfaces;

use App\Domain\DTO\Interfaces\OutputItemInterface;
use Doctrine\ORM\NonUniqueResultException;

interface ItemLoaderInterface extends LoaderInterface
{
    /**
     * Loads one entity.
     *
     * @throws NonUniqueResultException
     *
     * {@inheritdoc}
     */
    public function load(
        string $entityName,
        ?array $params = []
    ): OutputItemInterface;
}
