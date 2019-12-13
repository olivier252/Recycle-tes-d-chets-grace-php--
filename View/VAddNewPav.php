<?php
ob_start();
?>

<div class="container">

    <div class="row">
        <div class="col-md-4">
            <?php
            if (isset($sousMenu) && $sousMenu == "admGestionCompte")
            {
                ?>
                <div>
                    <ul>
                        <li><a href="index.php?page=gpav&action=creationPav" >Creation d'un PAV</a></li>
                        <li><a href="index.php?page=gpav&action=editPav" >Modifier un PAV</a></li>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-md-8">
            <h3><?= $subtitle ?></h3>

            <form action="#" method="post">
                <div class="form-group">
                    <label for="adress">Adress</label>
                    <input type="text" class="form-control" id="adress" name="adress" required>
                </div>

                <div class="form-group">
                    <label for="fullness">Niveau de remplissage</label>
                    <input type="text" class="form-control" id="fullness" name="fullness" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

            <?php
            if (isset($validation) && $validation == 1)
                echo '<div class="alert alert-success">Nouveau PAV enregistré</div>';
            else if (isset($validation) && $validation == 2)
                echo '<div class="alert alert-danger">Erreur</div>';
            ?>
        </div>

    </div><!-- /row -->
</div><!-- /container -->

    <?php
    $content = $content.ob_get_contents();
    ob_clean();
    ?>
