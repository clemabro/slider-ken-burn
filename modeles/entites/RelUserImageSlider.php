<?php
class RelUserImageSlider
{
    private $_idImage;
    private $_login;
    private $_idSlider;

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

    public function getLogin() {
        return $this->_login;
    }

    public function getIdSlider() {
        return $this->_idSlider;
    }

    /* SETTERS */
    public function setIdImage($idImage) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idImage = (int) $idImage;

        if($idImage > 0) {
            $this->_idImage = $idImage;
        }
    }

    public function setLogin($login) {
        if(is_string($login)) {
            $this->_login = $login;
        }
    }

    public function setIdSlider($idSlider) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idSlider = (int) $idSlider;

        if($idSlider > 0) {
            $this->_idSlider = $idSlider;
        }
    }
}
?>