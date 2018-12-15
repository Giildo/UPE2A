<?php

namespace App\Application\Listener;

use App\Application\Exception\LoadingException;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class LoadingExceptionListener
{
    /**
     * @var ViewResponderInterface
     */
    private $viewResponder;
    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    /**
     * LoadingExceptionListener constructor.
     * @param ViewResponderInterface $viewResponder
     * @param FlashBagInterface $flashBag
     */
    public function __construct(
        ViewResponderInterface $viewResponder,
        FlashBagInterface $flashBag
    ) {
        $this->viewResponder = $viewResponder;
        $this->flashBag = $flashBag;
    }

    /**
     * @param GetResponseForExceptionEvent $event
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof LoadingException) {
            $this->flashBag->set('error', $exception->getMessage());
            $event->setResponse(
                $this->viewResponder->response(
                    [
                        'redirectPath' => 'core_home',
                    ]
                )
            );
        }
    }
}
