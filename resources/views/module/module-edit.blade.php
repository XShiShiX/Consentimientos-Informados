
@extends('layouts.backend')

@section('content')

    <div class="card mt-3 m-2">

        <h3 class="card-header" align="center">Editar Modulo de Configuracion</h3>

        <div class="card-body">

            <form action="/module-edit/{{$modulee->id}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="">

                    <div class="container col-md-6">
                        <div class="mb-5">
                            <label for="Image" class="form-label">Seleccione la Imagen del Logo</label>
                            <input class="form-control" name="file" type="file" id="file" onchange="preview()">
                            <textarea id="signature64" name="LOGO" value="{{ $modulee->logo }}" style="display: none">{{ $modulee->logo }}</textarea>
                        </div>
                        <img id="frame" src="" class="img-fluid" />
                    </div>

                    <script>
                        function preview() {
                            frame.src = URL.createObjectURL(event.target.files[0]);
                        }
                    </script>

                    <!--<div align="center">
                        <input type="file" name="file" id="files" accept="image/*" value="{{ $modulee->logo }}" onchange="loadFile(event)">
                        <br />
                        <output id="list"></output>
                        @error('file')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>-->
                    <script>
                        function archivo(evt) {
                            var files = evt.target.files; // FileList object

                            // Obtenemos la imagen del campo "file".
                            for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                    continue;
                                }

                                var reader = new FileReader();

                                reader.onload = (function(theFile) {
                                    return function(e) {
                                        // Insertamos la imagen
                                        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                    };
                                })(f);

                                reader.readAsDataURL(f);
                            }
                        }

                        document.getElementById('files').addEventListener('change', archivo, false);
                    </script>

                    <label for="" class="form-label">Nombre de la Empresa</label>
                    <div class="col">
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="First name" value="{{ $modulee->nombre }}">
                        <span class="text-danger">@error('nombre') {{$message}}@enderror</span>
                    </div>
                </div>

                <div class="col-12">
                    <label for="direccion">Direccion</label><input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="{{ $modulee->direccion }}">
                    <span class="text-danger">@error('direccion') {{$message}}@enderror</span>
                </div>

                <div class="col-md-2">
                    <label for="poblacion">Poblacion</label><input type="text" class="form-control" id="poblacion" name="poblacion" placeholder="Poblacion" value="{{ $modulee->poblacion }}">
                    <span class="text-danger">@error('poblacion') {{$message}}@enderror</span>
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="Codigo Postal" value="{{ $modulee->codigopostal }}">
                    <span class="text-danger">@error('codigopostal') {{$message}}@enderror</span>
                </div>

                <div class="col-4">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $modulee->email }}">
                    <span class="text-danger">@error('email') {{$message}}@enderror</span>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{ $modulee->telefono }}">
                    <span class="text-danger">@error('telefono') {{$message}}@enderror</span>
                </div>

                <div class="col-6">
                    <label for="" class="form-label">CIF</label>
                    <input type="text" class="form-control" id="cif" name="cif" placeholder="CIF" value="{{ $modulee->cif }}">
                    <span class="text-danger">@error('cif') {{$message}}@enderror</span>
                </div>



                <div class="row input-group mb-2">
                    <label class="">RGPD</label>
                    <textarea class="form-control" name="rgpd" id="editorR" aria-label="With textarea" value="{{ $modulee->rgpd }}" style="">{{ $modulee->RGPD }}</textarea>
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
                    <textarea class="form-control" name="observaciones" id="editorO" aria-label="With textarea" value="{{ $modulee->observaciones }}" style="">{{ $modulee->observaciones }}</textarea>
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
                <a href="/module" class="btn btn-secondary" tabindex="5">Cancelar</a>
            </div>
        </div>

@endsection
