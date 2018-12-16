<?php

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ControlDTOInterface;
use App\Domain\Model\Interfaces\ThumbnailInterface;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

class ControlDTO implements ControlDTOInterface
{
    /**
     * @var DateTime
     *
     * @Assert\Date()
     * @Assert\NotNull()
     */
    private $date;

    /**
     * @var ThumbnailInterface[]|array
     *
     * @Assert\Type("array")
     * @Assert\NotNull()
     */
    private $thumbnails;

    /**
     * ControlDTO constructor.
     * @param DateTime $date
     */
    public function __construct(?DateTime $date = null)
    {
        $this->date = $date;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return ThumbnailInterface[]|array
     */
    public function getThumbnails(): array
    {
        return $this->thumbnails;
    }

    /**
     * @param ThumbnailInterface $DTO
     */
    public function addThumbnail(ThumbnailInterface $DTO): void
    {
        $this->thumbnails[] = $DTO;
    }
}
