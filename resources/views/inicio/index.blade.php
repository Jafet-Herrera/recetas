@extends('layouts.app')

@section('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas Recetas</h2>

        <div class="row">

            @foreach ($recetasNews as $news)

                <div class="col-md-4 mt-2">
                    
                    <div class="card  {{-- mb-5 --}}box-shadow">
                        <img src="/storage/{{ $news->imagen }}" class="card-img-top " style="height: 35%" alt="imagen receta">
                        <div class="card-body">
                            <h3>{{Str::title($news->titulo)}}</h3>
                            <p>{{ Str::words(strip_tags($news->preparacion),15)}}</p>
                            {{-- 
                                * limit() : introduce el número letras especificadas 
    
                                * words() : introduce el número palabras especificadas 
                                --}}
    
                            <a href="{{route('recetas.show', ['receta' => $news->id])}}" class="btn btn-primary d-block font-weigth-bold text-uppercase">Ver Receta</a>
                        </div>                    
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    {{-- {{$recetasNews}} --}}
@endsection