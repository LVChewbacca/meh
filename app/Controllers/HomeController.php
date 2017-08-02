<?php

namespace Wiki_418\Controllers;

class HomeController extends AbstractController
{

    public function homeAction()
    {
        /** @var \Wiki_418\Models\Articles $articles */
        $articles = $this->container->get('model.latestArticles');

        /** @var \Wiki_418\Models\Categories $categories */
        $categories = $this->container->get('model.categories');

        $listOfArticles = $articles->getLatestArticles();
        $listOfCategories = $categories->getArticlesCategory();

        $templateVariables = ['articles' => $listOfArticles, 'categories' => $listOfCategories];
        $template = 'home.view.php';

        return $this->render($template, $templateVariables);
    }
}
