<?php

namespace Wiki_418\Repositories;

class CommentRepository extends Repository
{

    public function getComments($id)
    {
        return $this->db->select('comments', '*', ['article_id' => $id]);
    }

}
