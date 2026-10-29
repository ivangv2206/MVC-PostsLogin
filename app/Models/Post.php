<?php

class Post {
    // Obtener todos los posts de un usuario específico
    public static function getByUserId($userId) {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM posts WHERE user_id = :user_id ORDER BY id DESC');
        $userId = filter_var($userId, FILTER_VALIDATE_INT);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Obtener un post específico validando que pertenezca al usuario activo
    public static function getByIdAndUserId($id, $userId) {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM posts WHERE id = :id AND user_id = :user_id');
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $userId = filter_var($userId, FILTER_VALIDATE_INT);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetch() ?: null;
    }

    // Insertar un nuevo post asignándole el user_id del usuario
    public static function insert($title, $body, $userId) {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO posts (title, body, user_id) VALUES (:title, :body, :user_id)');
        $userId = filter_var($userId, FILTER_VALIDATE_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    }

    // Actualizar un post asegurando que pertenece al usuario activo
    public static function update($id, $title, $body, $userId) {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE posts SET title = :title, body = :body WHERE id = :id AND user_id = :user_id');
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $userId = filter_var($userId, FILTER_VALIDATE_INT);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    }

    // Eliminar un post asegurando que pertenece al usuario activo
    public static function delete($id, $userId) {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM posts WHERE id = :id AND user_id = :user_id');
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $userId = filter_var($userId, FILTER_VALIDATE_INT);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    }
}