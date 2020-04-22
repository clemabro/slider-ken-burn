<?php
/*
    Import fichier
*/
require_once 'modeles/Managers.php';

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
?>