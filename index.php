<?php

session_start();

require 'app/Core/DB.php';
require 'app/Controllers/PostsController.php';
require 'app/Controllers/AuthController.php';

define('VIEWS_PATH', __DIR__ . '/app/Views');
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace("/www/MVC-PostsLogin", "", $uri_path);
$uri = str_replace("/index.php", "", $uri);

if ($uri === "") {
    $uri = "/";
}

switch ($uri) {
    case '/login':
        $auth = new AuthController();
        $auth->showLogin();
        break;

    case '/do-login':
        $auth = new AuthController();
        $auth->login();
        break;

    case '/register':
        $auth = new AuthController();
        $auth->showRegister();
        break;

    case '/do-register':
        $auth = new AuthController();
        $auth->register();
        break;

    case '/logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    case '/':
        $controller = new PostsController();
        $controller->index();
        break;

    case '/show':
        $id = $_GET['id'] ?? null;
        $controller = new PostsController();
        $controller->show($id);
        break;

    case '/create':
        $controller = new PostsController();
        $controller->create();
        break;

    case '/store':
        $controller = new PostsController();
        $controller->store();
        break;

    case '/edit':
        $id = $_GET['id'] ?? null;
        $controller = new PostsController();
        $controller->edit($id);
        break;

    case '/update':
        $id = $_GET['id'] ?? null;
        $controller = new PostsController();
        $controller->update($id);
        break;

    case '/delete':
        $id = $_GET['id'] ?? null;
        $controller = new PostsController();
        $controller->destroy($id);
        break;
    
    default:
        http_response_code(404);
        echo "Página no encontrada";
        break;
}