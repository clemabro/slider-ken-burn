<?php
require_once('entites/User.php');

class UserManger
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getAllUser()
    {
        $result = [];

        $statement = $this->_db->prepare('SELECT * FROM user');

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new User($donnees);
        }

        return $result;
    }

    public function getUserByLogin($login)
    {
        $statement = $this->_db->prepare('SELECT * FROM user WHERE login = :login');
        $statement->bindValue(':login',$login, PDO::PARAM_STR);

        try {
            $statement->execute();
        } catch (Exception $ex) {
            throw new Exception("Imposible d'éxecuter la requete", 500);
        }

        $donnees = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($donnees) {
            return new User($donnees);
        } else {
            return false;
        }
    }

    public function createUser(User $user)
    {
        $statement = $this->_db->prepare("INSERT INTO user VALUES (
                                            :login,
                                            :password)");

        $statement->bindValue(":login", $user->getLogin(), PDO::PARAM_STR);
        $statement->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function updateUser(User $user)
    {
        $statement = $this->_db->prepare("UPDATE user SET
                                            password = :password WHERE login = :login");

        $statement->bindValue(":login", $user->getLogin(), PDO::PARAM_STR);
        $statement->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function deleteUser($login)
    {
        $statement = $this->_db->prepare("DELETE FROM user where login = :login");
        $statement->bindValue(':login', $login);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>