<?php

namespace Wiki_418\Controllers;

class CategoriesController extends AbstractController
{

    public function CategoryAction()
    {
        /** @var \Wiki_418\Models\Categories $category */
        $category = $this->container->get('model.categories');

        $ListOfCategory = $category->getArticlesCategory();

        $templateVariables = ['categories' => $ListOfCategory];

        $template = 'category.view.php';
        return $this->render($template, $templateVariables);
    }

    public function singleCategoryAction($id) {
        /** @var \Wiki_418\Models\Categories $categories */
        $categories = $this->container->get('model.singleCategory');

        $ListOfCategory = $categories->getSingleCategory($id);

        $templateVariables = ['articles' => $ListOfCategory];
        $template = 'articles.view.php';

        return $this->render($template, $templateVariables);
    }

}
