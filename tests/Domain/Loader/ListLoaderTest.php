<?php

namespace App\Tests\Domain\Loader;

use App\Application\Exception\LoadingException;
use App\Domain\DTO\Interfaces\OutputItemInterface;
use App\Domain\Loader\Interfaces\ListLoaderInterface;
use App\Domain\Loader\ListLoader;
use App\Domain\Model\Interfaces\ThumbnailInterface;
use App\Domain\Model\Thumbnail;
use App\Domain\Repository\ThumbnailRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ListLoaderTest extends TestCase
{
    /**
     * @var ThumbnailRepository|MockObject
     */
    private $repository;

    /**
     * @var ListLoaderInterface
     */
    private $loader;

    public function setUp()
    {
        $this->repository = $this->createMock(ThumbnailRepository::class);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->method('getRepository')
                      ->willReturn($this->repository);

        $this->loader = new ListLoader(
            $entityManager
        );
    }

    /**
     * @throws LoadingException
     */
    public function test_When_TheEntitiesIsLoaded_Then_TheReturnIsAOutputListDTO()
    {
        $this->repository->method('loadEntities')
                         ->willReturn(
                             [
                                 new Thumbnail(
                                     'photo',
                                     'jpg'
                                 )
                             ]
                         );
        $response = $this->loader->load(Thumbnail::class);
        self::assertInstanceOf(
            OutputItemInterface::class,
            $response
        );
        self::assertInstanceOf(
            ThumbnailInterface::class,
            $response->getEntities()[0]
        );
    }

    /**
     * @throws LoadingException
     */
    public function test_When_TheEntitiesListIsEmpty_Then_ThrowsAException()
    {
        $this->expectException(LoadingException::class);

        $this->repository->method('loadEntities')
                         ->willReturn([]);

        $this->loader->load(Thumbnail::class);
    }
}
