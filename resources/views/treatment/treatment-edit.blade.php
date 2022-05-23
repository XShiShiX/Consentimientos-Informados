@extends('layouts.backend')

@section('content')

    <div class="card mt-3 m-2">

    <h3 class="card-header" align="center">Editar Tratamiento</h3>

        <div class="card-body">
    <form action="/treatment-edit/{{$treatment->id}}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $treatment->nombre }}" tabindex="1">
            <span class="text-danger">@error('nombre') {{$message}}@enderror</span>
        </div>



        <div class="input-group mb-2">
            <span class="input-group-text">Texto del tratamiento</span>
            <textarea class="form-control" name="texto" id="editorT" aria-label="With textarea" value="{{ $treatment->texto }}">{{ $treatment->texto }}</textarea>
            <span class="text-danger">@error('texto') {{$message}}@enderror</span>
        </div>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editorT' ) , {
                    language: 'es'
                })
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>

        <div class="input-group mb-2">
            <span class="input-group-text">Comentarios</span>
            <textarea class="form-control" name="comentarios" id="editorC" aria-label="With textarea" value="{{ $treatment->comentarios }}">{{ $treatment->comentarios }}</textarea>
        </div>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editorC' ) , {
                    language: 'es'
                })
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>


        <div align="center">
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        <a href="/treatment" class="btn btn-secondary" tabindex="5">Cancelar</a>
        </div>

    </form>
        </div>
        </div>
@endsection
