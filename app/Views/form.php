<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($post) ? 'Editar Post' : 'Crear Post' ?></title>
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
        }
        .form-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #34495e;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 15px;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        .btn-submit {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-submit:hover { background-color: #219150; }
        .btn-cancel {
            display: inline-block;
            text-decoration: none;
            color: #7f8c8d;
            margin-left: 15px;
            font-weight: bold;
        }
        .btn-cancel:hover { color: #e74c3c; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1><?= isset($post) ? 'Editar Post' : 'Crear Nuevo Post' ?></h1>
        
        <form action="/www/MVC-PostsLogin/index.php/<?= isset($post) ? 'update?id='.$post['id'] : 'store' ?>" method="POST">
                    
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required 
                       value="<?= isset($post) ? htmlspecialchars($post['title']) : '' ?>">
            </div>

            <div class="form-group">
                <label for="body">Cuerpo:</label>
                <textarea id="body" name="body" required rows="6"><?= isset($post) ? htmlspecialchars($post['body']) : '' ?></textarea>
            </div>

            <button type="submit" class="btn-submit"><?= isset($post) ? 'Actualizar' : 'Guardar' ?></button>
            <a href="/www/MVC-PostsLogin/" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>