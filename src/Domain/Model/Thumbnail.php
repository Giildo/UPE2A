<?php

namespace App\Domain\Model;

use App\Domain\Model\Interfaces\ThumbnailInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Thumbnail
 * @package App\Domain\Model
 *
 * @ORM\Table(name="upe2a_thumbnail")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\ThumbnailRepository")
 */
class Thumbnail implements ThumbnailInterface
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
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=4)
     */
    private $extension;

    /**
     * Thumbnail constructor.
     * @param string $name
     * @param string $extension
     */
    public function __construct(
        string $name,
        string $extension
    ) {
        $this->name = $name;
        $this->extension = $extension;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }
}
