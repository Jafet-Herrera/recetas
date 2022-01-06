@extends('layouts.app')

@section('botones')

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white" >
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
         </svg>
        &nbsp;Volver
    </a>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if( $perfil->imagen )                        
                    <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle shadow-sm" alt=""  >
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary">{{$perfil->usuario->name}}</h2>
                <a href="{{$perfil->usuario->url}}" class="">Visita Sitio Web</a>
                <div class="biografia">
                    {!! $perfil->Biografia !!}
                </div>
            </div>
        </div>
    </div>

   

    <article>
        <h2 class="text-center my-5">
            Recetas creadas por {{$perfil->usuario->name}}
        </h2>
 

        <div class="row mx-auto{{--  bg-white --}} p-4">
            @if( count( $recetas ) >0 )

                @foreach($recetas as $receta)
                <div class="col-md-4 mb-4">

                    <div class="card shadow-lg">
                        <img src="/storage/{{$receta->imagen}}" class="card-img-top" alt="Imagen receta">
                       
                        <div class="card-body">
                            <h3>
                                {{$receta->titulo}}
                            </h3>

                            <a href="{{ route('recetas.show', ["receta" => $receta->id]) }}" class="btn btn-primary d-bloc mt-4 text-uppercase font-weight-bold w-100">
                                Ver receta
                            </a>
                        </div>
                    </div>

                </div>
                    
                @endforeach

            @else
                <p class="text-center w-100"> No hay recetas aún...</p>
            @endif
          
        </div>

         {{-- @Inicio-Paginacion --}}
  <div class="col-12 justify-content-center d-flex">
    {{$recetas->links()}}
</div>
{{-- @Fin-Paginacion --}}
        
        {{-- <div class="container">

        </div> --}}
    </article>
@endsection

