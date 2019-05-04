<?php
    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Origin, Content-Type");
	header("Content-Type: application/json; charset=UTF-8");
 session_start();
 if($_SESSION['nom'] == "")
 {
     header("location:login");
 }
 
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <meta name="author" content="ngorsecka@gmail.com">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" />
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/jquery-ui.js"></script>
</head>
<body>
<div class="nav navbar navbar-default">
    <ul class="nav navbar-nav">
        <li><a href="compteur">Gestion des compteurs</a></li>
        <li><a href="facture">Gestion des factures</a></li>
        <li><a href="paiement">Gestion Paiement</a></li>
        <li><a href="angular">Angular</a></li>
        <li><a href="loginController?logout=yes">Deconnexion</a></li>
        <li><a href="#">
                <?php

                echo "Bienvenue ".$_SESSION['prenom']
                    ." ".$_SESSION['nom'];
                ?>
            </a>
        </li>

    </ul>
</div>

    <div class="col-md-6" style="margin-top:10px;">
        <div class="panel panel-primary">
        <div class=" panel-heading">Listes des factures </div>
            <div class=" panel-body">
                <table class="table table-bordered ">
                    <tr>
                        <td>Mois</td>
                        <td>Consommation</td>
                        <td>Prix</td>
                        <td>Reglement</td>
                    </tr>
                    <?php
                        require_once '../../model/db.php';
                        require_once '../../model/compteurdb.php';
            
                        //$f = getAllLieu();
                        if(isset($_GET['num']))
                        {
                        // var_dump($_SESSION['iduser']);
                            extract($_GET);
                            $r=Recherche($num);
                        
                         foreach($r as $cle=>$values)
                         {
                             print_r("<tr>
                             <td>".$values[0]."</td>
                             <td>".$values[1]."</td>
                             <td>".$values[2]." </td>
                             <td>".$values[3]." </td>
                             </tr>");
                         }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6" style="margin-top:10px;">
        <div class="panel panel-primary">
        <div class=" panel-heading">Verification factures</div>
            <div class=" panel-body">
              <form method="GET" action="" >
                    <div class="form-group">
                        <label for="num" class="form-label">Numero Compteur</label>
                        <input type="text" name="num" id="num" class="form-control" value="<?php if(isset($l[0])) echo $l[0]; ?>">
                    </div>
                   
                        <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Rechercher">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>