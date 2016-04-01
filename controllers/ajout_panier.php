<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
function verif_null()
{
    for ($index = 0; $index < sizeof($_SESSION['panier']['id']); $index++) {
        if ($_SESSION['panier']['id'][$index] == NULL) {
            $_SESSION['panier']['id'][$index] = $_POST['valeur'];
            return true;
            break;
        }
    }
    return false;
}


if (verif_null() == false) {
    array_push($_SESSION['panier']['id'], $_POST['valeur']);
}

header('Location:../views/Other_pages/panier.php');