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

    public function getUserById($idUser)
    {
        $statement = $this->_db->prepare('SELECT * FROM user WHERE idUser = :idUser');
        $statement->bindValue(':idUser',$idUser, PDO::PARAM_INT);

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
        $statement = $this->_db->prepare("INSERT INTO user VALUES (:idUser,
                                            :login,
                                            :password)");

        $statement->bindValue(":idUser", $user->getIdUser(), PDO::PARAM_INT);
        $statement->bindValue(":login", $user->getLogin(), PDO::PARAM_STR);
        $statement->bindValue(":password", $user->getPassword(), PDO::PARAM_STR));

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function updateUser(User $user)
    {
        $statement = $this->_db->prepare("UPDATE user SET 
                                            login = :login,
                                            password = :password WHERE idUser = :idUser");

        $statement->bindValue(":idUser", $user->getIdUser(), PDO::PARAM_INT);
        $statement->bindValue(":login", $user->getLogin(), PDO::PARAM_STR);
        $statement->bindValue(":password", $user->getPassword(), PDO::PARAM_STR));

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function deleteUser($idUser)
    {
        $statement = $this->_db->prepare("DELETE FROM user where idUser = :idUser");
        $statement->bindParam(':idUser', $idUser);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>