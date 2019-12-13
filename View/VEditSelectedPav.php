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
                            <li><a href="index.php?page=gpav&action=creationPav" >Création</a></li>
                            <li><a href="index.php?page=gpav&action=editPav" >Modification</a></li>
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
                        <label for="pavEdit">Modification PAV</label>
                        <input type="text" class="form-control" id="pavEdit" name="pavEdit" value="">
                        <input id="pavId" name="pavId" type="hidden" value="<?= $_POST['pavEdit'] ?>">
                    </div>

                    <button type="submit" value="Editer" name="edit" class="btn btn-primary">Modifier</button>
                </form>
            </div>

        </div><!-- /row -->
    </div><!-- /container -->
    <?php
    $content = $content.ob_get_contents();
    ob_clean();
    ?>