<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

for ($index = 0; $index < sizeof($_SESSION['panier']); $index++) {
    if ($_SESSION['panier'][$index] == $_POST['valeur']) {
        unset($_SESSION['panier'][$index]);
        header('Location:../views/Other_pages/panier.php');
    }
}