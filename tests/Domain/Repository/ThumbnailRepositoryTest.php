<?php

namespace App\Tests\Domain\Repository;

use App\Domain\Model\Interfaces\ThumbnailInterface;
use App\Domain\Model\Thumbnail;
use App\Domain\Repository\ThumbnailRepository;
use App\Tests\Fixtures\ThumbnailConstructor;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ThumbnailRepositoryTest extends KernelTestCase
{
    /**
     * @var ThumbnailRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @throws ToolsException
     * @throws ORMException
     */
    public function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
                                      ->get('doctrine.orm.entity_manager');
        $this->repository = $this->entityManager->getRepository(Thumbnail::class);

        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->dropSchema(
            $this->entityManager->getMetadataFactory()
                                ->getAllMetadata()
        );
        $schemaTool->createSchema(
            $this->entityManager->getMetadataFactory()
                                ->getAllMetadata()
        );

        $this->thumbnailConstructor();
    }

    use ThumbnailConstructor;

    public function test_When_TheDatabaseIsEmpty_Then_ReturnsEmptyArray()
    {
        self::assertEmpty($this->repository->loadEntities());
    }

    public function test_When_TheDatabaseIsNotEmpty_Then_ReturnsArray()
    {
        $this->entityManager->persist($this->calecon);
        $this->entityManager->persist($this->chanteuse);
        $this->entityManager->persist($this->fee);
        $this->entityManager->flush();

        /** @var ThumbnailInterface[] $entities */
        $entities = $this->repository->loadEntities();

        self::assertInstanceOf(
            ThumbnailInterface::class,
            $entities[0]
        );
        self::assertEquals(
            1,
            $entities[0]->getId()
        );
        self::assertEquals(
            'Caleçon',
            $entities[0]->getName()
        );
        self::assertEquals(
            'jpg',
            $entities[0]->getExtension()
        );
    }
}
