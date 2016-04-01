<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();


function vide_panier($ref_article)
{
    $suppression = false;
    $panier_tmp = array();
    /* Comptage des articles du panier */
    $nb_articles = count($_SESSION['panier']['id']);
    /* Transfert du panier dans le panier temporaire */
    for($index = 0; $index < $nb_articles; $index++)
    {
        /* On transfère tout sauf l'article à supprimer */
        if($_SESSION['panier']['id'][$index] != $ref_article)
        {
            array_push($panier_tmp['id'],$_SESSION['panier']['id'][$index]);
        }
    }
    /* Le transfert est terminé, on ré-initialise le panier */
    $_SESSION['panier']['id'] = $panier_tmp;
    /* Option : on peut maintenant supprimer notre panier temporaire: */
    unset($panier_tmp);
    $suppression = true;
    return $suppression;
}

if(vide_panier($_POST['valeur']) ==true){
    header('Location:../views/Other_pages/panier.php');
}
else{
    echo "Echec de la suppression";
}