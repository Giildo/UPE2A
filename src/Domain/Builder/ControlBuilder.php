<?php

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\ControlBuilderInterface;
use App\Domain\DTO\Interfaces\ControlDTOInterface;
use App\Domain\Model\Control;
use App\Domain\Model\Interfaces\ControlInterface;

class ControlBuilder implements ControlBuilderInterface
{
    /**
     * @var ControlInterface
     */
    private $control;

    public function build(ControlDTOInterface $dto): ControlBuilderInterface
    {
        $this->control = new Control(
            $dto->getDate()
        );

        foreach ($dto->getThumbnails() as $thumbnail) {
            $this->control->addThumbnail($thumbnail);
        }

        return $this;
    }

    public function getControl(): ControlInterface
    {
        return $this->control;
    }
}
