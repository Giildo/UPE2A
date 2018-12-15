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
    public function load(
        string $entityName,
        ?array $params = []
    ): OutputItemInterface {
        /** @var ThumbnailRepositoryInterface $repository */
        $repository = $this->entityManager->getRepository($entityName);

        if (empty($params['filterName'])) {
            $entities = $repository->loadEntities();

            if (empty($entities)) {
                throw new LoadingException(
                    'Aucun élément demandé n\'a été trouvé dans la base de données.',
                    LoadingException::NO_ELEMENT
                );
            }
        } else {
            $entities = $repository->loadEntitiesByParam($params['filterValue']);

            if (empty($entities)) {
                throw new LoadingException(
                    'Aucun élément demandé n\'a été trouvé dans la base de données avec ces paramètres.',
                    LoadingException::NO_ELEMENT_WITH_THIS_PARAMS
                );
            }
        }

        return new OutputListDTO($entities);
    }
}
