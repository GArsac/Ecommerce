<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../models/request.php';
require '../models/connect.php';
connect($db);
session_start();
$mail = $_SESSION['mail'];

/*On hache le mot de passe pour plus de sécurité*/
$mdp = hash('md5',$_POST['mdp']);

if (!empty($_POST['nom'])) {
    $stmt = $db->prepare($modif_name);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR, 255);
    $stmt->execute();
}
if (!empty($_POST['prenom'])) {
    $stmt = $db->prepare($modif_surname);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR, 255);
    $stmt->execute();
}
if (!empty($_POST['address'])) {
    $stmt = $db->prepare($modif_adress);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR, 255);
    $stmt->execute();
}

if (!empty($_POST['mdp'])) {
    $stmt = $db->prepare($modif_mdp);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR, 255);
    $stmt->execute();
}
header('Location:../views/Other_pages/profil.php');