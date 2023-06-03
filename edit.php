<?php
require_once 'autoload.php';
use Classes\DatabaseConfig;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $config = new DatabaseConfig();

    if (isset($_POST['update'])) {
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

        $config->updateConfig($id, $data);
        header('Location: index.php');
        exit;
    }
    $configData = $config->getConfigById($id);

    // Verifica se a configuração existe
    if ($configData) {
        $host = $configData['host'];
        $username = $configData['username'];
        $password = $configData['password'];
        $database_name = $configData['database_name'];
        $owner = $configData['owner'];
        $driver = $configData['driver'];
        $application = $configData['application'];
        $informations = $configData['informations'];
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Configuração</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Configuração</h1>
        <form method="post">
            <div class="form-group">
                <label for="host">Host:</label>
                <input type="text" class="form-control" id="host" name="host" value="<?php echo $host; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="form-group">
                <label for="database_name">Database:</label>
                <input type="text" class="form-control" id="database_name" name="database_name" value="<?php echo $database_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="owner">Owner:</label>
                <input type="text" class="form-control" id="owner" name="owner" value="<?php echo $owner; ?>" required>
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
                <input type="text" class="form-control" id="application" name="application" value="<?php echo $application; ?>" required>
            </div>
            <div class="form-group">
                <label for="informations">Informations:</label>
                <textarea class="form-control" id="informations" name="informations" required><?php echo $informations; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>
