<?php
require_once "../model/db.php";
require_once "../model/facturedb.php";
require_once "../model/compteurdb.php";
require_once "../model/db.php";
session_start();
if(isset($_POST['envoyer'])){
   // var_dump($_SESSION['iduser']);
    extract($_POST);
    //$r=addFacture($date, $mois, $cons, $prix,$compteur);
    $sql = "INSERT INTO facture 
        VALUES(NULL, '$date', '$mois', $cons, $prix, 'non payer',$compteur)";

    $connexion = getConnection();
    $connexion->exec($sql);

     $last_id = $connexion->lastInsertId();
   // printf("Last inserted record has id %d\n", mysql_insert_id());
    UpdateCompteur($compteur,$last_id);
    unset($connexion);
    header("location:facture");
}
?>