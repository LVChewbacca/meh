<?php

namespace Wiki_418\Controllers;

class ArticlesController extends AbstractController
{
    public function articlesAction()
    {
        /** @var \Wiki_418\Models\Articles $articles */
        $articles = $this->container->get('model.articles');

        $listOfArticles = $articles->getArticles();

        $templateVariables = ['articles' => $listOfArticles];
        $template = 'articles.view.php';

        return $this->render($template, $templateVariables);
    }

    public function singleArticle($id)
    {
        /** @var \Wiki_418\Models\Articles $articles */
        $articles = $this->container->get('model.singleArticle');

        $listOfArticles = $articles->getSingleArticle($id);
        $listOfComments = $articles->getComments($id);

        $templateVariables = ['articles' => $listOfArticles, 'comments' => $listOfComments];
        $template = 'single.article.view.php';

        return $this->render($template, $templateVariables);
    }


}
