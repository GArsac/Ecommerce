<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/connect.php';
require '../models/request.php';

/*Connexion à la bdd*/

connect($db);
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
    $stmt = $db->prepare($connexion);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR, 255);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result->compte == 1) {
        session_start();
        $_SESSION['mail'] = $mail;
        /* Initialisation du panier */
        $_SESSION['panier'] = array();
        /* Subdivision du panier */
        $_SESSION['panier'][] = array();

        header('Location:../views/Other_pages/accueil.html');
    } else {
        header('Location:../views/Other_pages/connexion.html');
    }
} else {
    header('Location:../views/Other_pages/connexion.html');
}


