<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>basicCrud Connexion</title>

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
            <h1 class="mt-5">basicCrud Connexion</h1>
            <p class="lead">Veuillez vous connecter</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <h4 class="btn-danger"><?php
                if(isset($error)) echo $error;
                ?></h4>
            <form action="" method="post" name="connexion">
                <div class="form-group">
                    <label for="exampleInputEmail1">Votre login</label>
                    <input name="thelogin" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">Faites attention aux majuscules!</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input name="thepwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" value="Envoyer">
            </form>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>