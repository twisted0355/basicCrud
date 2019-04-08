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