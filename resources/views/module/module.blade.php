@extends('layouts.backend')


@section('content')




    <div class="card mt-3 m-2" style="">

<div align="center">
        <h5 class="card-header justify-content-between border-end d-inline-flex">
            Modulo de Configuracion
        </h5>

    @forelse($modules as $module)
    <a href="/module/{{$module->id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Editar</a>
    @empty
    @endforelse

</div>

        <div class="card-body">
            @forelse($modules as $module)

            <div align="center">
                    <img id="" class="profile-img-card" src="{{ asset($module->logo) }}" width="250">
            </div>

             <div align="center">
                 <h2>{{$module->nombre}}</h2>
             </div>

                <div class="row">
                    <h4>Nombre: {{$module->direccion}}</h4>
                    <h4>Poblacion: {{$module->poblacion}}</h4>
                    <h4>Codigo Postal: {{$module->codigopostal}}</h4>
                    <h4>Telefono: {{$module->telefono}}</h4>
                    <h4>Email: {{$module->email}}</h4>
                    <h4>CIF: {{$module->cif}}</h4>
                    <h4>RGPD: {!!$module->RGPD!!}</h4>
                    <h4>Observaciones: {!!$module->observaciones!!}</h4>
                </div>

            @empty
            @endforelse
        </div>
        <div class="card-footer">
            <div class="col-12" align="center">
                <a href="/client" class="btn btn-secondary" tabindex="5">Volver</a>
            </div>
        </div>
    </div>

@endsection
