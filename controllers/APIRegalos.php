<?php 

namespace Controllers;

use JsonException;
use Model\Regalo;
use Model\Registro;

class APIRegalos {
    
    public static function index() {
        if(!is_admin()) {
            echo json_encode([]);
            return false;
        }
       $regalos = Regalo::all();

       foreach($regalos as $regalo){
         $regalo->total = Registro::totalArray(['regalo_id' => $regalo->id, 'paquete_id' => "1"]);
       }

       echo json_encode($regalos);

       exit;

    }

}