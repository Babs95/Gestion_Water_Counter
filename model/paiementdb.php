<?php
require_once "db.php";
function getAllPaiement()
{
    $sql = "SELECT * FROM paiement";
    $connexion = getConnection();
    $resultat = $connexion->query($sql)->fetchAll();
    return $resultat;
}
/*$f = getAllFormation();
//var_dump($f);
foreach($f as $c=>$v) {
    print($c);
}*/

function addPaiement($date, $IdFact)
{
    $sql = "INSERT INTO paiement 
        VALUES(NULL,'$date', $IdFact )";

    $connexion = getConnection();
    $result = $connexion->exec($sql);

    return $result;
}
/**
 * Cette gere l'edition
 */
function DeletePaiement($idDelet)
{
    $sql = "DELETE IdFact FROM facture
            WHERE IdFact = $idDelet";
    //echo $sql;
    $connexion = getConnection();

    return $connexion->query($sql)->fetch();
}
/**
 * Cette gere l'edition
 */
function getPaiementById($idEdit)
{
    $sql = "SELECT * FROM facture
            WHERE IdFact = $idEdit";
    //echo $sql;
    $connexion = getConnection();

    return $connexion->query($sql)->fetch();
}
//var_dump(getFormationById(1));
?>