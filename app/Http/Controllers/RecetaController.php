<?php

namespace App\Http\Controllers;
use App\Models\Dificultade;
use App\Models\receta;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //Se crea variable con los datos rellenados de la tabla pedimos que solo nos muestre los 5 primeros
         $Datos['recetas']=receta::get()
         ->sortBy('nombre')
         ->paginate(5);
         $collection=$Datos['recetas'];
         $sorted['recetas']=$collection->sortBy('nombre');
         $sorted['recetas']->all();

         return view('receta.index',$Datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Se envia la funcion a la url de la pagina que le corresponde.
        $receta=new receta();
        $dificultades=Dificultade::pluck('nombre','id');
        $usuario=User::pluck('name','id');
        return view('receta.create',compact('receta','dificultades','usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     { $campos=[
        'nombre'=>'required|string|max:100',
        'instrucion'=>'required|string|min:100|max:1000',
        'ingrediente_id'=>'required|string|min:10|max:1000',
        'tiempo'=>'required|integer|min:1',
        'dificultad_id'=>'required|string|max:10',
        
    ];
    //Una vez creado los parametros se crean los mensajes necesarios, en este caso el required
    $mensaje=[
        'required'=>'El :attribute es necesario',
        'instrucion.required'=>'Las instrucciones son necesarias',
        'ingrediente_id.required'=>'Debe haber un ingrediente como minimo',
        'integer'=>'El :attribute debe ser un numero',
        'min'=>['string'=>'El :attribute debe tener un minimo de :min caracteres',
            'instrucion.string' =>'Las intrucciones debe tener un minimo de :min  caracteres'],
    ];
    if($request->hasFile('foto')){
        $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        $mensaje=['foto.required'=>'La foto es necesaria',];
    }
    //Una vez los datos por validar y el mensaje que que se quiere mostrar, los uniremos por medio de un metodo
    $this->validate($request, $campos, $mensaje);
       //Se crea variable con los datos de la tabla se pide lo que hay en el formulario y este responde con un dato menos
        //$datosReceta= request()->all(); Con todos los datos
        $datosReceta=request()->except('_token');
        //Para crear la foto se usa la condicional preguntando si existe el archivo si no es asi lo envia a la ruta especificada
        if($request->hasFile('foto')){

            $datosReceta['foto']=$request->file('foto')->store('uploads','public');
        }
        //Se hace la insercion por este metodo de laravel
        receta::insert($datosReceta);
        return redirect('receta')->with('mensaje','Receta agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(receta $receta)
    {
        // $recetas=recetas::search(request('search'))->get();
      
        $recetas=receta::search(request('search'))
        ->get()->sortBy('nombre')
        ->paginate(5);
        
        
        
        return view('receta.show',compact('recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Siempre retornar la vista a donde queremos redirigir la funcion, se hace la busqueda del dato en este caso el id para hacer la vista
        $receta=receta::findOrFail($id);
        $dificultades=Dificultade::pluck('nombre','id');
        $usuario=User::pluck('name','id');
        return view('receta.edit',compact('receta','dificultades','usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {     //Parametros para cada uno de los campos para poder rellenar una receta
        $campos=[
            'nombre'=>'required|string|max:100',
            'instrucion'=>'required|string|min:100|max:1000',
            'ingrediente_id'=>'required|string|min:10|max:1000',
            'tiempo'=>'required|integer|min:1',
            
        ];
        //Una vez creado los parametros se crean los mensajes necesarios, en este caso el required
        $mensaje=[
            'required'=>'El :attribute es necesario',
            'instrucion.required'=>'Las instrucciones son necesarias',
            'ingrediente_id.required'=>'Debe haber un ingrediente como minimo',
            'min'=>['string' =>'El :attribute debe tener un minimo de caracteres'],
        
        ];
        if($request->hasFile('foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['foto.required'=>'La foto es necesaria',];
        }
        //Una vez los datos por validar y el mensaje que que se quiere mostrar, los uniremos por medio de un metodo
        $this->validate($request, $campos, $mensaje);
        //Enviar la informacion de la vista edit para que actualize la informacion, se hace la excepcion del dato token y del metodo, ya que no se va utilizar
        //Instruccion a mysql en el que condicionamos que la ruta del id existe , hace la update de todos los datos de ese id
        $datosReceta=request()->except(['_token','_method']);
        //Para la foto se usa la condicional como en create , preguntando si existe el archivo y si es asi , se elimine el archivo anterior , y se almacene uno nuevo
        if($request->hasFile('foto')){
            $receta=receta::findOrFail($id);

            Storage::delete('public/'.$receta->foto);
             
            $datosReceta['foto']=$request->file('foto')->store('uploads','public');
        }
        receta::where('id','=',$id)->update($datosReceta);

        $receta=receta::findOrFail($id);
        return view('receta.edit',compact('receta'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Hacer la busqueda de la id, como en todas las funciones , crear condicional que si encuentra un file de alguna foto almacenada nos la elimine del storage ya linkeado
        $receta=receta::findOrFail($id);
        if(Storage::delete('public/'.$receta->foto)){
            receta::destroy($id);   
        }  
        
        return view('admin.dashboard')->with('mensaje','Receta Borrada con exito');
    }
}
