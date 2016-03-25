<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/03/16
 * Time: 13:31
 */
$connexion='SELECT COUNT(id_client) compte FROM Client WHERE email = :mail AND password = :mdp';
$inscription='INSERT INTO Client SET email= :mail, nom= :nom,prenom= :prenom,password = :mdp';