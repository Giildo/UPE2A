<?php

namespace App\Domain\Model\Interfaces;

use App\Domain\DTO\Interfaces\OutputItemInterface;
use DateTime;

interface ControlInterface extends ModelInterface, OutputItemInterface
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
     * @return array
     */
    public function getThumbnails(): array;

    /**
     * @param ThumbnailInterface $thumbnail
     */
    public function addThumbnail(ThumbnailInterface $thumbnail): void;
}