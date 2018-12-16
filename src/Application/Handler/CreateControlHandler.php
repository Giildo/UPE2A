<?php

namespace App\Application\Handler;

use App\Application\Handler\Interfaces\CreateControlHandlerInterface;
use App\Domain\Builder\Interfaces\ControlBuilderInterface;
use App\Domain\Model\Control;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Form\FormInterface;

class CreateControlHandler implements CreateControlHandlerInterface
{
    /**
     * @var ControlBuilderInterface
     */
    private $controlBuilder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * CreateControlHandler constructor.
     * @param ControlBuilderInterface $controlBuilder
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        ControlBuilderInterface $controlBuilder,
        EntityManagerInterface $entityManager
    ) {
        $this->controlBuilder = $controlBuilder;
        $this->entityManager = $entityManager;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->getRepository(Control::class)
                                ->save(
                                    $this->controlBuilder->build($form->getData())
                                                         ->getControl()
                                );

            return true;
        }

        return false;
    }
}
