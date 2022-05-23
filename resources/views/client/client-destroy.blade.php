
@extends('layouts.backend')

@section('content')



    <form action="/client-destroy/{{$client->id}}" method="POST">

        <h1>Esta seguro que desea eliminar el cliente seleccionado</h1>

<div>

                    @foreach($consents as $consent)
                        @if($consent->cliente == $client->id)
<label>Consentimiento {{$consent->id}}</label>
                        <table class="table table-primary table-striped mt-4">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tratamiento</th>
                            </tr>

                            <td>{{ $client->nombrecompleto }}</td>
                            @foreach($treatments as $treatment)
                                @if($consent->documentotratamiento == $treatment->id)
                            <td>{{ $treatment->nombre }}</td>
                            @endif
                            @endforeach
                            </thead>
                        </table>
                        @endif

                    @endforeach
</div>


<div align="center">
        <form action="/client-destroy/{{$client->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="/client" class="btn btn-secondary" tabindex="5">Cancelar</a>
        </form>
</div>

@endsection
