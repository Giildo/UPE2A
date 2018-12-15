<?php

namespace App\Domain\Repository;

use App\Domain\DTO\Interfaces\OutputItemInterface;
use App\Domain\Model\Thumbnail;
use App\Domain\Repository\Interfaces\ThumbnailRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

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

    /**
     * {@inheritdoc}
     */
    public function loadEntitiesByParam(string $param): ?array
    {
        $query = "SELECT t FROM App\Domain\Model\Thumbnail t WHERE t.name LIKE '" . $param . "%'";

        return $this->_em->createQuery($query)
                         ->getResult();
    }

    /**
     * Counts if the letter is a first letter of one thumbnail in database.
     * If not return 0.
     * If at least one thumbnail begins with this letter,
     * the method returns the number of thumbnails with this first letter.
     *
     * @param string $letter
     *
     * @return array
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function counter(string $letter): array
    {
        $query = "SELECT COUNT (t.id) FROM App\Domain\Model\Thumbnail t WHERE t.name LIKE  '" . $letter . "%'";
        return $this->_em->createQuery($query)
                         ->useQueryCache(true)
                         ->useResultCache(true)
                         ->setResultCacheLifetime(60)
                         ->getSingleResult();
    }

    /**
     * Loads the control according to their id.
     *
     * @param int $id
     *
     * @return OutputItemInterface|null
     *
     * @throws NonUniqueResultException
     */
    public function loadEntityById(int $id): ?OutputItemInterface
    {
        return null;
    }
}
