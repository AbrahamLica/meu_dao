<?php
require 'config.php';
require 'classes/UsuarioDao.php';

$usuarioDao = new UsuarioDao($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    if ($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setName($name);
        $novoUsuario->setEmail($email);
        $usuarioDao->add($novoUsuario);

        header('Location: index.php');
        exit;
    } else {
        header('Location: adicionar.php');
        exit;
    }
} else {
    header('Location: adicionar.php');
    exit;
}
