
@extends('layouts.backend')

@section('content')

    <div class="card mt-3 m-2">

        <h3 class="card-header" align="center">Crear Modulo de Configuracion</h3>

        <div class="card-body">

            <form action="/module" method="POST" class="row g-3" enctype="multipart/form-data">

                @csrf

                <div class="">

                    <div align="center">
                    <input type="file" name="file" id="" accept="image/*">
                    @error('file')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>

                    <label for="" class="form-label">Nombre de la Empresa</label>
                    <div class="col">
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="First name" value="{{old('nombre')}}">
                        <span class="text-danger">@error('nombre') {{$message}}@enderror</span>
                    </div>
                </div>

                <div class="col-12">
                    <label for="direccion">Direccion</label><input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="{{old('direccion')}}">
                    <span class="text-danger">@error('direccion') {{$message}}@enderror</span>
                </div>

                <div class="col-md-2">
                    <label for="poblacion">Poblacion</label><input type="text" class="form-control" id="poblacion" name="poblacion" placeholder="Poblacion" value="{{old('poblacion')}}">
                    <span class="text-danger">@error('poblacion') {{$message}}@enderror</span>
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="Codigo Postal" value="{{old('codigopostal')}}">
                    <span class="text-danger">@error('codigopostal') {{$message}}@enderror</span>
                </div>

                <div class="col-4">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                    <span class="text-danger">@error('email') {{$message}}@enderror</span>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{old('telefono')}}">
                    <span class="text-danger">@error('telefono') {{$message}}@enderror</span>
                </div>

                <div class="col-6">
                    <label for="" class="form-label">CIF</label>
                    <input type="text" class="form-control" id="cif" name="cif" placeholder="CIF" value="{{old('cif')}}">
                    <span class="text-danger">@error('cif') {{$message}}@enderror</span>
                </div>



                <div class="row input-group mb-2">
                    <label class="">RGPD</label>
                    <textarea class="form-control" name="rgpd" id="editorR" aria-label="With textarea" value="" style="">{{old('rgpd')}}</textarea>
                </div>
                <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
                <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/de.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editorR' ) , {
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
                    <label class="">Observaciones</label>
                    <textarea class="form-control" name="observaciones" id="editorO" aria-label="With textarea" value="" style="">{{old('observaciones')}}</textarea>
                </div>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editorO' ) , {
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
                        <button type="submit" id="asd" class="btn btn-primary" tabindex="4" onclick="">Guardar</button>
                        <a href="/client" class="btn btn-secondary" tabindex="5">Cancelar</a>
                    </div>
                </div>

@endsection

