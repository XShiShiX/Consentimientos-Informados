

@extends('layouts.backend')

@section('content')

<div class="card  mt-3 m-2">

    <h3 class="card-header" align="center">Crear Tratamiento</h3>

    <div class="card-body">
    <form action="/treatment" method="POST" class="row g-3">
        @csrf

        <div class="row">

            <div class="col mb-4">
                <label for="" class="form-label">Nombre del Tratamiento</label>
                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="First name" value="{{old('nombre')}}">
                <span class="text-danger">@error('nombre') {{$message}}@enderror</span>
            </div><br>

            <div class="row input-group mb-4">
                <label class="">Texto del tratamiento</label>
                <textarea class="" name="texto" id="editorT" aria-label="With textarea" value="" rows="5"></textarea>
                <span class="text-danger">@error('texto') {{$message}}@enderror</span>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/de.js"></script>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editorT' ), {
                        language: 'es'
                    } )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>

            <div class="row input-group mb-2">
                <label class="">Comentarios</label>
                <textarea class="form-control" name="comentarios" id="editorC" aria-label="With textarea" value="" style=""></textarea>
            </div>

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
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
            <a href="/treatment" class="btn btn-secondary" tabindex="5">Cancelar</a>
        </div>
        </div>

    </form>
    </div>
</div>

@endsection
