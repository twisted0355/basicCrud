<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>basicCrud Rédacteur Create Article</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
    <?php
    include "redacMainMenuView.php";
    ?>
<h3>Bienvenue <?= $_SESSION['thename'] ?></h3>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">basicCrud Rédacteur Create Article</h1>
            <p class="lead">Votre article devra être validé pour apparaître sur le site</p>
        </div>
    </div>
    <form action="" method="post" name="create">
        <div class="form-group">
            <label for="exampleInputEmail1">Le titre</label>
            <input name="thetitle" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Votre titre" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Votre texte</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="thetext" rows="3" required></textarea>
        </div>
        <input type="datetime-local" name="thedate" required>

            <?php
            foreach($recup_rub AS $item) {
                ?>
        <div class="form-check">
                <input name="rubrique[]" class="form-check-input" type="checkbox" value="<?=$item['idrubrique']?>" id="defaultCheck">
                <label class="form-check-label" for="defaultCheck">
                    <?=$item['theintitule']?>
                </label>
        </div>
                <?php
            }
            ?>

        <input type="submit" class="btn btn-primary" value="Envoyer">
    </form>

</div>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>