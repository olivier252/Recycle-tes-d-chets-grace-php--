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
                                    <li><a href="index.php?page=gcomptes&action=creation" >Création d'un agent</a></li>
                                    <li><a href="index.php?page=gcomptes&action=edit" >Modification d'un agent</a></li>
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
                        <label for="login"> Login</label>
                        <input class="form-control" type="text" id="log" name="login" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input class="form-control" type="password" id="password" name="pwd" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">Nom</label>
                        <input class="form-control" type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Prenom</label>
                        <input class="form-control" type="text" id="lastName" name="lastName" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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