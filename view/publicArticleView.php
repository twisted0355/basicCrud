<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>basicCrud | </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
    <?php
    include "publicMainMenuView.php";
    ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">basicCrud |</h1>
            <p class="lead">Détail de l'article</p>
        </div>
    </div>
<!-- Articles -->
    <?php
    // pas d'article
    if($article===false){
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <hr>
                <h2>Erreur 404</h2>
                <h3>Cet article n'existe plus</h3>
                <hr>
            </div>
        </div>
    <?php
    }else {
            // pas de rubriques
            if(is_null($article['idrubrique'])){
                $idrubrique="";
            }else {
     $idrubrique = explode(',', $article['idrubrique']);
     $theintitule = explode('|@|',$article['theintitule']);
            }
            ?>
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2><?= $article['thetitle'] ?></h2>
                    <h4>Catégorie : <small><?php
             if(empty($idrubrique)){
                 ?>
                 Cet article n'est dans aucune catégorie
                 <?php
             }else{
                 foreach($theintitule as $clef => $intitule){
                     ?>
                     <a href="?idrubrique=<?=$idrubrique[$clef]?>"><?=$intitule?></a> |
                     <?php
                 }
             }
                            ?></small></h4>
                    <p><?= nl2br($article['thetext'])?></p>
                    <p><?= $article['thedate'] ?></p>
                    <p>Auteur: <?= $article['thename'] ?></p>
                </div>
            </div>
            <hr>
            <?php

    }
    ?>
</div>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>