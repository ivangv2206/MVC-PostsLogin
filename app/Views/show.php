<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }
        .post-card {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 650px;
            border: 1px solid #e1e8ed;
        }
        h1 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 26px;
            border-bottom: 2px solid #f4f7f6;
            padding-bottom: 15px;
            word-wrap: break-word;
        }
        .content {
            font-size: 16px;
            line-height: 1.6;
            color: #4a5568;
            margin-bottom: 30px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }
        .actions a {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-back {
            color: #555;
            background-color: #e2e8f0;
            border: 1px solid #cbd5e1;
        }
        .btn-back:hover {
            background-color: #cbd5e1;
        }
        .btn-edit { 
            color: #d35400; 
            background-color: #fdf2e9; 
            border: 1px solid #d35400;
        }
        .btn-edit:hover { 
            background-color: #d35400; 
            color: white; 
        }
        .btn-delete { 
            color: #c0392b; 
            background-color: #fdedec; 
            border: 1px solid #c0392b;
        }
        .btn-delete:hover { 
            background-color: #c0392b; 
            color: white; 
        }
    </style>
</head>
<body>
    <div class="post-card">
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        
        <div class="content">
            <?= htmlspecialchars($post['body']) ?>
        </div>
        
        <div class="actions">
            <a href="/www/MVC-PostsLogin/index.php" class="btn-back">← Volver al listado</a>
            <a href="/www/MVC-PostsLogin/index.php/edit?id=<?= $post['id'] ?>" class="btn-edit">Editar post</a>
            <a href="/www/MVC-PostsLogin/index.php/delete?id=<?= $post['id'] ?>" class="btn-delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este post?');">Eliminar post</a>
        </div>
    </div>
</body>
</html>