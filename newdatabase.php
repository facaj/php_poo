<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Configurações</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        
        <?php
         require_once 'autoload.php';
         use Classes\DatabaseConfig;
        $config = new DatabaseConfig();

        if (isset($_POST['create'])) {
                $data = [
                    'host' => $_POST['host'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'database_name' => $_POST['database_name'],
                    'owner' => $_POST['owner'],
                    'driver' => $_POST['driver'],
                    'application' => $_POST['application'],
                    'informations' => $_POST['informations']
                ];
                $configId = $config->createConfig($data);
                echo "<div class='alert alert-success'>Configuração criada com o ID: $configId</div>";
            } 
        
        ?>
        <h2>Adicionar Base</h2>
        <form method="POST">
            <div class="form-group">
                <label for="host">Host:</label>
                <input type="text" class="form-control" id="host" name="host" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="database_name">Database Name:</label>
                <input type="text" class="form-control" id="database_name" name="database_name" required>
            </div>
            <div class="form-group">
                <label for="owner">Owner:</label>
                <input type="text" class="form-control" id="owner" name="owner" required>
        </div>
        <div class="form-group">
                <label for="driver">Driver:</label>
                <select class="form-control" id="driver" name="driver" required>
                    <?php
                    $supportedDrivers = PDO::getAvailableDrivers();
                    foreach ($supportedDrivers as $driver) {
                        echo '<option value="' . $driver . '">' . $driver . '</option>';
                    }
                    ?>
                </select>
            </div>
        <div class="form-group">
            <label for="application">Application:</label>
            <input type="text" class="form-control" id="application" name="application" required>
        </div>
        <div class="form-group">
            <label for="informations">Informations:</label>
            <textarea class="form-control" id="informations" name="informations" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="create">Criar Configuração</button>
    </form>

   
</div>
