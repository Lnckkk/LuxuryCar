<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd-utilisateur.php";

if (isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["mdp"]))
{

}

$inscrit = false;
$msg="";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["user"])) {

    if ($_POST["mail"] != "" && $_POST["mdp"] != "" && $_POST["user"] != "") {
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $user = $_POST["user"];

        // enregistrement des donnees
        $ret = addUtilisateur($mail, $mdp, $user);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
    }
 else {
    $msg="Renseigner tous les champs...";    
    }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include "$racine/vue/header.php";
    include "$racine/vue/vueConfirmationInscription.php";
    include "$racine/vue/footer.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription";
    include "$racine/vue/header.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/footer.php";
}
