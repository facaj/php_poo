<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
    <!-- Incluindo os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php require_once 'autoload.php'; ?>
        <h1>Resultado</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
<?php

use Classes\DatabaseConfig;
use Classes\DatabaseLGPD;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $config = new DatabaseConfig();
    
    $configData = $config->getConfigById($id);


    if ($configData) {
        $host = $configData['host'];
        $username = $configData['username'];
        $password = $configData['password'];
        $database = $configData['database_name'];
        $driver = $configData['driver'];

        try {
            $lgpd = new DatabaseLGPD($host, $username, $password, $database, false, $driver);
            $resultado = $lgpd->LGPD();
            echo "<p> Database: ". $database . " com id ". $id. "<p>";
            echo "<h1>". $resultado . "</h1>";
        } catch (Exception $e) {
            echo "Ocorreu um erro ao conectar ";
        }
    } else {
        echo "ID não encontrado.";
    }
}else {
    echo "ID não fornecido.";
}
?>
</div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <a href="databases.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
    
    <!-- Incluindo os arquivos JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>