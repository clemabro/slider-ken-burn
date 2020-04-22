<?php
class User
{
    private $_login;
    private $_password;

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
    public function getLogin() {
        return $this->_login;
    }

    public function getPassword() {
        return $this->_password;
    }

    /* SETTERS */
    public function setLogin($login) {
        if(is_string($login)) {
            $this->_login = $login;
        }
    }

    public function setPassword($password) {
        if(is_string($password)) {
            $this->_password = $password;
        }
    }
}
?>