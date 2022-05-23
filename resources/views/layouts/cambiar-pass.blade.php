@extends('layouts.backend')

@section('content')

    <h2 align="center">Cambiar Contraseña</h2>

    <form action="/pass-edit" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label" style="">Ingrese una nueva contraseña</label>
            <input id="password" name="password" type="text" class="form-control" value="" tabindex="1">
            <span class="text-danger">@error('password') {{$message}}@enderror</span>
        </div>

<div align="center">
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        <a href="/client" class="btn btn-secondary" tabindex="5">Cancelar</a>
</div>

    </form>

@endsection
