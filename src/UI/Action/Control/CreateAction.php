<?php

namespace App\UI\Action\Control;

use App\Application\Handler\Interfaces\CreateControlHandlerInterface;
use App\UI\Form\Control\CreateType;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

class CreateAction
{
    /**
     * @var ViewResponderInterface
     */
    private $viewResponder;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var CreateControlHandlerInterface
     */
    private $createControlHandler;

    /**
     * CreateAction constructor.
     * @param ViewResponderInterface $viewResponder
     * @param FormFactoryInterface $formFactory
     * @param CreateControlHandlerInterface $createControlHandler
     */
    public function __construct(
        ViewResponderInterface $viewResponder,
        FormFactoryInterface $formFactory,
        CreateControlHandlerInterface $createControlHandler
    ) {
        $this->viewResponder = $viewResponder;
        $this->formFactory = $formFactory;
        $this->createControlHandler = $createControlHandler;
    }

    /**
     * @Route(
     *     path="/tests/nouveau",
     *     name="control_create",
     * )
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function action(Request $request): Response
    {
        $form = $this->formFactory->create(CreateType::class)
                                  ->handleRequest($request);

        if ($this->createControlHandler->handle($form)) {
            $this->viewResponder->response(
                [
                    'redirectPath' => 'control_list',
                ]
            );
        }

        return $this->viewResponder->response(
            [
                'templatePath' => 'control/create.html.twig',
            ],
            [
                'form' => $form->createView(),
            ]
        );
    }
}
