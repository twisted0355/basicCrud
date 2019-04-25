<?php

/*
 * PUBLIC MENU
 */
function recupCategMenu(mysqli $db) {

    $sql = "SELECT idrubrique, theintitule FROM rubrique ORDER BY theintitule ASC;";
    $recup= mysqli_query($db,$sql);

    // si on a des résultats
    if(mysqli_num_rows($recup)){
        return mysqli_fetch_all($recup, MYSQLI_ASSOC);
    }else{
        return false;
    }
}

/*
 * RECUPERE le détail d'une catégorie
 * @param mysqli
 * @param int
 * @return array|false
 */
function recupOneRubrique(mysqli $db, int $id)
{
    $id = (int) $id;
    $sql="SELECT * FROM rubrique WHERE idrubrique=$id;";
    $recup= mysqli_query($db,$sql);

    // si on a un résultat
    if(mysqli_num_rows($recup)){
        return mysqli_fetch_assoc($recup);
    }else{
        return false;
    }
}