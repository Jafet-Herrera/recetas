@extends('layouts.app')

@section('content')


    <article class="contenido-receta">
        <h1 class="text-center mb-4"> {{ $receta->titulo }} </h1>

        <div class="imagen-receta">
           <img src="/storage/{{$receta->imagen}}" alt="" class="w-100">
        </div>

        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{ $receta->categoria->nombre }}
            </p>
        </div>

        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{ $receta->autor->name }}
            </p>
        </div>

       
            <p>
                <span class="font-weight-bold text-primary">Fecha de creación:</span>
                @php
                    $fecha = $receta->created_at
                @endphp
                {{-- <example-component></example-component> --}}
                {{-- <fecha fecha="{{$fechaFormateada}}"></fecha-receta> --}}
                    <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
            </p>
        

        <div class="ingredientes">
            <p>
                <span class="font-weight-bold text-primary">Ingredientes:</span>
                {!! $receta->ingredientes !!}
            </p>
        </div>

        <div class="preparacion">
            <p>
                <span class="font-weight-bold text-primary">Preparación:</span>
                {!! $receta->preparacion !!}
            </p>
        </div>

       

    </article>
    

    <article>
        fsdf
        <like-button></like-button>
        

    </article>

@endsection
