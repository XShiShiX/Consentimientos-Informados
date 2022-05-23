@extends('layouts.backend')

@section('content')

    <div class="card mt-3 m-2">

    <h3 class="card-header" align="center">Mostrar Tratamiento</h3>

        <div class="card-body">
    <form action="/treatment-show/{{$treatment->id}}" method="POST">

        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $treatment->nombre }}" tabindex="1" disabled>
            <span class="text-danger">@error('nombre') {{$message}}@enderror</span>
        </div><br>

        <div class="row input-group mb-2">
            <label class="">Texto del tratamiento</label><br>
            <textarea class="form-control" name="texto" id="editorT" aria-label="With textarea" disabled> {!!$treatment->texto!!} </textarea>
            <span class="text-danger">@error('texto') {{$message}}@enderror</span>
        </div><br>


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

        <div class="row input-group mb-2">
            <label class="">Comentarios</label>
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

<div class="card-footer">
        <div class="col-12" align="center">
        <a href="/treatment" class="btn btn-secondary" tabindex="5">Volver</a>
        </div>
</div>
    </form>
        </div>
    </div>
@endsection
