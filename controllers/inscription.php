<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
/*Page d'inscription*/

/*Connexion à la base*/
    try {
        $db = new PDO('mysql:host=localhost;port=3306;dbname=Majstore;charset=utf8', 'root', 'azerty');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $pe) {
        echo $pe->getMessage();
    }


/*On prépare la requête*/
if( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['confmdp'])) {
    /*Vérifie si les champs confirmation mot de passe et mot de passe*/
    if ($_POST['confmdp'] == $_POST['mdp']) {
        /*Préparation de la requête sql*/
        $stmt = $db->prepare($inscription);
        $stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR, 255);
        /*Lancement de la requête sql*/
        $stmt->execute();
        echo 'Inscription réussite';
        session_start();
        header('Location:../views/Other_pages/accueil.html');
    }else{
        echo 'Echec de l\'inscription:les champs mot de passe et Confirmation mot de passe ne sont pas les mêmes.';
        header('Location:../views/Other_pages/inscription.html');
    }
}else{
    echo'Echec de l\'inscription: vous avez omis un champs.';
    header('Location:../views/Other_pages/inscription.html');
}