<?php
 session_start();
 if($_SESSION['nom'] == "")
 {
     header("location:login");
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Accueil</title>
    <meta name="author" content="babsco95@gmail.com"/>
    <!--<link rel="stylesheet" type="text/css" href="./public/css/bootstrap-Cerulean.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="./public2/css/bootstrap-Lux.min.css"/>
     <link rel="stylesheet" type="text/css" href="public2/css/fixed.css">
    </head>
    <body>
     
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#haut">
          <img src="image/imgserver.jpg" alt="Logo">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="?page=HOME">Accueil<span class="sr-only">(current)</span></a></li>
            <li><a href="compteur">Gestion des compteurs</a></li>
                <li><a href="facture">Gestion des factures</a></li>
                <li><a href="paiement">Gestion Paiement</a></li>
                <li><a href="angular">Angular</a></li>
                <li><a href="loginController?logout=yes">Deconnexion</a></li>
            <!--Affiche le prenom et le nom de l'utilisateur connecté -->
            <li class="nav-item"><a class="nav-link" href="#">
                    <?php
                        //session_start();
                        echo "Bienvenue "." ".$_SESSION['prenom']
                               
                    ?>
                </a>
            </li>
        </ul>
      
    </div>
</nav>
    </body>
</html>