

@extends('layouts.backend')

@section('content')

<div class="card mt-3 m-2">

    <h3 class="card-header" align="center">Create User</h3>

    <div class="card-body">

    <form action="/admin" method="POST">

        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" tabindex="1">
            <span class="text-danger">@error('name') {{$message}}@enderror</span>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input id="password" name="password" type="text" class="form-control" tabindex="1">
            <span class="text-danger">@error('password') {{$message}}@enderror</span>
        </div>

        <label for="" class="form-label">Rol</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="role" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Super Usuario
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="role" checked value="">
            <label class="form-check-label" for="flexRadioDefault2">
                Usuario
            </label>
        </div>

        <div class="card-footer">
        <div align="center">
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        <a href="/admin" class="btn btn-secondary" tabindex="5">Cancelar</a>
        </div>
        </div>
    </form>
</div>
</div>



@endsection
