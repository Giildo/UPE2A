<?php

namespace App\Domain\Model;

use App\Domain\Model\Interfaces\ControlInterface;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Class Control
 * @package App\Domain\Model
 *
 * @ORM\Table(name="upe2a_control")
 * @ORM\Entity()
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
     * @param PersistentCollection $pictures
     */
    public function __construct(
        DateTime $date,
        PersistentCollection $pictures
    ) {
        $this->date = $date;
        $this->pictures = $pictures;
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
     * @return PersistentCollection
     */
    public function getPictures(): PersistentCollection
    {
        return $this->pictures;
    }
}
