<?php

namespace App\Domain\Model\Interfaces;

use DateTime;
use Doctrine\ORM\PersistentCollection;

interface ControlInterface extends ModelInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * @return PersistentCollection
     */
    public function getPictures(): PersistentCollection;
}