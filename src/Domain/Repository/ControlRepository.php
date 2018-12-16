<?php

namespace App\Domain\Repository;

use App\Domain\Model\Control;
use App\Domain\Model\Interfaces\ControlInterface;
use App\Domain\Repository\Interfaces\ControlRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Domain\DTO\Interfaces\OutputItemInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

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

    /**
     * @param ControlInterface $control
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(ControlInterface $control): void
    {
        $this->_em->persist($control);
        $this->_em->flush();
    }
}
