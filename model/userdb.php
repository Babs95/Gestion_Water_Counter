<?php
require_once "db.php";
function getLogin($email, $password)
{
    $connexion = getConnection();
    $sql = "SELECT * FROM utilisateur 
            WHERE email = '$email'
            AND password = '$password'";

    $resultat = $connexion->query($sql);
   return $resultat;
}
$r = getLogin('lpgl@groupeisi.sn', 'passer');
//echo $r->rowCount();
//echo $r->fetch()['nom'];
?>