<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*Connexion à la bdd*/
try {
    $db = new PDO('mysql:host=localhost;port=3306;dbname=Majstore;charset=utf8', 'root', 'azerty');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $pe) {
    echo $pe->getMessage();
}
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
    $stmt = $db->prepare('SELECT COUNT(id_client) compte FROM Client WHERE email = :mail AND password = :mdp');
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR, 255);
    $stmt->execute();
    $result= $stmt->fetch();
    print_r($result);
    if ($result->compte == 1) {
        session_start();
        $_SESSION['mail'] = $mail;
        header('Location:/Ecommerce/views/Other_pages/accueil.html');
    }else {
            echo 'NOT CONNECTED';
        }
    } else {
        header('Location:../views/Other_pages/connexion.html');
    }