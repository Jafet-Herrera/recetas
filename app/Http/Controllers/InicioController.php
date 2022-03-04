<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;


class InicioController extends Controller
{
    public function index(){

        //* obtener las recetas mas nuevas
        //$recetasNews= Receta::orderBy('created_at', /* 'ASC' */'DESC')->get();//? 1era forma ocupando el ORM
        /* 
            * latest() : retorna los mas nuevos
            * oldest() : retorna los mas viejos(con mayor tiempo de creación)
            ----------------------
            ? limit() : Función del ORM
            * take() : funcón de laravel
            En ambas se introduce el número de resultado que deseas que sean retorados por la función
         */
        $recetasNews= Receta::latest()->take(6)->get();
        

        return view('inicio.index', compact('recetasNews'));
    }
}
