<?php

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\OutputListDTOInterface;
use App\Domain\Model\Interfaces\ModelInterface;

class OutputListDTO implements OutputListDTOInterface
{
    /**
     * @var array|ModelInterface[]
     */
    private $entities;

    /**
     * OutputListDTO constructor.
     * @param ModelInterface[]|array $entities
     */
    public function __construct(array $entities)
    {
        $this->entities = $entities;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntities(): array
    {
        return $this->entities;
    }
}
