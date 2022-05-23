@extends('layouts.backend')


@section('content')




        <div class="card mt-3 m-2" style="">

                <h5 class="card-header justify-content-between border-end d-inline-flex">
                    Clientes
                    <a href="client-create" class="btn btn-primary"><i class="fas fa-plus"> Nuevo</i>  </a>
                </h5>

            <div class="card-body">
                <table class="table table-striped mt-4" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Creador</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Ultimo Editor</th>
                        <th scope="col">Ultima Edicion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$client->nombrecompleto}}</td>
                            <td>{{$client->usuariocreador}}</td>
                            <td>{{$client->fechacreacion->format('d/m/Y')}}</td>
                            <td>{{$client->ultimocreador}}</td>
                            <td>{{$client->fechamodificacion->format('d/m/Y')}}</td>
                            <td>
                                <form action="/client/{{$client->id}}" method="POST">
                                    <div class="btn-group" role="group">
                                        <a href="/client-show/{{$client->id}}" class="btn btn-info"><i class="fas fa-eye"></i> </a>
                                        <a href="/client-edit/{{$client->id}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> </a>
                                        <a href="/client-destroy/{{$client->id}}" class="btn btn-danger"><i class="fas fa-trash"></i> </a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#myTable').DataTable(
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


