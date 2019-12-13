<?php
$title = "PAV - Connexion";
ob_start();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 pt-5">

            <h1 class="text-center">PAV à PAV</h1>
            <H2 class="text-center mb-5">Bienvenue dans l'appli qui trie vos déchets !</H2>
            <h3 class="text-center">Veuillez vous connecter avec vos identifiants</h3>


            <form action="#" method="post">
                <div class="form-group">
                    <label for="login"> Login</label>
                    <input type="text" class="form-control" id="log" name="login" value="<?= $connectionLogin ?>">
                </div>
                <div class="form-group">
                    <label for="pwd"> Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="pwd">
                </div>
                <?php
                    if ($erreurPwd)
                        echo '<div class="alert alert-danger">Login ou mot de passe incorrect</div>';
                ?>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>

        </div>
    </div>
</div>
<?php 
$content = $content.ob_get_contents();
ob_clean();
?>