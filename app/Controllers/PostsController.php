<?php

require 'app/Models/Post.php';

class PostsController {

    private function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /www/MVC-PostsLogin/index.php/login");
            exit;
        }
    }

    public function index() {
        $this->checkAuth();
        $posts = Post::getByUserId($_SESSION['user_id']);
        require VIEWS_PATH . '/home.php';
    }

    public function show($id) {
        $this->checkAuth();
        $post = Post::getByIdAndUserId($id, $_SESSION['user_id']);
        if ($post) {
            require VIEWS_PATH . '/show.php';
        } else {
            header("Location: /www/MVC-PostsLogin/index.php");
            exit;
        }
    }

    public function create() {
        $this->checkAuth();
        require VIEWS_PATH . '/form.php';
    }

    public function store() {
        $this->checkAuth();
        $title = $_POST['title'] ?? null;
        $body = $_POST['body'] ?? null;
        
        if ($title && $body) {
            Post::insert($title, $body, $_SESSION['user_id']);
        }
        
        header("Location: /www/MVC-PostsLogin/index.php");
        exit;
    }

    public function edit($id) {
        $this->checkAuth();
        $post = Post::getByIdAndUserId($id, $_SESSION['user_id']);
        if ($post) {
            require VIEWS_PATH . '/form.php';
        } else {
            header("Location: /www/MVC-PostsLogin/index.php");
            exit;
        }
    }

    public function update($id) {
        $this->checkAuth();
        $title = $_POST['title'] ?? null;
        $body = $_POST['body'] ?? null;
        
        if ($id && $title && $body) {
            Post::update($id, $title, $body, $_SESSION['user_id']);
        }
        
        header("Location: /www/MVC-PostsLogin/index.php");
        exit;
    }

    public function destroy($id) {
        $this->checkAuth();
        if ($id) {
            Post::delete($id, $_SESSION['user_id']);
        }
        
        header("Location: /www/MVC-PostsLogin/index.php");
        exit;
    }
}