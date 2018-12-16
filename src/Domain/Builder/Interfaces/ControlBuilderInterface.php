<?php

namespace App\Domain\Builder\Interfaces;

use App\Domain\DTO\Interfaces\ControlDTOInterface;
use App\Domain\Model\Interfaces\ControlInterface;

interface ControlBuilderInterface
{
    /**
     * @param ControlDTOInterface $dto
     * @return ControlBuilderInterface
     */
    public function build(ControlDTOInterface $dto): self;

    /**
     * @return ControlInterface
     */
    public function getControl(): ControlInterface;
}