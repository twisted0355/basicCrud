<?php
// import dependencies
require_once "../model/articleModel.php";
require_once "../model/rubriqueModel.php";
require_once "../model/usersModel.php";


if(isset($_GET['disconnect'])){

// déconnexion:

    disconnect();

}else{

    // articles récuparation
    $articles = recupArticleRedac($mysqli, $_SESSION['idusers']);

    require_once "../view/redacHomepageView.php";
}