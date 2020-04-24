<?php
require_once 'entites/Image.php';

class ImageManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getAllImage()
    {
        $result = [];

        $statement = $this->_db->prepare('SELECT * FROM image');

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new Image($donnees);
        }

        return $result;
    }

    public function getImageById($idImage)
    {
        $statement = $this->_db->prepare('SELECT * FROM image WHERE idImage = :idImage');
        $statement->bindValue(':idImage',$idImage, PDO::PARAM_INT);

        try {
            $statement->execute();
        } catch (Exception $ex) {
            throw new Exception("Imposible d'éxecuter la requete", 500);
        }

        $donnees = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($donnees) {
            return new Image($donnees);
        } else {
            return false;
        }
    }

    public function createImage(Image $image)
    {

        $statement = $this->_db->prepare("INSERT INTO image 
                                        (tempsAffichage,
                                        x_source,
                                        y_source,
                                        largeur_source,
                                        hauteur_source,
                                        x_destination,
                                        y_destination,
                                        largeur_destination,
                                        hauteur_destination,
                                        chemin,
                                        titre
                                        ) VALUES (
                                            :tempsAffichage,
                                            :x_source,
                                            :y_source,
                                            :largeur_source,
                                            :hauteur_source,
                                            :x_destination,
                                            :y_destination,
                                            :largeur_destination,
                                            :hauteur_destination,
                                            :chemin,
                                            :titre)");

        $statement->bindValue(":tempsAffichage", $image->getTempsAffichage(), PDO::PARAM_INT);
        $statement->bindValue(":x_source", $image->getX_source());
        $statement->bindValue(":y_source", $image->getY_source());
        $statement->bindValue(":largeur_source", $image->getLargeur_source());
        $statement->bindValue(":hauteur_source", $image->getHauteur_source());
        $statement->bindValue(":x_destination", $image->getX_destination());
        $statement->bindValue(":y_destination", $image->getY_destination());
        $statement->bindValue(":largeur_destination", $image->getLargeur_destination());
        $statement->bindValue(":hauteur_destination", $image->getHauteur_destination());
        $statement->bindValue(":chemin", $image->getChemin(), PDO::PARAM_STR);
        $statement->bindValue(":titre", $image->getTitre(), PDO::PARAM_STR);
        $statement->execute() or die(print_r($statement->errorInfo()));
        
        $statement = $this->_db->prepare("SELECT * FROM image where idImage = :idImage");

        $statement->bindValue(':idImage', $this->_db->lastInsertId());
        $statement->execute() or die(print_r($statement->errorInfo()));

        $donnees = $statement->fetch(PDO::FETCH_ASSOC);

        if($donnees) {
            return new Image($donnees);
        } else {
            return false;
        }
    }

    public function updateImage(Image $image)
    {
        $statement = $this->_db->prepare("UPDATE image SET 
                                            tempsAffichage = :tempsAffichage,
                                            x_source = :x_source,
                                            y_source = :y_source,
                                            largeur_source = :largeur_source,
                                            hauteur_source = :hauteur_source,
                                            x_destination = :x_destination,
                                            y_destination = :y_destination,
                                            largeur_destination = :largeur_destination,
                                            hauteur_destination = :hauteur_destination,
                                            chemin = :chemin
                                            titre = :titre WHERE idImage = :idImage");

        $statement->bindValue(":idImage", $image->getIdImage(), PDO::PARAM_INT);
        $statement->bindValue(":tempsAffichage", $image->getTempsAffichage(), PDO::PARAM_INT);
        $statement->bindValue(":x_source", $image->getX_source());
        $statement->bindValue(":y_source", $image->getY_source());
        $statement->bindValue(":largeur_source", $image->getLargeur_source());
        $statement->bindValue(":hauteur_source", $image->getHauteur_source());
        $statement->bindValue(":x_destination", $image->getX_destination());
        $statement->bindValue(":y_destination", $image->getY_destination());
        $statement->bindValue(":largeur_destination", $image->getLargeur_destination());
        $statement->bindValue(":hauteur_destination", $image->getHauteur_destination());
        $statement->bindValue(":chemin", $image->getChemin(), PDO::PARAM_STR);
        $statement->bindValue(":titre", $image->getTitre(), PDO::PARAM_STR);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function deleteImage($idImage)
    {
        $statement = $this->_db->prepare("DELETE FROM image where idImage = :idImage");
        $statement->bindParam(':idImage', $idImage);

        $statement->execute() or die(print_r($statement->errorInfo()));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>