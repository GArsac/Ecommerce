<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="accueil.html">
                <img style="height: 35px; width: 45px;" src="http://www.icone-png.com/png/13/12594.png">
            </a>
        </div>

        <div class="navbar-collapse collapse" id="menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="profil.php">Profil</a>
                </li>
                <li>
                    <a href="panier.php">Panier</a>
                </li>
                <li>
                    <a href="../../controllers/deconnexion.php">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="rwd-table">


    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require '../../models/request.php';
    require '../../models/connect.php';

    connect($db);
    session_start();
    $stmt = $db->prepare($catalogue);
    $stmt->execute();
    $result = $stmt->fetchAll();

    /*Affichage du catalogue*/
    for ($index = 0; $index < sizeof($result); $index++) {
        /*Affection des résultats*/
        $ref = $result[$index]->id_article;
        $nom = $result[$index]->libellé;
        $category = $result[$index]->category;
        $prix = $result[$index]->prix;
        $photo = $result[$index]->photo;

        /*Format affichage d'un article*/
        echo '<div class="col-xs-3" style="padding: 10px;margin: 0 auto;border: 3px solid;">

        <p class="center" style="text-align:center;">
        ' . $nom . '
        </p>
        <img alt="Image" src="'.$photo.'">
        <div style="text-align:center;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas amet dolorem iste fuga labore sequi debitis iusto. Cum similique asperiores iste temporibus, dignissimos in non, voluptas quasi accusamus, amet, quod.
        </div>

        <div style="float:left;">
             ' . $prix . '€
        </div>

        <div style="margin: 0;float:right;">
        <form method="post" action="../../controllers/ajout_panier.php">
        <button type="submit" class="center btn btn-primary btn-md" name="valeur" value="' . $ref . '" id="button">Ajouter au panier</button>
        </form>
        </div>

        </div>';

    }

    ?>
</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="../Javascript/app.js"></script>
</body>
</html>
