<?php
class Slider
{
    private $_idSlider;
    private $_nom;
    private $_dateCreation;
    private $_dateMaj;

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
    public function getIdSlider() {
        return $this->_idSlider;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getDateCreation() {
        return $this->_dateCreation;
    }

    public function getDateMaj() {
        return $this->_dateMaj;
    }

    /* SETTERS */
    public function setIdSlider($idSlider) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idSlider = (int) $idSlider;

        if($idSlider > 0) {
            $this->_idSlider = $idSlider;
        }
    }

    public function setNom($nom) {
        if(is_string($nom)) {
            $this->_nom = $nom;
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