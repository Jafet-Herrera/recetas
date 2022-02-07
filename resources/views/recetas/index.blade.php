@extends('layouts.app')

@section('botones')

    <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary text-upercase font-weight-bold " >
        Crear Receta
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
        </svg>
    </a>
    &nbsp;
    <a href="{{ route('perfil.show', ['perfil'=>auth()->user()->id]) }}" class="btn btn-outline-secondary text-upercase font-weight-bold" >
        Ver perfil
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
        </svg>
    </a>
    &nbsp;
   
    <a href="{{ route('perfil.edit', ['perfil'=>auth()->user()->id]) }}" class="btn btn-outline-dark text-upercase font-weight-bold" >
        Editar perfil
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
        </svg>
    </a>



@endsection
@section( 'content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoria</th>                    
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recetas as $receta)
                    
                    <tr>
                        <td>{{ $receta->titulo }}</td>
                        <td>{{ $receta->categoria->nombre}}</td>
                        <td>
                         {{--   <form action=" {{ route( 'recetas.destroy', ['receta'=>$receta->id] ) }} " method="POST">
                                @method('delete')
                                @csrf --}}
                                <eliminar-receta
                                    receta-id={{$receta->id}}>
                                </eliminar-receta>

                           {{--  </form> --}}
                            <a class="btn btn-dark d-block mb-2" href="{{ route('recetas.edit',['receta'=>$receta->id]) }}">Editar</a>
                            <a class="btn btn-success d-block"  href="{{ route('recetas.show',['receta'=>$receta->id])/* action('RecetaController@show',['receta'=>$receta->id]) */ }}">Ver</a>
                            {{-- 
                                ----Opcines para pasar el id de la receta en el show----
                                Action → tiene el nombre del controlador y el metodo.
                                Route → Tiene el alias de la ruta.
                            --}}

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

        {{-- @Inicio-Paginacion --}}
        <div class="col-12 mt-4 justify-content-center d-flex">
            {{$recetas->links()}}
        </div>
        {{-- @Fin-Paginacion --}}
        {{-- @Inicio-RecetasConLike --}}
        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p-3">
        @if(count($usuario->meGusta) > 0)
        <ul class="list-group">
            @foreach($usuario->meGusta as $recetasLike)
                <il class="list-group-item d-flex justify-content-between align-items-center">
                    <p>{{$recetasLike->titulo}}</p>

                    <a class="btn btn-outline-success" href="{{ route('recetas.show',['receta'=>$recetasLike->id]) }}">Ver</a>
                </il>
            @endforeach
        </ul>
        @else
        <p>No tienes recetas</p>
        @endif
        </div>
        {{-- @Fin-RecetasConLike --}}


    </div>

@endsection