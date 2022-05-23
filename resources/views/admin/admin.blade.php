@extends('layouts.backend')

@section('content')

    <div class="card mt-3 m-2">

    <h5 class="card-header justify-content-between border-end d-inline-flex">
        Usuarios
        <a href="admin/create" class="btn btn-primary"><i class="fas fa-plus"> Nuevo </i> </a>
    </h5>

        <div class="card-body">
    <table class="table table-striped mt-4" id="myTable">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                @if($user->role == 1)
                <td>Super Usuario</td>
                @else
                    <td>Usuario</td>
                @endif

                <td>
                    <form action="/admin/{{$user->id}}" method="POST">

                        <div class="btn-group" role="group">
                        <a href="/admin/{{$user->id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                        </div>
                        <!--<button type="submit" class="btn btn-danger">Borrar</button>-->
                    </form>
                </td>

            </tr>
        @endforeach
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
