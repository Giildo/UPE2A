<?php

namespace App\Domain\Counter;

use App\Domain\Model\Thumbnail;
use Doctrine\ORM\EntityManagerInterface;

class ThumbnailCounter
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * ThumbnailCounter constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function count(): array
    {
        $count = [];
        foreach (range(
                     'a',
                     'z'
                 ) as $letter) {
            $count[$letter] = !$this->entityManager->getRepository(Thumbnail::class)
                                                   ->counter($letter)[1] == 0;
        }
        return $count;
    }
}
