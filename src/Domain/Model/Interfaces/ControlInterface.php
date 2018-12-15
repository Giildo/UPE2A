<?php

namespace App\Domain\Model\Interfaces;


use DateTime;
use Doctrine\ORM\PersistentCollection;

/**
 * Class Control
 * @package App\Domain\Model
 *
 * @ORM\Table(name="upe2a_control")
 * @ORM\Entity()
 */
interface ControlInterface
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