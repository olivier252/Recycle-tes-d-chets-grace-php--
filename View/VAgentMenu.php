<?php ob_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h3>Veuillez sélectionner une tournée</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto lead">
                    <label>
                        <select name="pavEdit" size="1" class="form-control">
                            <?= $pavList ?>
                        </select>
                    </label>

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