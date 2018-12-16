<?php

namespace App\Domain\Model;

use App\Domain\Model\Interfaces\ControlInterface;
use App\Domain\Model\Interfaces\ThumbnailInterface;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Class Control
 * @package App\Domain\Model
 *
 * @ORM\Table(name="upe2a_control")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\ControlRepository")
 */
class Control implements ControlInterface
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var PersistentCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Domain\Model\Thumbnail")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\JoinTable(name="upe2a_control_thumbnail")
     */
    private $thumbnails;

    /**
     * Control constructor.
     * @param DateTime $date
     * @param PersistentCollection $thumbnails
     */
    public function __construct(
        DateTime $date
    ) {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getThumbnails(): array
    {
        return $this->thumbnails->toArray();
    }

    /**
     * @param ThumbnailInterface $thumbnail
     */
    public function addThumbnail(ThumbnailInterface $thumbnail): void
    {
        $this->thumbnails->add($thumbnail);
    }
}
