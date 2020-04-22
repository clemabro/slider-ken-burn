<?php
require_once('entites/Slider.php');

class SliderManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getAllSlider()
    {
        $result = [];

        $statement = $this->_db->prepare('SELECT * FROM slider');

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new Slider($donnees);
        }

        return $result;
    }

    public function getSliderById($idSlider)
    {
        $statement = $this->_db->prepare('SELECT * FROM slider WHERE idSlider = :idSlider');
        $statement->bindValue(':idSlider',$idSlider, PDO::PARAM_INT);

        try {
            $statement->execute();
        } catch (Exception $ex) {
            throw new Exception("Imposible d'éxecuter la requete", 500);
        }

        $donnees = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($donnees) {
            return new Slider($donnees);
        } else {
            return false;
        }
    }

    public function createSlider(Slider $slider)
    {
        $statement = $this->_db->prepare("INSERT INTO slider VALUES (:idSlider,
                                            :nom,
                                            :dateCreation,
                                            :dateMaj)");

        $statement->bindValue(":idSlider", $slider->getIdSlider(), PDO::PARAM_INT);
        $statement->bindValue(":nom", $slider->getNom(), PDO::PARAM_STR);
        $statement->bindValue(":dateCreation", date_format($slider->getDateCreation(), 'Y-m-d'));
        $statement->bindValue(":dateMaj", date_format($slider->getDateMaj(), 'Y-m-d'));

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function updateSider(Slider $slider)
    {
        $statement = $this->_db->prepare("UPDATE slider SET 
                                            nom = :nom,
                                            dateCreation = :dateCreation,
                                            dateMaj = :dateMaj WHERE idSlider = :idSlider");

        $statement->bindValue(":idSlider", $slider->getIdSlider(), PDO::PARAM_INT);
        $statement->bindValue(":nom", $slider->getNom(), PDO::PARAM_STR);
        $statement->bindValue(":dateCreation", date_format($slider->getDateCreation(), 'Y-m-d'));
        $statement->bindValue(":dateMaj", date_format($slider->getDateMaj(), 'Y-m-d'));

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function deleteSlider($idSlider)
    {
        $statement = $this->_db->prepare("DELETE FROM slider where idSlider = :idSlider");
        $statement->bindParam(':idSlider', $idSlider);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>