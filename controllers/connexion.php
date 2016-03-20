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

$mail=$_POST['mail'];
$mdp=$_POST['mdp'];
if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $stmt = $db->prepare('SELECT COUNT(id) count FROM Client WHERE email= :mail AND password = :mdp');
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR, 255);
    if ($result[0]->count > 0) {
        $_SESSION['mail'] = $mail;
        session_start();
        header('Location:../views/Other_pages/accueil.php');
    } else {
        echo 'NOT CONNECTED';
    }
}else{
    header('Location:../views/Other_pages/connexion.html');
}