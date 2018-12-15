<?php

namespace App\Domain\Loader\Interfaces;

use App\Application\Exception\LoadingException;
use App\Domain\DTO\Interfaces\OutputItemInterface;

interface LoaderInterface
{
    /**
     * Loads a list of entities or one entity.
     *
     * @param string $entityName The complete path of entity.
     * @param array|null $params The parameters of loading entity. e.g.: "id" => "1"
     *
     * @return OutputItemInterface Transition object that stock the entities.
     *
     * @throws LoadingException
     */
    public function load(
        string $entityName,
        ?array $params = []
    ): OutputItemInterface;
}
