<?php

namespace App\src\DAO;

class PostDAO extends DAO
{
    public function getPosts()
    {

        $sql= 'SELECT id, title, content, created_date FROM posts ORDER BY id DESC';
        return $this->createQuery($sql);
    }


    public function getPost($postId)
    {

        $sql = 'SELECT id, title, content, created_date FROM posts WHERE id = ?';
        return $this->createQuery($sql,[$postId]);
    }


}