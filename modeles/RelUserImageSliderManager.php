<?php
require_once 'entites/RelUserImageSlider.php';

class RelUserImageSliderManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getAllRelUserImageSlider()
    {
        $result = [];

        $statement = $this->_db->prepare('SELECT * FROM reluserimageslider');

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new RelUserImageSlider($donnees);
        }

        return $result;
    }

    public function getRelUserImageSliderById($login, $idImage, $idSlider)
    {
        $statement = $this->_db->prepare('SELECT * FROM reluserimageslider WHERE login = :login AND idImage = :idImage AND idSlider = :idSlider');
        $statement->bindValue(':login',$login, PDO::PARAM_STR);
        $statement->bindValue(':idImage',$idImage, PDO::PARAM_INT);
        $statement->bindValue(':idSlider',$idSlider, PDO::PARAM_INT);

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new RelUserImageSlider($donnees);
        }

        return $result;
    }

    public function getRelUserImageSliderByLogin($login)
    {
        $result = [];
        $statement = $this->_db->prepare('SELECT * FROM reluserimageslider WHERE login = :login');
        $statement->bindValue(':login',$login, PDO::PARAM_STR);

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new RelUserImageSlider($donnees);
        }

        return $result;
    }

    public function createRelUserImageSlider(RelUserImageSlider $relUserImageSlider)
    {
        $statement = $this->_db->prepare("INSERT INTO reluserimageslider (login, idImage, idSlider) VALUES (:login,
                                            :idImage,
                                            :idSlider)");

        $statement->bindValue(':login',$relUserImageSlider->getLogin(), PDO::PARAM_STR);
        $statement->bindValue(':idImage',$relUserImageSlider->getIdImage(), PDO::PARAM_INT);
        $statement->bindValue(':idSlider',$relUserImageSlider->getIdSlider(), PDO::PARAM_INT);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function deleteRelUserImageSlider($login, $idImage, $idSlider)
    {
        $statement = $this->_db->prepare("DELETE FROM reluserimageslider WHERE login = :login AND idImage = :idImage AND idSlider = :idSlider");
        $statement->bindValue(':login', $login, PDO::PARAM_STR);
        $statement->bindValue(':idImage', $idImage, PDO::PARAM_INT);
        $statement->bindValue(':idSlider', $idSlider, PDO::PARAM_INT);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>