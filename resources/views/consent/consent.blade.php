@extends('layouts.backend')

@section('content')

    <!--<a href="consent/create" class="btn btn-primary">Crear Nuevo Consentimiento</a>-->

    <div class="card card mt-3 m-2">

        <h5 class="card-header justify-content-between border-end d-inline-flex">
            Consentimientos
            <a href="consent/create" class="btn btn-primary"><i class="fas fa-plus"> Nuevo</i>  </a>
        </h5>


        <div class="card-body">

    <table class="table table-striped mt-4" id="myTable2">
        <thead>
        <tr>

            <th scope="col">Cliente</th>
            <th scope="col">Tratamiento</th>
            <th scope="col">Fecha y hora</th>
            <th scope="col">Opciones</th>

        </tr>
        </thead>
        <tbody>
        @forelse($consents as $consent)
            @foreach($clients as $client)
            @if($client->id == $consent->cliente)

            <tr>
                <td>{{$client->nombrecompleto}}</td>
                @foreach($treatments as $treatment)
                    @if($treatment->id == $consent->documentotratamiento)
                <td>{{$treatment->nombre}}</td>
                    @endif
                @endforeach
                <td>{{$consent->fechahora->format('d/m/Y H:i:s')}}</td>

                <td>
                    <form action="/consent/{{$consent->id}}" method="POST">

                        <div class="btn-group" role="group">
                            <a href="/consent-pdf/{{$consent->id}}" class="btn btn-info"><i class="fas fa-eye"> PDF</i> </a>
                            <a href="/consent-destroy/{{$consent->id}}" class="btn btn-danger"><i class="fas fa-trash"></i> </a>
                        </div>
                        <!--<button type="submit" class="btn btn-danger">Borrar</button>-->
                    </form>

                </td>

            </tr>

            @endif
            @endforeach
        @empty


        @endforelse
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable2').DataTable(
                {
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                }
            );
        } );
    </script>

    </div>
    </div>
@endsection
