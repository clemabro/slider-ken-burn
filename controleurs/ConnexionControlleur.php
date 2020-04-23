<?php
/*
    Fonction
*/
function connexion()
{
    $title = "Me connecter";
    require_once 'vues/connexion.php';
}

function isExistUser()
{
    $user = getUserManager()->getUserByLogin($_POST['login']);
    $isExistUser = false;

    if($user)
    {
        $isExistUser = true;
    }

    header('Content-Type: application/json;charset=utf-8');
    echo json_encode(array(
        'isExistUser' => $isExistUser
    ));
}

function inscription()
{
    $mdp=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $login = $_POST['username'];

    $user = new User(array(
        'login' => $login,
        'password' => $mdp
    ));

    getUserManager()->createUser($user);

    header('Location: connexion');
}

function connexionUser()
{
    $isCompteExiste = false;

    //Récupération des champs du formulaire
    $login = $_POST['username'];
    $mdp = $_POST['password'];

    //On va chercher l'objet user
    $user = getUserManager()->getUserByLogin($login);

    if($user != false)
    {
        //On récupère son mot de passe de la base de données
        $verifMdp = $user->getPassword();
        //Et on vérifie si son mot de passe est correct
        $isCompteExiste = password_verify($mdp, $verifMdp);
    }

    if($isCompteExiste) {
        session_start();
        $_SESSION['login'] = $login;
    }

    //On retourne un booleen avec true si l'identifiant et le mot de passe sont bon et false si il y' a eu un problème dans la connexion
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($isCompteExiste);
}
?>