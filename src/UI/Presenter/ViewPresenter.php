<?php

namespace App\UI\Presenter;

use App\UI\Presenter\Interfaces\ViewPresenterInterface;
use Twig\Environment;

class ViewPresenter implements ViewPresenterInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ViewPresenter constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function presentation(
        array $options,
        array $items
    ) {
        return $this->twig->render(
            $options['templatePath'],
            $items
        );
    }
}
