<?php
unset($_SESSION['panier']);
session_destroy();

header('Location:../views/index.html');