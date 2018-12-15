<?php

namespace App\Domain\Repository;

use App\Domain\Model\Control;
use App\Domain\Repository\Interfaces\ControlRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Domain\DTO\Interfaces\OutputItemInterface;

class ControlRepository extends ServiceEntityRepository implements ControlRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct(
            $registry,
            Control::class
        );
    }

    /**
     * {@inheritdoc}
     */
    public function loadEntities(): ?array
    {
        return $this->createQueryBuilder('c')
                    ->getQuery()
                    ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function loadEntitiesByParam(string $param): ?array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function loadEntityById(int $id): ?OutputItemInterface
    {
        return $this->createQueryBuilder('c')
                    ->where('c.id = :id')
                    ->setParameter(
                        'id',
                        $id
                    )
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}
