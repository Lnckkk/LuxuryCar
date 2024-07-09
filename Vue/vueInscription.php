<?php
include_once "$racine/modele/auth.php";

if ($titre != "Vous n'êtes pas connecté, vous ne pouvez donc pas vous déconnecté !") {
    if (!isRegisterOn()) {
        if (isset($_POST["mail"]) && isset($_POST["mdp"])) {
            $pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
            $mail = $_POST["mail"];
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

            if (addUtilisateur($pseudo, $mail, $mdp)) {
                echo "Inscription réussie ! Connectez-vous <a href='./?action=cnx'>ici</a>.";
            } else {
                echo "Une erreur est survenue lors de l'inscription.";
            }
        } else {
?>
            <div class="form-conteneur">
                <form action="./?action=inscr" method="POST">
                    <input type="text" name="pseudo" placeholder="Pseudo" /><br />
                    <input type="text" name="mail" placeholder="Email de connexion" required /><br />
                    <input type="password" name="mdp" placeholder="Mot de passe" required /><br /><br />
                    <input class="btn-cnx" type="submit" value="S'inscrire" />
                </form>
            </div>
    <?php
        }
    } else {
        echo "Vous êtes déjà inscrit !";
    }
} else {
    ?> Connectez-vous <a href="./?action=cnx">ici</a>.
<?php } ?>