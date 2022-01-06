<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Cache\Store;

class RecetaController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except'=>'show']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Auth::user()->recetas->dd();
        // $recetas=Auth::user()->recetas;

        // *Inicio de páginacion|| vídeo 110 
        //Recuperando el usuario autenticado
        $usuario= auth()->user()->id;

        $recetas=Receta::where('user_id', $usuario)->paginate(10);
        // *Fin de páginacion 



       return view('recetas.index')
                ->with('recetas',$recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::table('categoria_receta')->get()->pluck('nombre','id')->dd();

        //Consultando datos de la yabla y asigando a variable "categorias" como controller DB
        //$categorias=DB::table('categoria_recetas')->get()->pluck('nombre','id');

        //con modelo

        $categorias=CategoriaReceta::all(['id','nombre']);//-->en corchetes seleccionas los campos de interes sino llamas a todos

        return view('recetas.create')
                        ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request['imagen']->store('img-recetas','public'));
        // dd( $request->all() );
        $data= request()->validate(
            [
                'titulo' => ['required','String','min:6'],
                'ingredientes' => ['required'],
                'preparacion' => ['required'],
                'imagen' => ['required', 'image', /* 'size:1000' */],
                'categoria' => ['required'],

            ]
        );

        $imagen_receta= $request['imagen']->store('img-recetas','public');

        //Inserción de datos con controller
        /* DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'user_id'=>Auth::user()->id,
            'imagen'=>$imagen_receta,
            'categoria_id'=>$data['categoria'],


        ]); */

            //inseción de datos con rl modelo

        Auth::/* ()-> */user()->recetas()->create([

            'titulo'=>$data['titulo'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'user_id'=>Auth::user()->id,
            'imagen'=>$imagen_receta,
            'categoria_id'=>$data['categoria'],

        ]);

        //Redireciona
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show')->with('receta',$receta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //Revisar poliocy
        $this-> authorize('view',$receta);

        $categorias=CategoriaReceta::all(['id','nombre']);//-->en corchetes seleccionas los campos de interes sino llamas a todos

        return view('recetas.edit')
            ->with('categorias',$categorias)
            ->with('receta',$receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        $this-> authorize('update',$receta);
        //Validación del formulario
        $data= request()->validate(
            [
                'titulo' => ['required','String','min:6'],
                'ingredientes' => ['required'],
                'preparacion' => ['required'],
            'imagen' => [ 'image', /* 'size:1000' */],
            'categoria' => ['required'],
            
            ]
        );
        
        //Asignación de valores
        $receta->titulo = $data['titulo'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];
        //$receta->imagen = $data['imagen'];
        $receta->categoria_id = $data['categoria'];
        $receta->save();
        
        //Verificar si el usuari
        if(request('imagen')){
            // TODO: Realizar c{odigo para eliminar la foto existente y agragar la nueva foto de tal manera que se queden las viejas.
           /*  if($receta->imagen && $request['imagen']){
                // dd("/storage/".$receta->imagen);
               Storage::delete("public/storage/".$receta->imagen);
              } */
            $imagen_receta= $request['imagen']->store('img-recetas','public');
            $receta->imagen=$imagen_receta;
            //dd( $receta->save());
            $receta->save();
        }
        //Redireccionar al index
        return redirect()->action('RecetaController@index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // return "elimando..";
        //elimina la receta
        $receta->delete();
         return redirect()->action('RecetaController@index');
    }
}
