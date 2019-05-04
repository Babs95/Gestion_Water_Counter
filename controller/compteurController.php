<?php
require_once "../model/db.php";
require_once "../model/compteurdb.php";
session_start();
if(isset($_POST['envoyer'])){
   // var_dump($_SESSION['iduser']);
    extract($_POST);
      $r=addlieu($nom,$latitude);
        
         header("location:compteur");
}

if(isset($_GET['idDelet']))
 {
     //extract($_POST);
     DeleteCompteur ($_GET['idDelet']);
     header("location:compteur");
 }


?>