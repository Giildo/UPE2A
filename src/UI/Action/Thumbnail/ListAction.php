<?php

namespace App\UI\Action\Thumbnail;

use App\Application\Exception\LoadingException;
use App\Domain\Loader\Interfaces\ListLoaderInterface;
use App\Domain\Model\Thumbnail;
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
     * Lists the thumbnails list.
     *
     * @Route(
     *     path="/vignettes",
     *     name="thumbnails_list",
     * )
     *
     * @return Response
     *
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     * @throws LoadingException
     */
    public function action(): Response
    {
        $thumbnails = $this->listLoader->load(Thumbnail::class);

        return $this->viewResponder->response(
            [
                'templatePath' => 'thumbnails/list.html.twig',
            ],
            [
                'thumbnails' => $thumbnails,
            ]
        );
    }
}
