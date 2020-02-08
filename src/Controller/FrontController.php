<?php

namespace App\src\controller;
use App\src\DAO\CommentDAO;
use App\src\DAO\PostDAO;

class FrontController
{

    private $postDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function home()
    {
        $posts = $this->postDAO->getPosts();
        require '../src/templates/home.php';
    }

    public function post($postId)
    {
        $posts = $this->postDAO->getPost($postId);
        $comments = $this->commentDAO->getCommentsFromPost($postId);
        require '../src/templates/single.php';
    }
}

