<?php
// import dependencies
require_once "../model/articleModel.php";
require_once "../model/rubriqueModel.php";
require_once "../model/usersModel.php";


if(isset($_GET['disconnect'])){

// déconnexion:

    disconnect();

}elseif(isset($_GET['create'])){

    // récupération de toutes les rubriques
    $recup_rub = recupCategMenu($mysqli);

    // si on a envoyé le formulaire
    if(!empty($_POST)){
        $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])),ENT_QUOTES);
        $thetext = htmlspecialchars(strip_tags(trim($_POST['thetext'])),ENT_QUOTES);
        $thedate = $_POST['thedate'];

        // de la session
        $idusers = $_SESSION['idusers'];

        // si on a coché une rubrique
        if(isset($_POST['rubrique'])) {
            $rub = $_POST['rubrique'];
        }else{
            $rub = [];
        }

        $insert = createArticleRedac($mysqli,$idusers,$thetitle,$thetext,$thedate,$rub);

    }

    require_once "../view/redacCreateView.php";

}else{

    // articles récuparation
    $articles = recupArticleRedac($mysqli, $_SESSION['idusers']);

    require_once "../view/redacHomepageView.php";
}