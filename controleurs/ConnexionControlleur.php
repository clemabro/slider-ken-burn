<?php
/*
    Fonction
*/
function connexion()
{
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
?>