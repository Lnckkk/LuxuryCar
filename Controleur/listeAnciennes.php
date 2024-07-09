<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd-modele.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


$listeModele = getAnciennes();

// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des Anciennes répertoriés";
include "$racine/vue/header.php";
include "$racine/vue/vueListeModele.php";
include "$racine/vue/footer.php";