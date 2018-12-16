<?php

namespace App\Application\Handler\Interfaces;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Form\FormInterface;

interface CreateControlHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return bool
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function handle(FormInterface $form): bool;
}