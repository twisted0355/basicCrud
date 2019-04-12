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



/*
 *
 * rubrique detail
 *
 */
}elseif(isset($_GET['idrubrique'])&&ctype_digit($_GET['idrubrique'])){



/*
 * Homepage
 */
}else{
    // articles récuparation
    $articles = recupArticleHomepage($mysqli);

    // include view
    include("../view/publicHomepageView.php");
}
