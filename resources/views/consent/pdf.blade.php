<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        /**
            Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
            puede ser de altura y anchura completas.
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Defina ahora los márgenes reales de cada página en el PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Definir las reglas del encabezado **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Estilos extra personales **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 0.75cm;
        }

        /** Definir las reglas del pie de página **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Estilos extra personales **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consentimiento</title>

</head>
<body>

<form action="/consent-pdf/{{$consents->id}}" method="POST" enctype="multipart/form-data">
@forelse($modules as $module)
    <!-- Define header and footer blocks before your content -->
    <header>
        <div>
            <img id="" class="profile-img-card" src="" alt="">
        </div>

        <h2>{{$module->nombre}}</h2><br>

    </header>

    <footer>

            Tel:{{$module->telefono}}
            Web:http://intranet.consentimientosinformado.com
            Email:{{$module->email}}
    </footer>


    <!-- Wrap the content of your PDF inside a main tag -->
    <br><main>
        <label>{{$module->cif}}</label><br>
        <label>{{$module->direccion}}</label><br>
        <label>{{$module->poblacion}}</label><br><br>
        <h2 align="center">
            @foreach($treatments as $treatment)
                @if($consents->documentotratamiento == $treatment->id)
                    {!!$treatment->nombre!!}
                @endif
            @endforeach
        </h2>
        {!! $module->RGPD !!}
        @foreach($treatments as $treatment)
            @if($consents->documentotratamiento == $treatment->id)
                {!!$treatment->texto!!}
            @endif
        @endforeach
        <div align="center">
            <h2>Firma del cliente</h2>
            <img src="{{$consents->firma}}" width="380">
        </div>
        <!--<p style="page-break-after: always;">
Consent
        </p>
        <p style="page-break-after: revert;">

        </p>-->

    </main>

</form>
</body>


@empty
@endforelse
</html>
