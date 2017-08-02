<?php
namespace Wiki_418\Repositories;
class CategoryRepo extends Repository
{
    /** this get all categories */
    public function getArticlesCategory()
    {
        return $this->db->select('categories', '*');

    }

    /** get the articles from 1 category */
    public function  getCategoriesArticles($id)
    {

        return $this->db->select('articles', '*', ['category_id' => $id]);
    }
}