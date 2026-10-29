<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .btn-create {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 20px;
            transition: background 0.3s;
        }
        .btn-create:hover { background-color: #219150; }
        .post-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border: 1px solid #e1e8ed;
        }
        .post-card h2 { margin-top: 0; color: #34495e; }
        .post-card p { color: #555; line-height: 1.5; }
        .actions { margin-top: 15px; }
        
        .actions a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 5px;
            display: inline-block;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .btn-view { 
            color: #2980b9; 
            background-color: #ebf5fb; 
            border: 1px solid #2980b9;
        }
        .btn-view:hover { background-color: #2980b9; color: white; }

        .btn-edit { 
            color: #d35400; 
            background-color: #fdf2e9; 
            border: 1px solid #d35400;
        }
        .btn-edit:hover { background-color: #d35400; color: white; }

        .btn-delete { 
            color: #c0392b; 
            background-color: #fdedec; 
            border: 1px solid #c0392b;
        }
        .btn-delete:hover { background-color: #c0392b; color: white; }

        /* Estilo de la barra de usuario al final */
        .user-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-top: 30px;
            margin-bottom: 20px;
            border: 1px solid #e1e8ed;
        }
        .user-header h2 {
            margin: 0;
            color: #2c3e50;
            font-size: 20px;
        }
        .btn-logout {
            color: #c0392b;
            background-color: #fdedec;
            border: 1px solid #c0392b;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background-color: #c0392b;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Posts</h1>
        
        <a href="/www/MVC-PostsLogin/index.php/create" class="btn-create">+ Crear Nuevo Post</a>

        <!-- Bucle de posts -->
        <?php foreach ($posts as $post) : ?>
            <div class="post-card">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p><?= htmlspecialchars($post['body']) ?></p>
                
                <div class="actions">
                    <a href="/www/MVC-PostsLogin/index.php/show?id=<?= $post['id'] ?>" class="btn-view">Ver detalles</a>
                    <a href="/www/MVC-PostsLogin/index.php/edit?id=<?= $post['id'] ?>" class="btn-edit">Editar post</a>
                    <a href="/www/MVC-PostsLogin/index.php/delete?id=<?= $post['id'] ?>" class="btn-delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este post?');">Eliminar post</a>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="user-header">
            <h2>Hola, <?= htmlspecialchars($_SESSION['usuario'] ?? 'Usuario') ?></h2>
            <a href="/www/MVC-PostsLogin/index.php/logout" class="btn-logout">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>