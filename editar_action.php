<?php

require 'config.php';
require 'classes/UsuarioDao.php';
$usuarioDao = new UsuarioDao($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    $u = $usuarioDao->findById($id);
    $u->setName($name);
    $u->setEmail($email);
    $usuarioDao->update($u);

    header('Location: index.php');
    exit;

} else {
    header('Location: editar.php?id='.$id);
    exit;
}

?>