<?php
require 'config.php';
require 'classes/UsuarioDao.php';

$usuarioDao = new UsuarioDao($pdo);


$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDao->delete($id);
}

header("Location: index.php");
exit;
