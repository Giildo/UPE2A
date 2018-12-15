<?php

namespace App\Tests\UI\Responder;

use App\UI\Presenter\ViewPresenter;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use App\UI\Responder\ViewResponder;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

class ViewResponderTest extends TestCase
{
    /**
     * @var ViewResponderInterface
     */
    private $responder;

    public function setUp()
    {
        $twig = $this->createMock(Environment::class);
        $twig->method('render')
             ->willReturn('vue de la page');
        $presenter = new ViewPresenter($twig);

        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')
                     ->willReturn('/url');

        $this->responder = new ViewResponder(
            $urlGenerator,
            $presenter
        );
    }

    /**
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function test_When_URLPathIsDefined_Then_ReturnIsRedirectResponse()
    {
        $response = $this->responder->response(
            [
                'redirectPath' => 'core_home',
            ]
        );

        self::assertInstanceOf(
            RedirectResponse::class,
            $response
        );
    }

    /**
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function test_When_URLPathIsNotDefined_Then_ReturnIsResponse()
    {
        $response = $this->responder->response(
            [
                'templatePath' => 'core/home.html.twig',
            ]
        );

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
