<?php

namespace App\UI\Action\Core;

use App\UI\Responder\Interfaces\ViewResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

class HomeAction
{
    /**
     * @var ViewResponderInterface
     */
    private $viewResponder;

    /**
     * HomeAction constructor.
     * @param ViewResponderInterface $viewResponder
     */
    public function __construct(ViewResponderInterface $viewResponder)
    {
        $this->viewResponder = $viewResponder;
    }

    /**
     * @Route(
     *     path="/",
     *     name="core_home",
     * )
     * @return Response
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function home(): Response
    {
        return $this->viewResponder->response(
            [
                'templatePath' => 'core/home.html.twig',
            ]
        );
    }
}
