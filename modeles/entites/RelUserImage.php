<?php
class RelUserImage
{
    private $_idImage;
    private $_idUser;
    private $_dateCreation;
    private $_dateMaj

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /* GETTERS */
    public function getIdImage() {
        return $this->_idImage;
    }

    public function getIdUser() {
        return $this->_idUser;
    }

    public function getDateCreation() {
        return $this->_dateCreation;
    }

    public function getDateMaj() {
        return $this->_dateMaj;
    }

    /* SETTERS */
    public function setIdImage($idImage) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idImage = (int) $idImage;

        if($idImage > 0) {
            $this->_idImage = $idImage;
        }
    }

    public function setIdUser($idUser) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idUser = (int) $idUser;

        if($idUser > 0) {
            $this->_idUser = $idUser;
        }
    }

    public function setDateCreation($dateCreation) {
        $this->_dateCreation = date_create($dateCreation);
    }

    public function setDateMaj($dateMaj) {
        $this->_dateMaj = date_create($dateMaj);
    }
}
?>