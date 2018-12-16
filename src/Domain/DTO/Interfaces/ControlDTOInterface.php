<?php

namespace App\Domain\DTO\Interfaces;

use App\Domain\Model\Interfaces\ThumbnailInterface;
use DateTime;

interface ControlDTOInterface
{
    /**
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * @return ThumbnailInterface[]|array
     */
    public function getThumbnails(): array;

    /**
     * @param ThumbnailInterface $DTO
     */
    public function addThumbnail(ThumbnailInterface $DTO): void;
}