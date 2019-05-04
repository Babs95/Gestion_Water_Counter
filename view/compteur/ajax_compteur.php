<?php
    if(isset($_GET['listeCompteur']))
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
        require_once "../../model/compteurdb.php";
        $liste_lieu = getAllLieu();
        while($lieu = $liste_lieu->fetch())
        {
            $lieux[$lieu[0]] = utf8_encode($lieu[0]);
        }
        echo json_encode($lieux);
    }

      /*if(isset($_GET['liste']))
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, Content-Type");
        header("Content-Type: application/json; charset=UTF-8");
        $rest_json = file_get_contents('php://input');

        $lieux = array();
        require_once "../../model/compteurdb.php";
        $liste_lieux =  getLieuById($_GET['compteur']);
        foreach ($liste_lieux as $key => $value) {
            $lieu = array();
            $lieu["idL"] = $value[0];
            $lieu["nom"] = $value[1];
            $lieu["longitud"] = $value[2];
            $lieu["latitude"] = $value[3];
          //  $compteur["compteur"] = $value[4];

            $lieux[] = $lieu;
        }
        echo json_encode($tablieux);
    }*/
?>