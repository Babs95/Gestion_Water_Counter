<?php
require_once "../model/db.php";
require_once "../model/paiementdb.php";
require_once "../model/facturedb.php";
session_start();
if(isset($_POST['envoyer'])){
   // var_dump($_SESSION['iduser']);
    extract($_POST);
      $r=addPaiement($date,$lieu);
        //$etat=payer;
         UpdateFacture($lieu);
         header("location:paiement");
}

if(isset($_GET['idDelet']))
 {
     //extract($_POST);
     DeleteCompteur ($_GET['idDelet']);
     header("location:paiement");
 }


?>