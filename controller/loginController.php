<?php
require_once "../model/userdb.php";
if(isset($_POST))
{
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pass']);
    $login = getLogin($email, $pass);

    if($login->rowCount() != 0) 
    {
        session_start();

        $user = $login->fetch();

        $_SESSION['idU'] = $user[0];
        $_SESSION['prenom'] = $user[4];
        $_SESSION['nom'] = $user[3];
       
        header("location:accueil");
    }else {
        header("location:login?error=yes");
    }
}
if(isset($_GET['logout']))
{
    session_start();
    $_SESSION['nom'] = "";
    session_unset();
    session_destroy();
    header("location:login");
}
?>