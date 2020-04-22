<?php
require_once('entites/RelUserImageSlider.php')

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

    public function getRelUserImageSliderById($idUser, $idImage, $idSlider)
    {
        $statement = $this->_db->prepare('SELECT * FROM reluserimageslider WHERE idUser = :idUser AND idImage = :idImage AND idSlider = :idSlider');
        $statement->bindValue(':idUser',$idUser, PDO::PARAM_INT);
        $statement->bindValue(':idImage',$idImage, PDO::PARAM_INT);
        $statement->bindValue(':idSlider',$idSlider, PDO::PARAM_INT);

        try {
            $statement->execute();
        } catch (Exception $ex) {
            throw new Exception("Imposible d'éxecuter la requete", 500);
        }

        $donnees = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($donnees) {
            return new RelUserImageSlider($donnees);
        } else {
            return false;
        }
    }

    public function createRelUserImageSlider(RelUserImageSlider $relUserImageSlider)
    {
        $statement = $this->_db->prepare("INSERT INTO reluserimageslider VALUES (:idUser,
                                            :idImage,
                                            :idSlider)");

        $statement->bindValue(':idUser',$relUserImageSlider->getIdUser(), PDO::PARAM_INT);
        $statement->bindValue(':idImage',$relUserImageSlider->getIdImage(), PDO::PARAM_INT);
        $statement->bindValue(':idSlider',$relUserImageSlider->getIdSlider(), PDO::PARAM_INT);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function deleteRelUserImageSlider($idUser, $idImage, $idSlider)
    {
        $statement = $this->_db->prepare("DELETE FROM reluserimageslider WHERE idUser = :idUser AND idImage = :idImage AND idSlider = :idSlider");
        $statement->bindValue(':idUser',$idUser, PDO::PARAM_INT);
        $statement->bindValue(':idImage',$idImage, PDO::PARAM_INT);
        $statement->bindValue(':idSlider',$idSlider, PDO::PARAM_INT);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>