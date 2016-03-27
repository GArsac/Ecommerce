<?php
/*Requête utilisée dans la page de connexion*/
$connexion = 'SELECT COUNT(id_client) compte FROM Client WHERE email = :mail AND password = :mdp';
/*Requête utilisée dans la page d'inscription*/
$inscription = 'INSERT INTO Client SET email = :mail,nom = :nom,prenom = :prenom,password = :mdp,adress = :address';
/*Requête utilisée dans l'affichage du profil de l'utilisateur */
$profil = 'SELECT nom,prenom,adress FROM Client WHERE email = :mail';
/*Requêtes concernant la page de modification*/
$modif_name = 'UPDATE Client SET nom = :nom WHERE email = :mail';
$modif_surname = 'UPDATE Client SET prenom = :prenom WHERE email = :mail';
$modif_adress = 'UPDATE Client SET adress = :address WHERE email = :mail';
/*Requête affichant tous les articles dans la boutique*/
$catalogue = 'SELECT *  FROM Catalogue';