<?php

namespace App\src\controller;

use App\src\DAO\PostDAO;

class FrontController
{
    public function home()
    {

        $post = new PostDAO();
        $posts = $post->getPosts();
        require '../templates/home.php';
    }





}
