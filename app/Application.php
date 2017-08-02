<?php

namespace Wiki_418;

use Wiki_418\Controllers\HomeController;
use Wiki_418\Controllers\CategoriesController;
use Wiki_418\Controllers\ArticlesController;
use Wiki_418\Controllers\AboutController;
use Wiki_418\Controllers\ContactController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class Application
{
    private $dispatcher;

    public function __construct()
    {
        $this->dispatcher = $this->configureRoutes();
    }

    public function getContainer(): Container
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->setParameter('resource.views', __DIR__ . '/views/');
        $containerBuilder->register('database', '\Medoo\Medoo')
            ->addArgument(
                [
                    'database_type' => 'mysql',
                    'database_name' => 'Wiki_418',
                    'server' => 'localhost',
                    'username' => 'root',
                    'password' => ''
                ]
            );
        $containerBuilder->register('repository.categories', '\Wiki_418\Repositories\CategoryRepo')
            ->addArgument(new Reference('database'));
        $containerBuilder->register('repository.articles', '\Wiki_418\Repositories\ArticlesRepository')
            ->addArgument(new Reference('database'));
        $containerBuilder->register('repository.comments', '\Wiki_418\Repositories\CommentRepository')
            ->addArgument(new Reference('database'));

        $containerBuilder->register('model.categories', '\Wiki_418\Models\Categories')
            ->addArgument(new Reference('repository.categories'));
        $containerBuilder->register('model.articles', '\Wiki_418\Models\Articles')
            ->addArgument(new Reference('repository.articles'));
        $containerBuilder->register('model.singleArticle', '\Wiki_418\Models\Articles')
            ->addArgument(new Reference('repository.articles'))
            ->addArgument(new Reference('repository.comments'));;
        $containerBuilder->register('model.singleCategory', '\Wiki_418\Models\Categories')
            ->addArgument(new Reference('repository.categories'));
        $containerBuilder->register('model.newArticles', '\Wiki_418\Models\Articles')
            ->addArgument(new Reference('repository.articles'));

        $containerBuilder->register('twig.loader', '\Twig_Loader_Filesystem')
            ->addArgument('%resource.views%');
        $containerBuilder->register('twig.env', '\Twig_Environment')
            ->addArgument(new Reference('twig.loader'))
            ->addArgument(['cache' => false]);

        return new Container($containerBuilder);
    }

    public function handle($httpMethod, $uri)
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        $response = '';
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                header('HTTP/1.1 404 Not Found');
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                $response = call_user_func_array($handler, $vars);
                break;
        }
        return $response;
    }

    protected function configureRoutes()
    {
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
            $home = new HomeController($this->getContainer());
            $categories = new CategoriesController($this->getContainer());
            $articles = new ArticlesController($this->getContainer());
            $about = new AboutController($this->getContainer());
            $contact = new ContactController($this->getContainer());

            $r->addRoute('GET', '/', [$home, 'homeAction']);
            $r->addRoute('GET', '/category', [$categories, 'CategoryAction']);
            $r->addRoute('GET', '/category/{id}', [$categories, 'singleCategoryAction']);
            $r->addRoute('GET', '/articles', [$articles, 'articlesAction']);
            $r->addRoute('GET', '/articles/{id}', [$articles, 'singleArticleAction']);
            $r->addRoute('GET', '/about', [$about, 'aboutAction']);
            $r->addRoute('GET', '/contact', [$contact, 'contactAction']);
        });
        return $dispatcher;
    }
}
