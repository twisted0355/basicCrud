<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>basicCrud Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
    <?php
    include "publicMainMenu.php";
    ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">basicCrud Homepage</h1>
            <p class="lead">Liste des articles de notre site</p>
        </div>
    </div>
<!-- Articles -->
    <?php
    // pas d'article
    if($articles===false){
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <hr>
                <h2>Pas encore d'articles</h2>
                <h3>Veuillez revenir plus tard</h3>
                <hr>
            </div>
        </div>
    <?php
    }else {
        foreach ($articles AS $itemArticle) {
            ?>
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2><?= $itemArticle['thetitle'] ?></h2>
                    <p><?= $itemArticle['thetext'] ?></p>
                    <p><?= $itemArticle['thedate'] ?></p>
                    <p>Auteur: <?= $itemArticle['thename'] ?></p>
                </div>
            </div>
            <hr>
            <?php
        }
    }
    ?>
</div>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>