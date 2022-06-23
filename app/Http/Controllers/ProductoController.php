<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
//Dependecia Validador
use Illuminate\Support\Facades\Validator;

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
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:30',
            "imagen" => 'required|image',
            "precio" => 'required|numeric',
            "categoria" => 'required',
            "marca" => 'required'

        ];

        $mensajes=
        [
            "required" => "Este campo es oligatorio",
            "alpha" => "El campo solo acepta caracteres alfabeticos",
            "unique" => "Este producto ya esta registrado",
            "min" => "El campo debe tener mas de 10 caracteres",
            "max" => "El campo no debe superar los 30 caracteres",
            "image" => "El archivo debe ser una imagen",
            "numeric" => "El campo solo acepta caracteres numericos"


        ];


        //Objeto Validador    
        $v = Validator::make($request->all(), $reglas, $mensajes);

        //Validar
        if ($v->fails()){
            return redirect('productos/create')
            ->withErrors($v);
        }
        else{
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
            //redireccionar al formulario con mensaje de registro Exitoso
            return redirect('productos/create')
            ->with("mensajito", "Producto Registrado Con Exito");
        }
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
