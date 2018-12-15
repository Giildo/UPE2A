<?php

namespace App\Domain\Loader\Interfaces;

use App\Domain\DTO\Interfaces\OutputItemInterface;

interface ListLoaderInterface extends LoaderInterface
{
    /**
     * Loads a list of entities. If the array is null a loading exception is thrown.
     *
     * {@inheritdoc}
     */
    public function load(
        string $entityName,
        ?array $params = []
    ): OutputItemInterface;
}