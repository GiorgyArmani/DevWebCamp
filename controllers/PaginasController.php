<?php

namespace Controllers;
use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;

class PaginasController {
    public static function index(Router $router) {
        
        $eventos = Evento::ordenar('hora_id', 'ASC');
        $eventosFormateados = [];
        foreach($eventos as $evento){
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if($evento->dia_id === "1" && $evento->categoria_id === "1"){
                $eventosFormateados['conferencias_s'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "1"){
                $eventosFormateados['conferencias_d'][] = $evento;
            }
            if($evento->dia_id === "1" && $evento->categoria_id === "2"){
                $eventosFormateados['workshops_s'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "2"){
                $eventosFormateados['workshops_d'][] = $evento;
            }

        }


        //obtener el total de cada bloque
        $ponentes_total = Ponente::total();
        $conferencias_total = Evento::total('categoria_id', 1);
        $workshops_total = Evento::total('categoria_id', 2);
        //obtener todos los ponentes
        $ponentes = Ponente::all();

        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'eventos' => $eventosFormateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'workshops_total' => $workshops_total,
            'ponentes' => $ponentes,
            


        ]);
    }

    public static function evento(Router $router) {
        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }

    public static function packs(Router $router) {
        $router->render('paginas/packs', [
            'titulo' => 'Packs DevWebCamp'
        ]);
    }
    public static function conferencias(Router $router) {
    
        $eventos = Evento::ordenar('hora_id', 'ASC');
        $eventosFormateados = [];
        foreach($eventos as $evento){
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if($evento->dia_id === "1" && $evento->categoria_id === "1"){
                $eventosFormateados['conferencias_s'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "1"){
                $eventosFormateados['conferencias_d'][] = $evento;
            }
            if($evento->dia_id === "1" && $evento->categoria_id === "2"){
                $eventosFormateados['workshops_s'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "2"){
                $eventosFormateados['workshops_d'][] = $evento;
            }

        }


        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencia & WorkShops',
            'eventos' => $eventosFormateados
        ]);
    }
    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Pagina no encontrada'
        ]);
    }
}