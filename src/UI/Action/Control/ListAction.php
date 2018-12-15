<?php

namespace App\UI\Action\Control;

use App\Application\Exception\LoadingException;
use App\Domain\Loader\Interfaces\ListLoaderInterface;
use App\Domain\Model\Control;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

class ListAction
{
    /**
     * @var ViewResponderInterface
     */
    private $viewResponder;
    /**
     * @var ListLoaderInterface
     */
    private $listLoader;

    /**
     * ListAction constructor.
     * @param ViewResponderInterface $viewResponder
     * @param ListLoaderInterface $listLoader
     */
    public function __construct(
        ViewResponderInterface $viewResponder,
        ListLoaderInterface $listLoader
    ) {
        $this->viewResponder = $viewResponder;
        $this->listLoader = $listLoader;
    }

    /**
     * @Route(
     *     path="/tests",
     *     name="control_list",
     * )
     *
     * @return Response
     *
     * @throws LoadingException
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function action(): Response
    {
        return $this->viewResponder->response(
            [
                'templatePath' => 'control/list.html.twig',
            ],
            [
                'controls' => $this->listLoader->load(Control::class),
            ]
        );
    }
}
