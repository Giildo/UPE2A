<?php

namespace App\Domain\Model;

use App\Domain\Model\Interfaces\CategoryInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @package App\Domain\Model
 *
 * @ORM\Table(name="upe2a_category")
 * @ORM\Entity()
 */
class Category implements CategoryInterface
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
     * Category constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
}
