<?php
// import dependencies
require_once "../model/articleModel.php";
require_once "../model/rubriqueModel.php";

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
    }

    // include view


/*
 * Homepage
 */
}else{
    // articles récuparation
    $articles = recupArticleHomepage($mysqli);

    // include view
    include("../view/publicHomepageView.php");
}
