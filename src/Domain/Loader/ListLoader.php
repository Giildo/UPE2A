<?php

namespace App\Domain\Loader;

use App\Application\Exception\LoadingException;
use App\Domain\DTO\Interfaces\OutputItemInterface;
use App\Domain\DTO\OutputListDTO;
use App\Domain\Loader\Interfaces\ListLoaderInterface;
use App\Domain\Repository\Interfaces\ThumbnailRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ListLoader implements ListLoaderInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * ListLoader constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function load(string $entityName): OutputItemInterface
    {
        /** @var ThumbnailRepositoryInterface $repository */
        $repository = $this->entityManager->getRepository($entityName);

        $entities = $repository->loadEntities();

        if (empty($entities)) {
            throw new LoadingException(
                'Aucun élément demandé n\'a été trouvé dans la base de données.',
                LoadingException::NO_ELEMENT
            );
        }

        return new OutputListDTO($entities);
    }
}
