<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body class="text-center">

<div class="container">
    <div class="row">
        <div class="col-md-offset-4" style="margin-top:20px;">
            <h1>Registro de usuario</h1>
            <hr class="mb-4" align="center">
            <form action="{{route('register-user')}}" method="post">

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                @csrf

                <div class="form-group mb-2">
                    <input type="text" class="form-controller" placeholder="Inserte el usuario" name="name" value="{{old('name')}}"><br>
                    <span class="text-danger">@error('name') {{$message}}@enderror</span>
                </div>


                <div class="form-group">
                    <input type="text" class="form-controller" placeholder="Inserte la contraseña" name="password" value="{{old('password')}}"><br>
                    <span class="text-danger">@error('password') {{$message}}@enderror</span>
                </div><br>

                <div class="form-group">

                    <button class="btn btn-block btn-primary" type="submit">Registrarse</button>

                </div>

                <br>
                <a href="login">Ya esta registrado? Inicie Sesion!</a>

            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
