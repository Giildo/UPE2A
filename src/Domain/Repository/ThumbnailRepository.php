<?php

namespace App\Domain\Repository;

use App\Domain\Model\Thumbnail;
use App\Domain\Repository\Interfaces\ThumbnailRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ThumbnailRepository extends ServiceEntityRepository implements ThumbnailRepositoryInterface
{
    public function __construct(
        ManagerRegistry $registry
    ) {
        parent::__construct(
            $registry,
            Thumbnail::class
        );
    }

    /**
     * {@inheritdoc}
     */
    public function loadEntities(): ?array
    {
        return $this->createQueryBuilder('t')
                    ->getQuery()
                    ->execute();
    }
}
