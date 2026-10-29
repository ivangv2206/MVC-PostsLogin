<?php

class User {
    public static function findByUsername($username) {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
        $stmt->bindParam(':usuario', $username);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function create($username, $password) {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':usuario', $username);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    }
}