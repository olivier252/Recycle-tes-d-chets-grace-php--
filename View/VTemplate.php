<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="PAV" content="gestionnaire de taux de remplissage de PAV" />
        <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script
                src="http://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <title><?= $title ?></title>
    </head>
    <body>
        <?php
        if (isset($menu))
            echo $menu;
            if (isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && !empty($_SESSION['firstName'])){
                ?><p>Bienvenue <?= $_SESSION['firstName'] ?> <?= $_SESSION['lastName'] ?></p><?php
            }
            else if (isset($_SESSION['user'])){
                ?>
                    <div class="container mb-5 mt-5">
                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <h1 class="h3">Bienvenue <?= $_SESSION['user'] ?></h1>
                                <h4>Choisissez une action dans le menu</h4>
                            </div>
                        </div>

                    </div>
                <?php
            }

            if (isset($content))
                echo $content;
        ?>
    </body>
</html>