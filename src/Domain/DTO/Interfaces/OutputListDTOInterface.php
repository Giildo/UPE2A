<?php

namespace App\Domain\DTO\Interfaces;

use App\Domain\Model\Interfaces\ModelInterface;

interface OutputListDTOInterface extends OutputItemInterface
{
    /**
     * Returns the list of the entities.
     *
     * @return ModelInterface[]|array
     */
    public function getEntities(): array;
}
