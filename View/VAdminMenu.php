<?php ob_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto lead">
                    <li class="nav-item">
                        <a href="index.php?page=gpav" class="nav-link">Gestion des PAV</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=ground" class="nav-link">Gestion des tournées</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=gcomptes" class="nav-link">Gestion des comptes agent</a>
                    </li>
                    <li>
                        <a href="index.php?page=deconnection" class="btn btn-outline-secondary btn-block">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
    $menu =ob_get_contents();
    ob_clean();
?>