<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/auth.php";

if (isLoggedOn()) {
    $titre = "Déconnecté !";
    logout(); }
else
    $titre = "Vous n'êtes pas connecté, vous ne pouvez donc pas vous déconnecté !";

include "$racine/vue/header.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/footer.php";
