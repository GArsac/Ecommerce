<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier votre profil</title>
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
                    <a href="../../controllers/deconnexion.php">Se déconnecter</a>
                </li>
                <li>
                    <a href="modif_profil.html">Modifier le profil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="">

    <p>
        <?php
        require '../../models/request.php';
        require '../../models/connect.php';
        session_start();
        $mail = $_SESSION['mail'];
        connect($db);
        $stmt = $db->prepare($profil);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        echo 'Mail: ' . $mail . '<br>';
        print_r('<p>Prenom: ' . $result->prenom . '</p>');
        print_r('<p>Nom: ' . $result->nom . '</p>');
        print_r('<p>Adresse: ' . $result->adress . '</p>');
        ?>
    </p>

</div>

<p>
</p>
</body>
</html>


