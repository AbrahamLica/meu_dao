<?php
require 'config.php';
require 'classes/UsuarioDao.php';

$usuarioDao = new UsuarioDao($pdo);
$lista = $usuarioDao->findAll();
?>

<a href="adicionar.php">ADICIONAR USUARIO</a>

<table border="1" width='100%'>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>

    <?php foreach ($lista as $lista) : ?>
        <tr>
            <td><?=$lista->getId();?></td>
            <td><?=$lista->getName();?></td>
            <td><?=$lista->getEmail();?></td>
            <td>
                <a href="editar.php?id=<?=$lista->getId();?>">[ EDITAR ]</a>
                <a href="excluir.php?id=<?=$lista->getId();?>">[ EXCLUIR ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    
?>