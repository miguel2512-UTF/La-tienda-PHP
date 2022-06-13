<?php

use Illuminate\Support\Facades\Route;
//dependencia al controlador
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta en laravel
Route::get('hola' , function(){
    echo "hola";
});

/*Route::get('arreglos' , function(){
    $estudiantes = ["Mi" => "Miguel", "Cr" => "Cristhian", "Jo" => "Johan"];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    echo "<hr />";
    //agregar posición
    $estudiantes["CR"] = "Cristian";
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    //retirar elementos de arreglos
    echo "<hr />";
    unset($estudiantes["Mi"]);
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
});*/

//segunda ruta
Route::get('paises' , function(){
    $paises=[
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "Peso",
            "poblacion" => 51.6,
            "ciudades" => [
                "Bogotá",
                "Medellín",
                "Cali"
            ]
        ],
        "Peru" => [
            "capital" => "lima",
            "moneda" => "Sol",
            "poblacion" => 32.97,
            "ciudades" => [
                "Cusco",
                "Piura"
            ]
        ],  
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" => "Guarani",
            "poblacion" => 7.1,
            "ciudades" => [
                "Ciudad del Este"
            ]
        ]
    ];

    /*echo "<pre>";
    var_dump($paises);
    echo "</pre>";
    echo "<hr />";

    foreach($paises as $pais => $infopais){
        echo "<h1> $pais </h1>";
        echo "capital: ".$infopais["capital"]."<br>";
        echo "moneda: ".$infopais["moneda"]."<br>";
        echo "poblacion: ".$infopais["poblacion"]."<br>"; 
        echo "<hr />";
    }

    foreach($paises as $pais => $infopais){
        echo "<h1> $pais </h1>";
        foreach($infopais as $clave => $valor){
            echo "$clave : $valor<br>";
        }
        echo "<hr />";
    }*/

    //mostrar la vista de paises
    return view('paises')
        ->with("paises" , $paises);
});

/*Route:: get('producto/create', function(){
    return view('productos.new');
});*/

//Rutas REST
Route::resource('productos', ProductoController::class);
?>