<?php 

namespace Controllers;

use Model\EventoHorario;

class APIEventos {
    
    public static function index() {
        if(!is_admin()) {
            echo json_encode([]);
            return false;
        }

        $dia_id = $_GET['dia_id'] ?? '';
        $categoria_id = $_GET['categoria_id'] ?? '';

        $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);
        $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);

        if(!$dia_id || !$categoria_id){
            echo json_encode([]);
            return;
        }

        //consultar bd

        $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]) ?? [];

        echo json_encode($eventos);

    }
}