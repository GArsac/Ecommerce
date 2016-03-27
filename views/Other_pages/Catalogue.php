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
                MajStore
            </a>
        </div>

        <div class="navbar-collapse collapse" id="menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="profil.php">Profil</a>
                </li>

                <li>
                    <a href="../../controllers/deconnexion.php">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="rwd-table">
    <tr>
        <th>Référence</th>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Prix</th>
    </tr>

    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require '../../models/request.php';
    require '../../models/connect.php';
    connect($db);
    $stmt = $db->prepare($catalogue);
    $stmt->execute();
    $result = $stmt->fetchAll();

    for ($i = 0; $i < sizeof($result); ++$i) {
        echo '<tr>';

        echo '<td data-th="Référence">';
        print_r($result[$i]->id);
        echo '</td>';

        echo '<td data-th="Nom">';
        print_r($result[$i]->libellé);
        echo '</td>';

        echo ' ';

        echo '<td data-th="Prix">';
        print_r($result[$i]->prix);
        echo ' €';
        echo '</td>';

        echo '</tr>';
    }
    ?>
</table>

</body>
</html>
