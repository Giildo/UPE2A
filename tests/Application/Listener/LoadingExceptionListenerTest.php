<?php

namespace App\Tests\Application\Listener;

use App\Application\Exception\LoadingException;
use App\Application\Listener\LoadingExceptionListener;
use App\Tests\Fixtures\ResponderConstructor;
use Exception;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Kernel;

class LoadingExceptionListenerTest extends TestCase
{
    /**
     * @var LoadingExceptionListener
     */
    private $listener;

    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    public function setUp()
    {
        $this->responderConstructor();

        $this->flashBag = new FlashBag();

        $this->listener = new LoadingExceptionListener(
            $this->responder,
            $this->flashBag
        );
    }

    use ResponderConstructor;

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function test_When_NoExceptionIsThrown_Then_NoAction()
    {
        $event = new GetResponseForExceptionEvent(
            $this->createMock(Kernel::class),
            new Request(),
            1,
            new LoadingException(
                'Message personnalisé',
                LoadingException::NO_ELEMENT
            )
        );
        $this->listener->onKernelException($event);

        self::assertInstanceOf(
            RedirectResponse::class,
            $event->getResponse()
        );
        self::assertEquals(
            'Message personnalisé',
            $this->flashBag->get('error')[0]
        );
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function test_When_ExceptionIsThrown_Then_EventResponseIsSet()
    {
        $event = new GetResponseForExceptionEvent(
            $this->createMock(Kernel::class),
            new Request(),
            1,
            new Exception(
                "Message",
                LoadingException::NO_ELEMENT
            )
        );
        $this->listener->onKernelException($event);

        self::assertNull($event->getResponse());
        self::assertEmpty($this->flashBag->get('error'));
    }
}
