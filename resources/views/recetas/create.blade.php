@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />

@endsection
@section('botones')

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white" >Volver</a>
@endsection
@section( 'content')

    <h2 class="text-center mb-5">Crear tus recetas</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo receta</label>
                    <input type="text"
                        class="form-control @error('titulo') is-invalid @enderror"{{-- Da formato a la caja(autofocus,etc) --}}
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo Receta"{{-- Escribe un mensaje dentro de la input --}}
                        value=" {{ old('titulo') }}" {{-- Permite que no se borren los valores después de dar clic al btn --}}

                    />
                    @error('titulo')                        
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="categoria">category</label>
                    <select
                        class="form-control @error('categoria') is-invalid @enderror"
                        name="categoria"
                        id="categoria"
                        value=" {{ old('categoria') }}" {{-- Permite que no se borren los valores después de dar clic al btn --}}
                    >
                        <option value=""> --Seleciona-- </option>
                        @foreach($categorias as /* $id => */ $categoria)

                        <option value="{{ /* $id */$categoria->id }}" {{ old('categoria') == $categoria->id/* $id */ ? 'selected': '' }}> {{ $categoria->nombre/* $categoria */ }} </option>
                            
                        @endforeach

                    </select> 
                    @error('categoria')

                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror               
                </div>

                <div class="form-group">
                    <label for="preparacion"> Preparación </label>
                    <input id="preparacion" class="@error('preparacion') is-invalid @enderror" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
                    <trix-editor input="preparacion"></trix-editor>
                
                    @error('preparacion')

                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror 
                </div>

                <div class="form-group">
                    <label for="ingredientes"> Ingredientes </label>
                    <input id="ingredientes" class="@error('ingredientes') is-invalid @enderror" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
                    <trix-editor input="ingredientes"></trix-editor>
                
                    @error('ingredientes')
                
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror 
                </div>

                <div class="form-group">
                    <label for="imagen"> Elige una imagen </label>
                    <input id="imagen" class="  mt-2 @error('imagen') is-invalid @enderror" type="file" name="imagen">
                
                    @error('imagen')
                
                    <div class="invalid-feedback " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror 
                </div>
                
                
                <div class="form-group">
                    
                    <input type="submit"
                        class="btn btn-primary"
                        value="Agregar receta"
                    />
                
                </div>


            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection