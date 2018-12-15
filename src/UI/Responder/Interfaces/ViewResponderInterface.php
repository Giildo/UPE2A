<?php

namespace App\UI\Responder\Interfaces;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

interface ViewResponderInterface
{
    /**
     * This class creates the good response according to the options.
     * - @uses Response: if she has the template path
     * - @uses RedirectResponse:  if she hasn't template path with the redirect path
     *
     * @param array $options The options of Response. e.g.: 'redirectPath' => 'core_home'
     * @param array|null $items The items to pass at the presenter.
     *
     * @return RedirectResponse|Response
     *
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function response(
        array $options,
        ?array $items = []
    );
}