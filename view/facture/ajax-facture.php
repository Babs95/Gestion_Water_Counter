<?php
if(isset($_GET['listefacture']))
    {
        header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, Content-Type");
		header("Content-Type: application/json; charset=UTF-8");
		$rest_json = file_get_contents('php://input');
        
        /*$lieux = array("1"=>"Dakar", 
                "2"=>"Fatick", 
                "3"=>"Diourbel");*/

        /**
         * Ceci permet de récuperer à partir de la base de donnée tous les lieux à l'aide de ajax
         */
        $lieux = array();
        require_once "../../model/facturedb.php";
        $liste_lieu = getAllFacture();
        while($lieu = $liste_lieu->fetch())
        {
            $lieux[$lieu[0]] = utf8_encode($lieu[0]);
        }
        echo json_encode($lieux);
    }
    
?>