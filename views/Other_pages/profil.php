<?php

session_start();
$mail = $_SESSION['mail'];
try {
    $db = new PDO('mysql:host=localhost;port=3306;dbname=Majstore;charset=utf8', 'root', 'azerty');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $pe) {
    echo $pe->getMessage();
}
$prenom='Moi<br>';
$stmt = $db->prepare('SELECT nom,prenom FROM Client WHERE email = :mail');
$stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
$stmt->bindValue('nom',$nom,PDO::PARAM_STR,255);
$stmt->bindValue('prenom',$prenom,PDO::PARAM_STR,255);
$stmt->execute();
$result= $stmt->fetch();
echo 'Mail:<br>'.$mail;
print_r('Prenom:'.$result->prenom);
print_r('Nom:'.$result->nom);
