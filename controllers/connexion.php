<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/request.php';
require '../models/connect.php';
/*Connexion à la bdd*/

connect($db);
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
    $stmt = $db->prepare($connexion);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR, 255);
    $stmt->execute();
    $result= $stmt->fetch();
    if ($result->compte == 1) {
        session_start();
        $_SESSION['mail'] = $mail;
        header('Location:../views/Other_pages/accueil.html');
    }else {
            echo 'NOT CONNECTED';
        }
    } else {
        header('Location:../views/Other_pages/connexion.html');
    }


