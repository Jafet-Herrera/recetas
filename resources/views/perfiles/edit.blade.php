@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />

@endsection
@section('botones')

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white" >
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
         </svg>
        &nbsp;Volver
    </a>
@endsection

@section('content')

    {{-- {{$perfil->usuario->name}} --}}
<br>
    {{-- {{$perfil}} --}}

    <div class="container">

        <h1 class="text-center">Editar Mi perfil</h1>

        <div class="row justofy-content-center mt-5 shadow-lg">
            <div class="col-md-10 bg-white p-3">

                <form action="{{route('perfil.update', ['perfil' =>$perfil->id])}}" method="POST" enctype="multipart/form-data" novalidate>

                    @csrf

                    @method('put')

                    <div class="form-group">
                        <label for="nombre-users">Nombre</label>
                        <input type="text"
                            class="form-control @error('nombre-user') is-invalid @enderror"{{-- Da formato a la caja(autofocus,etc) --}}
                            id="nombre-users"
                            name="nombre-user"
                           
                            value=" {{ $perfil->usuario->name }}" Permite que no se borren los valores después de dar clic al btn
    
                        />
                        @error('nombre-user')                        
                            <div class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="url">Sitio Web</label>
                        <input type="text"
                            class="form-control @error('url') is-invalid @enderror"{{-- Da formato a la caja(autofocus,etc) --}}
                            id="url"
                            name="url"
                           
                            value=" {{ $perfil->usuario->url }}" {{-- Permite que no se borren los valores después de dar clic al btn --}}
    
                        />
                        @error('url')                        
                            <div class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Biografia"> Biografia </label>
                        <input id="Biografia" class="@error('Biografia') is-invalid @enderror" type="hidden" name="Biografia" value="{{ $perfil->Biografia }}">
                        <trix-editor input="Biografia"></trix-editor>
                    
                        @error('Biografia')
    
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror 
                    </div>

                    <div class="form-group">
                        <label for="imagen"> Elige una imagen </label>
                        <input type="file" name="imagen" id="imagen" class="  mt-2 @error('imagen') is-invalid @enderror" >
                    
                        @error('imagen')
                    
                        <div class="invalid-feedback " role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror 
                    </div>
                    
                    @if( $perfil->imagen )
                        
                        <div class="imagen-receta mt-4 mb-4">
                            <label for="imagen-receta d-block"> Imagen Actual: </label>
                            <img src="/storage/{{$perfil->imagen}}" alt="" style="width: 300px;" >
                        </div>
                        
                    @endif

                    <div class="form-group">
                    
                        <input type="submit"
                            class="btn btn-primary"
                            value="Actualizar"
                        />
                    
                    </div>

                </form>

            </div>


            {{-- <div class="col-md-7">
                <h2 class="text-center mb-2 text-primary">{{$perfil->usuario->name}}</h2>
                <a href="{{$perfil->usuario->url}}" class="">Visita Sitio Web</a>
                <div class="Biografia">
                    {!! $perfil->Biografia !!}
                </div>
            </div> --}}
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection