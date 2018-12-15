<?php

namespace App\Tests\Fixtures;

use App\UI\Presenter\Interfaces\ViewPresenterInterface;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use App\UI\Responder\ViewResponder;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

trait ResponderConstructor
{
    /**
     * @var ViewResponderInterface
     */
    protected $responder;

    public function responderConstructor()
    {
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')
                     ->willReturn('/url');

        $presenter = $this->createMock(ViewPresenterInterface::class);
        $presenter->method('presentation')
                  ->willReturn('Vue de la page');

        $this->responder = new ViewResponder(
            $urlGenerator,
            $presenter
        );
    }
}
