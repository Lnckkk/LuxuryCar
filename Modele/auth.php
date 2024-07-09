<?php
include_once "bd-utilisateur.php";


function login($mail, $mdp)
{
    $util = getUtilisateurByMail($mail);
    if (is_array($util) && array_key_exists("mdp", $util)) {
        // On récupère le hash du mot de passe stocké en base de données
        $hash = $util["mdp"];

        // On vérifie que le mot de passe entré correspond au hash stocké
        if (password_verify($mdp, $hash)) {
            $_SESSION["mail"] = $mail;
            $_SESSION["mdp"] = $hash; // On stocke le hash dans la session
        }
    }
}

function logout()
{
    unset($_SESSION["mail"]);
    unset($_SESSION["mdp"]);
    session_destroy();
}

function isLoggedOn()
{
    $ret = false;

    if (isset($_SESSION["mail"])) {
        $util = getUtilisateurByMail($_SESSION["mail"]);
        if ($util && password_verify($_SESSION["mdp"], $util["mdp"])) {
            $ret = true;
        }
    }
    return $ret;
}


function getMailULoggedOn()
{
    if (isLoggedOn()) {
        $ret = $_SESSION["mail"];
    } else {
        $ret = "";
    }
    return $ret;
}

function isRegisterOn()
{
    $ret = false;

    if (isset($_SESSION["mail"]) && isset($_SESSION["mdp"])) {
        $mail = $_SESSION["mail"];
        $mdp = $_SESSION["mdp"];
        $pseudo = isset($_SESSION["pseudo"]) ? $_SESSION["pseudo"] : "";

        // On ajoute l'utilisateur en base de données en utilisant le hash du mot de passe
        if (addUtilisateur($pseudo, $mail, $mdp)) {
            $ret = true;
        }
    }
    return $ret;
}
