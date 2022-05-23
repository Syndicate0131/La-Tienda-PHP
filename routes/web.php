<?php

use Illuminate\Support\Facades\Route;
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

Route::get('arreglos', function(){ 
    $estudiantes =["JE"=>"Jersson", "JA"=>"Japo","DA"=>"Daniel"];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    echo "<hr />";
    //Agregar Posición
    $estudiantes []="Cristian";
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    //Retirar Elementos De Un Arreglo 
    echo "<hr />";
    unset($estudiantes["JE"]);
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
});


//Primera Ruta en Laravel
Route::get('Paises', function(){ 
    $paises =[
    "Colombia"=>[
        "Capital"=>"Bogota",
        "Moneda"=>"Peso Colombiano",
        "Poblacion"=>51.6,
        "ciudades"=>[
            "Barranquilla",
            "Medellin",
            "Cali"
        ]
    ],
    "Peru"=>[
        "Capital"=>"Lima",
        "Moneda"=>"Sol",
        "Poblacion"=>32.97,
        "ciudades"=>[
            "Cusco",
            "Arequipa"
        ]
    ],
    "Paraguay"=>[
        "Capital"=>"Asunsion",
        "Moneda"=>"Guarani",
        "Poblacion"=>7.13,
        "ciudades"=>[
            "Ciudad del Este"
        ]
    ]];
    /*
    echo "<pre>";
    var_dump($paises);
    echo "</pre>";
    echo "<hr />";
    
    foreach ($paises as $pais => $infopais) {
        echo ("<h1>$pais</h1>");
        echo ("Capital: ".$infopais["Capital"]);
        echo "<hr />";
        echo ("Moneda: ".$infopais["Moneda"]);
        echo "<hr />";
        echo ("Poblacion: ".$infopais["Poblacion"]." Millones");
        echo "<hr />";
    }

    foreach ($paises as $pais => $infopais) {
        echo ("<h1>$pais</h1>");
        foreach ($infopais as $clave => $valor) {
            echo "$clave: $valor";
            echo "<hr />";

    }}*/

    return view('paises')->with("paises",$paises);

});

Route::get('prueba', function(){
return view('productos.new');
});

//Crear las rutas Rest del Proyecto
Route::resource('productos' , ProductoController::class);

