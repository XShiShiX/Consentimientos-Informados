
@extends('layouts.backend')

@section('content')


    <div class="card mt-3 m-2 mb-4">

        <h3 class="card-header mb-4" align="center">¿Esta seguro que desea eliminar el consentimiento seleccionado?</h3><br>

        <form action="/consent/{{$consents->id}}" method="POST">

            <div class="card-footer" align="center">
                <form action="/consent/{{$consents->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="/consent" class="btn btn-secondary" tabindex="5">Cancelar</a>
                </form>
            </div>
        </form>
    </div>

@endsection
