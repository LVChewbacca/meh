<?php
namespace Wiki_418\Models;
interface CategoriesInterface
{
    public function getArticlesCategory() : array;
    public function getSingleCategory($id);

}