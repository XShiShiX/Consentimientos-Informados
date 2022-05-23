

@extends('layouts.backend')

@section('content')

<div class="card mt-3 m-2">
    <h2 class="card-header" align="center">Crear Consentimiento</h2>

    <div class="card-body">

    <form action="/consent" method="POST" class="row g-3">
        @csrf

        <div class="row">
            <label for="" class="form-label">Nombre del Tratamiento</label>

                <div class="col-md-4">
                    <label for="inputState" class="form-label">Nombre del cliente</label>
                    <select id="cliente" name="cliente" class="form-select">

                        @isset($clients)
                            @foreach($clients as $client)
                                <option value="{{$client->id}}" id="cliente" name="cliente">{{$client->nombrecompleto}}</option>
                            @endforeach
                        @else
                            <h1>No existen clientes</h1>
                        @endisset

                    </select>
                    <span class="text-danger">@error('client') {{$message}}@enderror</span>
                </div><br>

            <div class="col-md-4">
                <label for="inputState" class="form-label">Texto del tratamiento</label>
                <select id="documentotratamiento" name="documentotratamiento" class="form-select">

                    @isset($treatments)
                        @foreach($treatments as $treatment)
                            <option value="{{$treatment->id}}" id="documentotratamiento" name="documentotratamiento">{{$treatment->nombre}}</option>
                        @endforeach
                    @else
                        <h1>No existen tratamientos</h1>
                    @endisset
                </select>
                <span class="text-danger">@error('treatment') {{$message}}@enderror</span>
            </div>
        </div>
        <br>


            <div class="col-10 md-6">

                    <label class="" for="">Firma del cliente</label>

                <br/>
                <div id="sig" ></div>
                <br/>
                <button id="clear" class="btn btn-danger btn-sm">Limpiar</button>
                <textarea id="signature64" name="firma" style="display: none"></textarea>
                <span class="text-danger">@error('firma') {{$message}}@enderror</span>
            </div>

            <script type="text/javascript">
                var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
                $('#clear').click(function(e) {
                    e.preventDefault();
                    sig.signature('clear');
                    $("#signature64").val('');
                });
            </script>

            <div class="card-footer">
        <div class="col-12" align="center">
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
            <a href="/consent" class="btn btn-secondary" tabindex="5">Cancelar</a>
        </div>
            </div>

    </form>
    </div>



@endsection
