<?php

namespace App\UI\Presenter\Interfaces;

use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

interface ViewPresenterInterface
{
    /**
     * This class creates the view of the page with Twig.
     * She must have the template path.
     * She can have the items to load in the view.
     *
     * @param array $options The options of presentation. e.g. : 'templatePath' => 'core/home.html.twig'
     * @param array $items The items to load in the view.
     *
     * @return string
     *
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function presentation(
        array $options,
        array $items
    );
}