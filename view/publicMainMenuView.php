<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="./">basicCrud Homepage</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./">Homepage
                    </a>
                </li>
                <?php
                foreach ($mainMenu AS $itemMenu) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?idrubrique=<?=$itemMenu['idrubrique']?>"><?=$itemMenu['theintitule']?></a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="?contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?connect">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
