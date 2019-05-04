<?php
 session_start();
 if($_SESSION['nom'] == "")
 {
     header("location:login");
 }
 if(isset($_GET['id']))
 {
     require_once '../../model/db.php';
     require_once "../../model/paiementdb.php";
     $l = getPaiementById($_GET['id']);
 }
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <meta name="author" content="ngorsecka@gmail.com">
        <!--<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" type="text/css" href="./public2/css/bootstrap-Lux.min.css"/>
     <link rel="stylesheet" type="text/css" href="public2/css/fixed.css">
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $.ajax({
                    url:"http://localhost/MVC/Gestion_Water_Exam/ajax-facture?listefacture=yes",
                    type:"GET",
                    dataType:"json",
                    success:function(json){
                        $.each(json, function(index, value){
                            
                            $("#lieu").append("<option value='"+index+"'>"+value+"</option>");
                        });
                    }
                });


            });
        </script>
         <!-- <script>
            $(document).ready(function(){
                $.ajax({
                    url:"http://localhost/MVC/Gestion_Water_Exam/ajax-facture?listeFacture=yes",
                    type:"GET",
                    dataType:"json",
                    success:function(json){
                        $.each(json, function(index, value){
                            
                            $("#lieu").append("<option value='"+index+"'>"+value+"</option>");
                        });
                    }
                });


            });
        </script>-->
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

    <div class="col-md-6" style="float:right;margin-top: 10px">
        <div class="card text-light bg-success">
        <div class="card-header">Listes des Paiements</div>
            <div class="card-body">
                <table class="table table-bordered ">
                    <tr>
                        <td>Identifiant</td>
                        <td>Date Paiement</td>
                        <td>Identifiant Facture</td>
                        <td>Action</td>
                    </tr>
                    <?php
                        require_once "../../model/paiementdb.php";
                        $f = getAllPaiement();
                      
                         foreach($f as $cle=>$values)
                         {
                             print_r("<tr>
                             <td>".$values[0]."</td>
                             <td>".$values[1]."</td>
                             <td>".$values[2]." </td>
                             <td><a href='?id=$values[0]'>Editer</a></td>
                             </tr>");
                         }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6" style="float:left;margin-top: 10px">
        <div class="card text-white bg-warning">
        <div class="card-header">Effectué Paiment</div>
            <div class="card-body">
              <form method="POST" action="paiementController" >
                    <div class="form-group">
                        <label for="id" class="form-label">Numero</label>
                        <input type="text" name="id" id="id" class="form-control" value="<?php if(isset($l[0])) echo $l[0]; ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label class="control-label" for="date">Date</label>
                        <input class="form-control" type="date" name="date" id="date" value="<?php if(isset($l[1])) echo $l[1]; ?>" />
                    </div>
                    <div class="form-group">
                         <label class="control-label" for="lieu">Numero Facture</label>
                            <select class="form-control" name="lieu" id="lieu">
                                <option value="<?php if(isset($l[2])) echo $l[2]; ?>">Faites un choix</option>
                               
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