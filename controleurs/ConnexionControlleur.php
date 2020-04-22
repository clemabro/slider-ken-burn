<?php
/*
    Import fichier
*/

/*
    Fonction
*/
function connexion()
{
    require __DIR__.'/../vues/connexion.php';
}

function isExistUser()
{
    $user = getUserManager()->getUserByLogin($_POST['login']);
    $toReturn = false;

    if($user)
    {
        $toReturn = true;
    }

    header('Content-Type: application/json;charset=utf-8');
    echo json_encode(array(
        'isExistUser' => $toReturn
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
?>