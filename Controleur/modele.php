<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
// else{include "./getRacine.php";}

include_once "$racine/modele/bd-modele.php";

// traitement si necessaire des donnees recuperees
$id = $_POST['id'];
$value = getmodeleById($id);
// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Modèle en détail";
include "$racine/vue/header.php";
include "$racine/vue/vueModele.php";
include "$racine/vue/footer.php";