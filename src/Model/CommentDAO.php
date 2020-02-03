<?php

namespace App\src\DAO;


class CommentDAO extends DAO
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, author, content, created_date FROM comments WHERE post_id = ? ORDER BY created_date DESC';
        return $this->createQuery($sql, [$postId]);
    }

}