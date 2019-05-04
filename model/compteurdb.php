<?php
require_once "db.php";

function addlieu($cumulAnc,$cumulNouv)
{
    $sql = "INSERT INTO compteur 
        VALUES(NULL, '$cumulAnc', '$cumulAnc')";

    $connexion = getConnection();
    $result = $connexion->exec($sql);

    return $result;
}
function UpdateCompteur($idC,$idF)
{
    $sql = "UPDATE compteur c, facture f 
            SET c.cumulAnc = c.cumulNouv, c.cumulNouv = c.cumulNouv + f.consommation 
            WHERE c.numero = f.numero 
            AND c.numero LIKE $idC AND f.IdFact LIKE $idF";
    $connexion = getConnection();
    $resultat = $connexion->query($sql);
    return $resultat;
}
function Recherche($id)
{
    $sql = "SELECT f.mois,f.consommation,f.prix,f.reglement FROM compteur c,facture f WHERE c.numero = f.numero AND c.numero = $id";
    $connexion = getConnection();
    $resultat = $connexion->query($sql);
    return $resultat;
}
/**
 * Cette gere la suppression
 */
function DeleteCompteur($idDelet)
{
    $sql = "DELETE FROM compteur WHERE numero = idDelet";
    //echo $sql;
    $connexion = getConnection();

    return $result = $connexion->exec($sql);
}
function getAllLieu()
{
    $sql = "SELECT * FROM compteur";
    $connexion = getConnection();
    $resultat = $connexion->query($sql);
    return $resultat;
}
function getAllFormationByLieu($id)
{
    $sql = "SELECT * FROM compteur WHERE compteur = $id";
    $connexion = getConnection();
    $resultat = $connexion->query($sql)->fetchAll();
    return $resultat;
}
function getLieuById($id)
{
    $sql = "SELECT * FROM compteur
            WHERE numero = $id";
    //echo $sql;
    $connexion = getConnection();
    return $connexion->query($sql)->fetch();
}
//=var_dump(getAllFormationByLieu(1));
?>