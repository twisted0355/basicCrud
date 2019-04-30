<?php
// import dependencies
require_once "../model/articleModel.php";
require_once "../model/rubriqueModel.php";
require_once "../model/usersModel.php";

// for menu from rubrique's table
$mainMenu = recupCategMenu($mysqli);




/*
 * article detail
 */
if(isset($_GET['idarticle'])&&ctype_digit($_GET['idarticle'])){
    $idarticle = (int) $_GET['idarticle'];
    $article = recupOneArticle($mysqli,$idarticle);

    // include view
    include("../view/publicArticleView.php");

/*
 *
 * rubrique detail
 *
 */
}elseif(isset($_GET['idrubrique'])&&ctype_digit($_GET['idrubrique'])){

    $idrubrique = (int) $_GET['idrubrique'];

    // recupération du détail de la rubrique
    $detailRubrique = recupOneRubrique($mysqli,$idrubrique);

    // si la catégorie n'existe pas
    if($detailRubrique===false){
        // include view error404
        include("../view/error404.php");
    }else{

        // recupération des articles se trouvant dans cette rubrique (ici avec la difficulté de prendre en une seule requête les rubriques de chaques articles). La solution la plus simple aurait été de ne pas afficher les rubriques pour chaque article dans la page rubrique. La deuxième solution plus simple était de faire une succession de plusieurs SELECT dans une boucle

        $articlesRub = recupArticleRub($mysqli,$idrubrique);

        // include view publicRubriqueView
        include("../view/publicRubriqueView.php");

    }

    /*
     *
     * Connexion
     *
     */
}elseif(isset($_GET['connect'])){

    // formulaire envoyé
    if(!empty($_POST)) {

        $thelogin = htmlspecialchars(strip_tags(trim($_POST['thelogin'])),ENT_QUOTES);
        $thepwd = htmlspecialchars(strip_tags(trim($_POST['thepwd'])),ENT_QUOTES);

        $connect = ConnectUser($mysqli,$thelogin,$thepwd);

        if(!$connect){
            $error = "Login ou mot de passe incorrecte";
        }
    }

    // include view
    include "../view/publicConnectView.php";

/*
 * Homepage
 */
}else{
    // articles récuparation
    $articles = recupArticleHomepage($mysqli);

    // include view
    include("../view/publicHomepageView.php");
}
