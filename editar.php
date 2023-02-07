<?php

require 'config.php';
require 'classes/UsuarioDao.php';

$usuarioDao = new UsuarioDao($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuario = $usuarioDao->findById($id);
} else {
    header('Location: index.php');
    exit;
}

?>

<h1>Editar Usuário</h1>

<form action="editar_action.php" method="POST">

    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">

    <label for="">
        Nome: <br>
        <input type="text" name="name" value="<?= $usuario->getName(); ?>">
    </label> <br> <br>

    <label for="">
        Email: <br>
        <input type="email" name="email" value="<?= $usuario->getEmail(); ?>">
    </label> <br> <br>

    <input type="submit" value="Salvar">


</form>