<?php
require_once 'classes/Usuario.php';

class UsuarioDao
{
    private $pdo;

    public function __construct($driver)
    {
        $this->pdo = $driver;
    }

    public function add($u) {
        
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

    public function findByEmail($email)
    {
    }

    public function findById($id)
    {
    }

    public function update($u)
    {
    }

    public function delete($id)
    {
    }
}
