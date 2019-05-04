 <?php
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, Content-Type");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: PUT, GET, POST");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
                        require_once '../../model/db.php';
                        require_once '../../model/compteurdb.php';
            
                        //$f = getAllLieu();
                        if(isset($_GET['num']))
                        {
                        // var_dump($_SESSION['iduser']);
                            extract($_GET);
                            $r=Recherche($num);
                        
                         foreach($r as $cle=>$values)
                         {
                              $car = [
                                'mois' => $values[0],
                                'consommation' => $values[1],
                                'prix'    => $values[2],
                                'reglement'    => $values[3]
                                ];
                                echo json_encode($car);
                             /*print_r("<tr>
                             <td>".$values[0]."</td>
                             <td>".$values[1]."</td>
                             <td>".$values[2]." </td>
                             <td>".$values[3]." </td>
                             </tr>");*/
                         }
                        }
                    ?>