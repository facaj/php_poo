<?php

session_start();

if (isset($_SESSION['username'])) {
    header('Location: databases.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Depois implemento no BD
    if ($username === 'admin' && $password === 'admin') {

        $_SESSION['username'] = $username;
        header('Location: databases.php');
        exit;
    } else {
        $error = "Credenciais inválidas. Tente novamente.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f3f3;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            height: 40px;
        }

        .btn-primary {
            width: 100%;
            height: 40px;
        }

        .alert-danger {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inventário de banco de dados</h1>
        <h6>Versão conceito login: admin/admin </h6>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form method="post" action="index.php">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>
</html>

