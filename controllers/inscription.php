<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*Page d'inscription*/
require '../models/request.php';
require '../models/connect.php';
/*Connexion à la base*/
connect($db);
/*On prépare la requête*/
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mdp=hash('md5',$_POST['mdp']);
$confmdp=hash('md5',$_POST['confmdp']);
$mail=$_POST['mail'];
$adress=$_POST['address'];

if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($confmdp) && !empty($adress)) {
    /*Vérifie si les champs confirmation mot de passe et mot de passe*/
    if ($_POST['confmdp'] == $_POST['mdp']) {
        /*Préparation de la requête sql*/
        $stmt = $db->prepare($inscription);
        /*On lie nos variables à nos paramétres entrés dans la requête*/
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR, 255);
        $stmt->bindParam(':address', $adress, PDO::PARAM_STR, 255);
        /*Lancement de la requête sql*/
        $stmt->execute();
        session_start();
        header('Location:../views/Other_pages/connexion.html');
    } else {
        echo 'Echec de l\'inscription:les champs mot de passe et Confirmation mot de passe ne sont pas les mêmes.';
        header('Location:../views/Other_pages/inscription.html');
    }

} else {
    echo 'Echec de l\'inscription: vous avez omis un champs.';
    header('Location:../views/Other_pages/inscription.html');
}