<?php
namespace Wiki_418\Models;
use Wiki_418\Repositories\CategoryRepo;
class Categories implements CategoriesInterface
{
    private $CategoryRepo;

    public function __construct(CategoryRepo $CategoryRepo)
    {
        $this->CategoryRepo = $CategoryRepo;
    }

    public function getArticlesCategory() : array
    {
        return $this->CategoryRepo->getArticlesCategory();
    }

    public function  getSingleCategory($id)
    {
        return $this->CategoryRepo->getCategoriesArticles($id);
    }
}