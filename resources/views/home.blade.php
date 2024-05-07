<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('app.title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .btn {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Club de Conquistadores</h1>
        <p class="text-center">¡Bienvenido!</p>
        <p class="text-center">Por favor, inicia sesión o regístrate para continuar.</p>
        <form action="{{ route('login') }}" method="GET">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
        <form action="{{ route('registerTutorLegal') }}" method="GET">
            <button type="submit" class="btn btn-primary">Registrar tutor legal</button>
        </form>
        <form action="{{ route('register') }}" method="GET">
            <button type="submit" class="btn btn-primary">Registrar conquistador</button>
        </form>
        <p class="text-center">¡Gracias por visitarnos!</p>
    </div>
</body>
</html>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Upss...',
            text: 'Algo salio mal!',
            footer: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
        })
    </script>
@endif
