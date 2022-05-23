@extends('layouts.backend')

@section('content')




   <div class="card mt-3 m-2" style="">

       <h5 class="card-header justify-content-between border-end d-inline-flex">
           Tratamientos
           <a href="treatment/create" class="btn btn-primary "><i class="fas fa-plus"> Nuevo</i> </a>
       </h5>

<div class="card-body">

    <table class="table table-striped mt-4" id="myTable1">
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
        @foreach($treatments as $treatment)
            <tr>


                <td>{{$treatment->id}}</td>
                <td>{{$treatment->nombre}}</td>
                <td>{{$treatment->usuariocreador}}</td>
                <td>{{$treatment->fechacreacion}}</td>
                <td>{{$treatment->ultimocreador}}</td>
                <td>{{$treatment->fechamodificacion}}</td>


                <td>
                    <form action="/treatment/{{$treatment->id}}" method="POST">

                        <div class="btn-group" role="group">

                            <a href="/treatment-show/{{$treatment->id}}" class="btn btn-info"><i class="fas fa-eye"></i> </a>
                            <a href="/treatment/{{$treatment->id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> </a>


                        @csrf
                        @method('DELETE')
                        <textarea value="{{$var = 0}}" style="display: none"></textarea>
                       @forelse($consents as $consent)
                       @if($treatment->id == $consent->documentotratamiento)
                           <textarea value="{{$var = $var+1}}" style="display: none"></textarea>
                            @endif
                        @empty
                        @endforelse

                        @if($var < 1)
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        @else
                            <button type="button" class="btn btn-secondary" data-bs-toggle="" data-bs-target="#exampleModal" disabled>
                                <i class="fas fa-trash"></i>
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" align="center"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                <h5 align="center">No se pueden eliminar tratamientos que posean un consentimiento firmado</h5>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
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
           $('#myTable1').DataTable(
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
