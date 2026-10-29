<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f4f7f6;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            background: #27ae60;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>Crear Cuenta</h2>
        <?php if (isset($error)): ?>
            <p class="error">
                <?= $error ?>
            </p>
        <?php endif; ?>
        <form action="/www/MVC-PostsLogin/index.php/do-register" method="POST">
            <div class="input-group">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="input-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Registrarse</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            ¿Ya tienes cuenta? <a href="/www/MVC-PostsLogin/index.php/login">Inicia Sesión</a>
        </p>
    </div>
</body>

</html>