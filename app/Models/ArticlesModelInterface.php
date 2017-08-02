<?php

namespace Wiki_418\Models;

interface ArticlesModelInterface
{
    public function getArticles(): array;

    public function getSingleArticle($id): array;

    public function getLatestArticles(): array;

    public function getComments($id): array;

}
