<?php

namespace Wiki_418\Controllers;

use Wiki_418\ContainerInterface;

abstract class AbstractController implements ControllerInterface
{
    /** @var ContainerInterface */
    protected $container;
    /** @var \Twig_Environment */
    protected $twig;

    public function __construct(ContainerInterface $dependencyContainer)
    {
        $this->container = $dependencyContainer;
        $this->twig = $dependencyContainer->get('twig.env');
    }

    public function render(string $template, array $content = []): string
    {
        $this->twig->addExtension(new \Twig_Extensions_Extension_Date());
        return $this->twig->render($template, $content);
    }
}
