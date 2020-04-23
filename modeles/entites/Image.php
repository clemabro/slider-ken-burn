<?php
class Image
{
    private $_idImage;
    private $_tempsAffichage;
    private $_x_source;
    private $_y_source;
    private $_largeur_source;
    private $_hauteur_source;
    private $_x_destination;
    private $_y_destination;
    private $_largeur_destination;
    private $_hauteur_destination;
    private $_chemin;
    private $_idTypeZoom;

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

    public function getTempsAffichage() {
        return $this->_tempsAffichage;
    }

    public function getX_source(){
        return $this->_x_source;
    }

    public function getY_source() {
        return $this->_y_source;
    }

    public function getLargeur_source() {
        return $this->_largeur_source;
    }

    public function getHauteur_source() {
        return $this->_hauteur_source;
    }

    public function getX_destination() {
        return $this->_x_destination;
    }

    public function getY_destination() {
        return $this->_y_destination;
    }

    public function getLargeur_destination() {
        return $this->_largeur_destination;
    }

    public function getHauteur_destination() {
        return $this->_hauteur_destination;
    }

    public function getChemin() {
        return $this->_chemin;
    }

    public function getIdTypeZoom() {
        return $this->_idTypeZoom;
    }

    /* SETTERS */
    public function setIdImage($idImage) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idImage = (int) $idImage;

        if($idImage > 0) {
            $this->_idImage = $idImage;
        }
    }

    public function setTempsAffichage($tempsAffichage) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $tempsAffichage = (int) $tempsAffichage;

        if($tempsAffichage >= 0) {
            $this->_tempsAffichage = $tempsAffichage;
        }
    }

    public function setX_source($x_source) {
        $x_source = (float) $x_source;

        if($x_source >= 0) {
            $this->_x_source = $x_source;
        }
    }

    public function setY_source($y_source) {
        $y_source = (float) $y_source;

        if($y_source >= 0) {
            $this->_y_source = $y_source;
        }
    }

    public function setLargeur_source($largeur_source) {
        $largeur_source = (float) $largeur_source;

        if($largeur_source >= 0) {
            $this->_largeur_source = $largeur_source;
        }
    }

    public function setHauteur_source($hauteur_source) {
        $hauteur_source = (float) $hauteur_source;

        if($hauteur_source >= 0) {
            $this->_hauteur_source = $hauteur_source;
        }
    }

    public function setX_destination($x_destination) {
        $x_destination = (float) $x_destination;

        if($x_destination >= 0) {
            $this->_x_destination = $x_destination;
        }
    }

    public function setY_destination($y_destination) {
        $y_destination = (float) $y_destination;

        if($y_destination >= 0) {
            $this->_y_destination = $y_destination;
        }
    }

    public function setLargeur_destination($largeur_destination) {
        $largeur_destination = (float) $largeur_destination;

        if($largeur_destination >= 0) {
            $this->_largeur_destination = $largeur_destination;
        }
    }

    public function setHauteur_destination($hauteur_destination) {
        $hauteur_destination = (float) $hauteur_destination;

        if($hauteur_destination >= 0) {
            $this->_hauteur_destination = $hauteur_destination;
        }
    }

    public function setChemin($chemin) {
        if(is_string($chemin)) {
            $this->_chemin = $chemin;
        }
    }
}
?>