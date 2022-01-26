<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PerfilController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => 'show']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
       //Obtner recetas con paginación
       $recetas= Receta::where('user_id',$perfil->user_id)->paginate(6);
     // return $recetas->links();

        return view('perfiles.show')
        ->with('perfil',$perfil)
        ->with('recetas',$recetas);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //Ejecutar el policy
        $this->authorize('view',$perfil);
        
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //Ejecutar el policy
        $this->authorize('update',$perfil);
        // Validar datos del formulario.
        $data = request()->validate(
            [
                'url' => 'required',
                'nombre-user' => 'required',
                'Biografia' => 'required',
                'imagen' =>'image'
                
            ]
        );
       // dd($data);
           
       if($request['imagen']){
           
           //eliminar imagen vieja
           if($perfil->imagen && $request['imagen']){
                
             Storage::delete("public/".$perfil->imagen);
           }

           //obtener dirección
           $imagen_ruta= $request['imagen']->store('images-users-perfil','public');
           //! Integrando intervation image al proyecto
           //Redimencionar imagen //* composer require intervention/image   || http://image-v1.intervention.io/
           
            $image= Image::make( public_path("storage/{$imagen_ruta}"))->fit(600, 600) ;
            $image->save();
           

            //creando arreglo para inyectar en la bd
            $array_image= ['imagen'=>$imagen_ruta];
            //dd($array_image);
        }

            //ASignar nombre y url a la tabla de usuarios.
            auth()->user()->name=$data['nombre-user'];
            auth()->user()->url=$data['url'];
            auth()->user()->save();
            //Asignar biografía y imagen a perfil
            unset($data['url'],$data['nombre-user']);//*eliminando valores del objeto
        //    return $data;
       
        auth()->user()->perfil()->update( 
            array_merge( //* Une multiples arreglos
                $data,
                $array_image ?? []
            )
        );

        // Verifica si el usuario sube una imagen


        // Guardar información

        // redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
