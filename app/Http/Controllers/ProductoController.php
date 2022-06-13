<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aqui va la lista de Productos unu";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('productos.new')
        ->with('marcas' , $marcas)
        ->with('categorias' , $categorias);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Acceder datos Form utilizando $request
        /*
        echo "<pre>"; 
        var_dump($request->nombre);        
        var_dump($request->precio);        
        var_dump($request->desc);
        var_dump($request->imagen);
        echo "</pre>"; 
        */
        $archivo = $request->imagen;
        $nombre_archivo = $archivo->getClientOriginalName();
        //Mover archivo a la carpeta creada para las Imagenes 
        $ruta = public_path();
        //Oli
        $archivo->move("$ruta/img", $nombre_archivo);
        $producto = new Producto;
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->desc;
        $producto->imagen=$nombre_archivo;
        $producto->marca_id=$request->marca;       
        $producto->categoria_id=$request->categoria;
        $producto->save();
        echo "Producto Registrado";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aqui va el detalle de producto con Id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aqui va el Formulario de edicion sobre el producto con Id: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
