<?php

namespace Wiki_418\Repositories;

class ArticlesRepository extends Repository
{
    public function getArticles()
    {
        return $this->db->select('articles', '*', ['ORDER' => ['created_at' => 'DESC']]);
    }

    public function getSingleArticle($id)
    {
        return $this->db->select('articles', '*', ['article_id' => $id]);
    }

    public function getLatestArticles()
    {
        return $this->db->select('articles', '*', ['LIMIT' => 5, 'ORDER' => ['created_at' => 'DESC']]);
    }
}
