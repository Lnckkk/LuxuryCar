<?php

include_once "bd.php";

function getUtilisateurs()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * from user");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMail($mail)
{
    try {
        $pdo = connexionPDO();
        $sql = "SELECT * FROM user WHERE email = :mail";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':mail' => $mail));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}


function addUtilisateur($pseudo, $email, $mdp)
{
    try {
        $pdo = connexionPDO();
        $sql = "INSERT INTO user (pseudo, email, mdp) VALUES (:pseudo, :email, :mdp)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);

        return $stmt->execute();

        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
