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
                            <li><a href="index.php?page=gcomptes&action=creation" >Création</a></li>
                            <li><a href="index.php?page=gcomptes&action=edit" >Modifier</a></li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="col-md-8">
                <h3><?= $soutitre ?></h3>

                <form action="#" method="post">
                    <div class="form-group">
                        <label for="loginEdit">Login</label>
                        <input type="text" class="form-control" id="log" name="loginEdit" value="<?= $vuser ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pwd"> Mot de passe (Optionnel)</label>
                        <input type="password" class="form-control" id="password" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="firstName">Prénom</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $vfirstname ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Nom</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $vlastname ?>" required>
                    </div>
                    <button type="submit" value="Editer" name="edit" class="btn btn-primary">Modifier</button>
                </form>

                <?php
                if (isset($validation) && $validation == 1)
                    echo "Nouvelle entrée enregistrée";
                else if (isset($validation) && $validation == 2)
                    echo "Erreur";
                ?>
            </div>
        </div><!-- /row -->
    </div><!-- /container -->
    <?php
    $content = $content.ob_get_contents();
    ob_clean();
    ?>
