<?php
 session_start();
 if($_SESSION['nom'] == "")
 {
     header("location:login");
 }
 if(isset($_GET['idEdit']))
 {
     require_once '../../model/db.php';
     require_once '../../model/facturedb.php';
     $formation = getFormationById($_GET['idEdit']);
 }
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <meta name="author" content="ngorsecka@gmail.com">
        <link rel="stylesheet" type="text/css" href="./public2/css/bootstrap-Lux.min.css"/>
     <link rel="stylesheet" type="text/css" href="public2/css/fixed.css">
        <!--<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" /> -->
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $.ajax({
                    url:"http://localhost/MVC/Gestion_Water_Exam/ajax-compteur?listeCompteur=yes",
                    type:"GET",
                    dataType:"json",
                    success:function(json){
                        $.each(json, function(index, value){
                            
                            $("#compteur").append("<option value='"+index+"'>"+value+"</option>");
                        });
                    }
                });


            });
        </script>
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
        <div class="col-md-9" style="float:right;margin-top: 10px">
            <div class="card text-white bg-dark">
                <div class="card-header">Liste des factures</div>
                <div class="card-body" id="table_f">
                    <table class="table table-bordered">
                        <tr>
                            <td>Identifiant</td>
                            <td>Date</td>
                            <td>Mois</td>
                            <td>Consommation</td>
                            <td>Prix</td>
                            <td>Reglement</td>
                            <td>Numero Compteur</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        require_once "../../model/facturedb.php";
                        $f = getAllFormation();
                        foreach($f as $c=>$v) {
                            $etat =" payer";
                            if( $v[5]==0){
                                $etat ="non payer";
                            }
                            print("<tr>
                                <td>".$v[0]."</td>
                                <td>".$v[1]."</td>
                                <td>".$v[2]."</td>
                                <td>".$v[3]."</td>
                                <td>".$v[4]."</td>
                                <td>".$v[5]."</td>
                                <td>".$v[6]."</td>
                                <td><a href='?idEdit=$v[0]'><font color=\"FF00CC\">Editer</font></a></td>
                            </tr>");
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="float:left;margin-top: 10px">
            <div class="card text-white bg-info">
                <div class="card-header">Editer Facture</div>
                <div class="card-body">
                    <!--<?php
                    /*if(isset($_GET["message"]))
                    {
                        if($_GET["message"] == 1)
                        {
                            echo "<div class='alert alert-success'>Données ajoutées avec succès</div>";
                        }else{
                            echo "<div class='alert alert-danger'>Erreur</div>";
                        }
                    }*/
                    ?>-->
                    <form method="POST" action="factureController" >
                    <div class="form-group">
                        <label class="control-label" for="id">Indentifiant</label>
                        <input class="form-control" type="number" name="id" id="id" value="<?php if(isset($formation[0])) echo $formation[0]; ?>" readonly />
                    </div>
                    <div class="form-group">
                         <label class="control-label" for="date">Date</label>
                         <input class="form-control" type="date" name="date" id="date" value="<?php if(isset($formation[1])) echo $formation[1]; ?>" />
                    </div>
                    <div class="form-group">
                       <label class="control-label" for="mois">Mois</label>
                        <input class="form-control" type="text" name="mois" id="mois" value="<?php if(isset($formation[2])) echo $formation[2]; ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="cons">Comsommation</label>
                        <input class="form-control" type="number" name="cons" id="cons" value="<?php if(isset($formation[3])) echo $formation[3]; ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="prix">Prix</label>
                        <input class="form-control" type="number" name="prix" id="prix" value="<?php if(isset($formation[4])) echo $formation[4]; ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="reglement">Reglement</label>
                        <input class="form-control" type="text" name="reglement" id="reglement" value="<?php if(isset($formation[5])) echo $formation[5]; ?>" readonly/>
                    </div>
                    <div class="form-group">
                         <label class="control-label" for="compteur">Numero Compteur</label>
                            <select class="form-control" name="compteur" id="compteur">
                                <option value="<?php if(isset($formation[6])) echo $formation[6]; ?>">Faites un choix</option>
                               
                            </select>
                    </div>
                   
                        <div class="form-group">
                        <input type="submit" name="envoyer" id="envoyer" class="btn btn-success" value="Ajouter">
                        <input type="reset" name="annuler" id="annuler" class="btn btn-danger" value="Annuler">
                    </div>
                    </div>
                </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>