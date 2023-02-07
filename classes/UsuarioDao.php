<?php
require_once 'classes/Usuario.php';

class UsuarioDao
{
    private $pdo;

    public function __construct($driver) {
        $this->pdo = $driver;
    }

    public function add($u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findAll() {
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setName($item['nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }
        return $array;
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            return $u;
        } else {
            return false;
        }
    }

    public function findById($id) {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        $data = $sql->fetch();
        $u = new Usuario();
        $u->setId($data['id']);
        $u->setName($data['nome']);
        $u->setEmail($data['email']);
        return $u;
    }

    public function update($u) {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
        $sql->bindValue(':id', $u->getId());
        $sql->bindValue(':nome', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();
        return true;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
