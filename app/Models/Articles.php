<?php

namespace Wiki_418\Models;

use Wiki_418\Repositories\ArticlesRepository;
use Wiki_418\Repositories\CommentRepository;

class Articles implements ArticlesModelInterface
{
    private $articleRepository;
    private $commentRepository;

    public function __construct(ArticlesRepository $articlesRepository, CommentRepository $commentRepository = null)
    {
        $this->articlesRepository = $articlesRepository;
        $this->commentRepository = $commentRepository;
    }

    public function getArticles(): array
    {
        return $this->articlesRepository->getArticles();
    }

    public function getSingleNew($id): array
    {
        return $this->ArticlesRepository->getSingleArticle($id);
    }

    public function getLatestArticles(): array
    {
        return $this->articlesRepository->getLatestArticles();
    }

    public function getComments($id): array
    {
        return $this->commentRepository->getComments($id);
    }


}
