<?php

require 'app/Models/User.php';

class AuthController {

    public function showLogin() {
        require VIEWS_PATH . '/login.php';
    }

    public function showRegister() {
        require VIEWS_PATH . '/register.php';
    }

    public function login() {
        $username = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            header("Location: /www/MVC-PostsLogin/index.php");
            exit;
        } else {
            $error = "Usuario o contraseña incorrectos";
            require VIEWS_PATH . '/login.php';
        }
    }

    public function register() {
        $username = trim($_POST['usuario'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!empty($username) && !empty($password)) {
            if (User::findByUsername($username)) {
                $error = "El nombre de usuario ya está registrado";
                require VIEWS_PATH . '/register.php';
                return;
            }

            User::create($username, $password);
            header("Location: /www/MVC-PostsLogin/index.php/login");
            exit;
        } else {
            $error = "Por favor, completa todos los campos";
            require VIEWS_PATH . '/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /www/MVC-PostsLogin/index.php/login");
        exit;
    }
}