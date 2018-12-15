<?php

namespace App\UI\Action\Control;

use App\Application\Exception\LoadingException;
use App\Domain\Loader\Interfaces\ItemLoaderInterface;
use App\Domain\Model\Control;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

class ShowAction
{
    /**
     * @var ViewResponderInterface
     */
    private $viewResponder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ItemLoaderInterface
     */
    private $itemLoader;

    /**
     * ShowAction constructor.
     * @param ViewResponderInterface $viewResponder
     * @param EntityManagerInterface $entityManager
     * @param ItemLoaderInterface $itemLoader
     */
    public function __construct(
        ViewResponderInterface $viewResponder,
        EntityManagerInterface $entityManager,
        ItemLoaderInterface $itemLoader
    ) {
        $this->viewResponder = $viewResponder;
        $this->entityManager = $entityManager;
        $this->itemLoader = $itemLoader;
    }

    /**
     * @Route(
     *     path="/tests/{id}",
     *     name="control_show",
     *     requirements={"id": "\d+"},
     * )
     * @param Request $request
     *
     * @return Response
     *
     * @throws LoadingException
     * @throws NonUniqueResultException
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function action(Request $request): Response
    {
        $control = $this->itemLoader->load(
            Control::class,
            [
                'id' => $request->attributes->get('id'),
            ]
        );

        return $this->viewResponder->response(
            [
                'templatePath' => 'control/show.html.twig',
            ],
            [
                'control' => $control,
            ]
        );
    }
}
