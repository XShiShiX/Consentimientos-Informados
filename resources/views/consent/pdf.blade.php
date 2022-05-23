<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="/consent-pdf/{{$consents->id}}" method="POST">


<div class="" align="center">

    <div>
        <label>Nombre del cliente:</label>
            @foreach($clients as $client)
                @if($consents->cliente == $client->id)
                {{$client->nombrecompleto}}
                @endif
            @endforeach
    </div><br>

    <div>
        <label>Texto del tratamiento:</label><br>
        @foreach($treatments as $treatment)
            @if($consents->documentotratamiento == $treatment->id)
                {!!$treatment->texto!!}
            @endif
        @endforeach
    </div>

<div>
    <h2>Firma del cliente</h2>
            <img src="{{$consents->firma}}" width="380">
</div>

</div>


</form>
</body>
</html>
