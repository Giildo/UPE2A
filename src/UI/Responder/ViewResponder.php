<?php

namespace App\UI\Responder;

use App\UI\Presenter\Interfaces\ViewPresenterInterface;
use App\UI\Responder\Interfaces\ViewResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ViewResponder implements ViewResponderInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;
    /**
     * @var ViewPresenterInterface
     */
    private $viewPresenter;

    /**
     * ViewResponder constructor.
     * @param UrlGeneratorInterface $urlGenerator
     * @param ViewPresenterInterface $viewPresenter
     */
    public function __construct(
        UrlGeneratorInterface $urlGenerator,
        ViewPresenterInterface $viewPresenter
    ) {
        $this->urlGenerator = $urlGenerator;
        $this->viewPresenter = $viewPresenter;
    }

    /**
     * {@inheritdoc}
     */
    public function response(
        array $options,
        ?array $items = []
    ) {
        return (empty($options['templatePath'])) ?
            new RedirectResponse($this->urlGenerator->generate($options['redirectPath'])) :
            new Response(
                $this->viewPresenter->presentation(
                    $options,
                    $items
                )
            );
    }
}
