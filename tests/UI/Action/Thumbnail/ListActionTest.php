<?php

namespace App\Tests\UI\Action\Thumbnail;

use App\Domain\DTO\OutputListDTO;
use App\Domain\Loader\Interfaces\ListLoaderInterface;
use App\Tests\Fixtures\ResponderConstructor;
use App\UI\Action\Thumbnail\ListAction;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ListActionTest extends TestCase
{
    use ResponderConstructor;

    /**
     * @throws \App\Application\Exception\LoadingException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function test_Then_TheReturnIsResponse()
    {
        $this->responderConstructor();

        $loader = $this->createMock(ListLoaderInterface::class);
        $loader->method('load')
               ->willReturn(new OutputListDTO([]));

        $action = new ListAction(
            $this->responder,
            $loader
        );

        $response = $action->action();
        self::assertInstanceOf(
            Response::class,
            $response
        );
        self::assertNotInstanceOf(
            RedirectResponse::class,
            $response
        );
    }
}
