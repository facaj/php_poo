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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_GET['delete'])) {
                $configId = $_GET['delete'];
                $deletedRows = $config->deleteConfig($configId);
                echo "<div class='alert alert-success'>Configuração excluída. Número de linhas excluídas: $deletedRows</div>";
        }}
        ?>

<h2>Bases cadastradas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Host</th>
                <th>Username</th>
                <th>Database Name</th>
                <th>Owner</th>
                <th>Driver</th>
                <th>Application</th>
                <th>Informations</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $allConfigs = $config->getAllConfigs();
            foreach ($allConfigs as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['host'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['database_name'] . "</td>";
                echo "<td>" . $row['owner'] . "</td>";
                echo "<td>" . $row['driver'] . "</td>";
                echo "<td>" . $row['application'] . "</td>";
                echo "<td>" . $row['informations'] . "</td>";
                echo "<td><a href='lgpd.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Verificar LGPD</a> ";
                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Editar</a> ";
                echo "<a href='databases.php?delete=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir esta configuração?\")'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href='newdatabase.php?" . "' class='btn btn-primary btn-sm'>Cadastrar nova base</a> 
   
</div>
