<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
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
        echo "aqui va la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "aqui va el formulario para registrar producto";
        //seleccionar marcas
        $marcas = Marca::all();

        //seleccionar categorias
        $categorias = Categoria::all();
        return view("productos.new")
                ->with('categorias' , $categorias)
                ->with('marcas' , $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*echo "<pre>";
        var_dump($request->nombre);
        echo "</pre>";*/

        //Validación
        //Establecer Reglas de Validación
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required'
        ];

        $mensajes=[
            "required" => "Campo obligatorio",
            "alpha" => "Solo letras",
            "numeric" => "Solo números",
            "image" => "Debe ser un archivo de imagen",
            "min" => "minimo :min valor"
        ];

        //2. Crear Objeto Validador
        $v = Validator::make($request->all(), $reglas, $mensajes);

        //3. Validar
        //Fails() retorna: 
        //True si la validación falla
        //False si los datos son validos
        if ($v->fails()) {
            //validación incorrecta
            //mostrar la vista llevando los errores
            return redirect('productos/create')
                ->withErrors($v);
            //var_dump($v->errors());
        }else {
            //validación correcta
            $archivo = $request->imagen;
            $nombre_archivo = $archivo->getClientOriginalName();
            var_dump($nombre_archivo);
            
            //Mover el archivo a la carpeta img
            $ruta = public_path();
            $archivo->move("$ruta/img", $nombre_archivo);

            //registrar producto
            $producto = new Producto;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->desc;
            $producto->precio = $request->precio;
            $producto->imagen = $nombre_archivo;
            $producto->marca_id = $request->marca;
            $producto->categoria_id = $request->categoria;
            $producto->save();
            
            return redirect('productos/create')
                ->with("mensaje", "producto registrado");
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui va el detalle de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va el form para editar el producto con id: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
