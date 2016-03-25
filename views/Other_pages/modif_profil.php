<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier votre profil</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="/Ecommerce/viewscss/main.css">
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
                    <a href="/Ecommerce/controllers/deconnexion.php">Se déconnecter</a>
                </li>
                <li>
                    <a href="/Ecommerce/views/Other_pages/modif_profil.html">Modifier le profil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form class="center">
    <div class="center">

        <p>
            <?php
                require '/Ecommerce/controllers/connexion.php';
                echo 'Banana';
                echo 'Nom:'.$_SESSION['mail'];
                echo 'Prenom'.$_SESSION['Prenom'];
            ?>


        </p>

    </div>
</form>

<p>
</p>
</body>
</html>
