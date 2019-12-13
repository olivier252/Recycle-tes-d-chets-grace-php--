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
                                <li><a href="index.php?page=gcomptes&action=creation">Création d'un agent</a></li>
                                <li><a href="index.php?page=gcomptes&action=edit">Modification d'un agent</a></li>
                            </ul>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="col-md-8">
                <h3><?= $soutitre ?></h3>

                <form action="index.php?page=gcomptes&action=edit" method="post">
                    <div class="form-group">
                        <select name="loginEdit" size="1" class="form-control">
                            <?= $agentList ?>
                        </select>
                    </div>
                    <input type="submit" value="Supprimer" name="suppr" class="btn btn-danger">
                    <input type="submit" value="Editer" name="edit" class="btn btn-primary">
                </form>
            </div>

        </div><!-- /row -->
    </div><!-- /container -->
<?php
    $content = $content.ob_get_contents(); 
    ob_clean();
?>