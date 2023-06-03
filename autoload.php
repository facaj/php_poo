<?php

require_once 'includes/verificaLogin.php';
require_once 'includes/menu.php';
require_once 'includes/config.php';
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});
?>