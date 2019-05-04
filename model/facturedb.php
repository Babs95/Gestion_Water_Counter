<?php
require_once "db.php";
function getAllFormation()
{
    $sql = "SELECT * FROM facture";
    $connexion = getConnection();
    $resultat = $connexion->query($sql)->fetchAll();
    return $resultat;
}
/*$f = getAllFormation();
//var_dump($f);
foreach($f as $c=>$v) {
    print($c);
}*/
function getAllFacture()
{
    $sql = "SELECT * FROM facture";
    $connexion = getConnection();
    $resultat = $connexion->query($sql);
    return $resultat;
}
function UpdateFacture($id)
{
    $sql = "UPDATE  facture  set reglement =  'payer'  WHERE  IdFact = $id ";
    $connexion = getConnection();
    $resultat = $connexion->query($sql);
    return $resultat;
}
function addFacture($date, $mois, $consommation, $prix,$numero)
{
    //$reglement='non payer';
    $sql = "INSERT INTO facture 
        VALUES(NULL, '$date', '$mois', $consommation, $prix, 'non payer',$numero)";

    $connexion = getConnection();
    $result = $connexion->exec($sql);

    return $result;
}
/**
 * Cette fonction gere la suppression
 */
function DeleteFacture($idDelet)
{
    $sql = "DELETE IdFact FROM facture
            WHERE IdFact = $idDelet";
    //echo $sql;
    $connexion = getConnection();

    return $connexion->query($sql)->fetch();
}
/**
 * Cette fonction gere l'edition
 */
function getFormationById($idEdit)
{
    $sql = "SELECT * FROM facture
            WHERE IdFact = $idEdit";
    //echo $sql;
    $connexion = getConnection();

    return $connexion->query($sql)->fetch();
}
//var_dump(getFormationById(1));
?>