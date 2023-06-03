<?php


$menuItems = array(
    array("name" => "Cadastrar BD", "link" => "newdatabase.php"),
    array("name" => "Listar BD", "link" => "databases.php"),
    array("name" => "Sair", "link" => "logoff.php")
);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Inventário de bancos de dados</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php foreach ($menuItems as $menuItem) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $menuItem['link']; ?>"><?php echo $menuItem['name']; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>