<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../models/request.php';
require '../models/connect.php';
connect($db);
session_start();
$mail = $_SESSION['mail'];
if (!empty($_POST['nom'])) {
    $stmt = $db->prepare($modif_name);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR, 255);
    $stmt->execute();
    echo 'Success';
}
if (!empty($_POST['prenom'])) {
    $stmt = $db->prepare($modif_surname);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR, 255);
    $stmt->execute();
    echo 'Success';
}
if (!empty($_POST['address'])) {
    $stmt = $db->prepare($modif_adress);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR, 255);
    $stmt->execute();
    echo 'Success';
}