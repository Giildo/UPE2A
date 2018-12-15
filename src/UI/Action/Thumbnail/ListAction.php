<?php

namespace App\UI\Action\Thumbnail;

use App\Application\Exception\LoadingException;
use App\Domain\Counter\ThumbnailCounter;
use App\Domain\Loader\Interfaces\ListLoaderInterface;
use App\Domain\Model\Thumbnail;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * @var ThumbnailCounter
     */
    private $thumbnailCounter;

    /**
     * ListAction constructor.
     * @param ViewResponderInterface $viewResponder
     * @param ListLoaderInterface $listLoader
     * @param ThumbnailCounter $thumbnailCounter
     */
    public function __construct(
        ViewResponderInterface $viewResponder,
        ListLoaderInterface $listLoader,
        ThumbnailCounter $thumbnailCounter
    ) {
        $this->viewResponder = $viewResponder;
        $this->listLoader = $listLoader;
        $this->thumbnailCounter = $thumbnailCounter;
    }

    /**
     * Lists the thumbnails list.
     *
     * @Route(
     *     path="/vignettes/{id}",
     *     name="thumbnails_list",
     *     defaults={"id": "a"},
     *     requirements={"id": "[a-z]"}
     * )
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws LoadingException
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function action(Request $request): Response
    {
        $thumbnails = $this->listLoader->load(
            Thumbnail::class,
            [
                'filterName'  => 'paramLoading',
                'filterValue' => $request->attributes->get('id'),
            ]
        );

        return $this->viewResponder->response(
            [
                'templatePath' => 'thumbnails/list.html.twig',
            ],
            [
                'thumbnails'        => $thumbnails,
                'thumbnailsLetters' => $this->thumbnailCounter->count(),
            ]
        );
    }
}
