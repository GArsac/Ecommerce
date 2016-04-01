<?php
unset($_SESSION['panier']);
unset($_SESSION['panier']['id']);
unset($_SESSION['panier']['qte']);
session_destroy();

header('Location:../views/index.html');