<?php

namespace App\Domain\Loader;

use App\Application\Exception\LoadingException;
use App\Domain\DTO\Interfaces\OutputItemInterface;
use App\Domain\Loader\Interfaces\ItemLoaderInterface;
use App\Domain\Repository\Interfaces\RepositoryLoader;
use Doctrine\ORM\EntityManagerInterface;

class ItemLoader implements ItemLoaderInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * ItemLoader constructor.
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
        /** @var RepositoryLoader $repository */
        $repository = $this->entityManager->getRepository($entityName);
        $entity =  $repository->loadEntityById($params['id']);

        if (is_null($entity)) {
            throw new LoadingException(
                'Aucun élément n\'a été trouvé avec cet identifiant.',
                LoadingException::NO_ELEMENT
            );
        }

        return $entity;
    }
}
