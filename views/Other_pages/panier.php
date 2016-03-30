<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
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
                    <a href="Catalogue.php">Catalogue</a>
                </li>
                <li>
                    <a href="modif_profil.html">Modifier le profil</a>
                </li>
                <li style="padding-left: inherit;">
                    <a href="../../controllers/deconnexion.php">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="center">
    <p>
        <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require '../../models/connect.php';
        require '../../models/request.php';

        connect($db);
        session_start();
        $stmt = $db->prepare($panier);
        for ($index = 1; $index < sizeof($_SESSION['panier']); $index++) {
            if (!empty($_SESSION['panier'][$index])) {
                $stmt->bindParam(':id', $_SESSION['panier'][$index], PDO::PARAM_INT, 55);
                $stmt->execute();
                $result = $stmt->fetch();

                echo('<div class="col-xs-5"><p>' . $result->libellé . ' ' . $result->prix . ' €</p></div>');
                echo '<form method="post" action="../../controllers/delete_article.php">';
                echo '<button type="submit" class="center btn btn-primary btn-md" name="valeur" value="' . $_SESSION['panier'][$index] . '" id="button">Supprimer du panier</button>';
                echo '</form>';
            } else {
                echo '<br>rien<br>';
            }
        }

        if (empty($_SESSION['panier'][1])==false) {
            echo '<button type="submit" class="center btn btn-primary btn-md" >Passer Commande</button>';
        }

        ?>
    </p>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>


