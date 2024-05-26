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
        <h1 class="text-center">@lang('app.title')</h1>
        <p class="text-center">@lang('app.welcome')</p>
        <p class="text-center">@lang('app.sign_in_or_register_home')</p>
        <form action="{{ route('login') }}" method="GET">
            <button type="submit" class="btn btn-primary">@lang('app-login')</button>
        </form>
        <form action="{{ route('registerTutorLegal') }}" method="GET">
            <button type="submit" class="btn btn-primary">@lang('app.register_legal_guardian')</button>
        </form>
        <form action="{{ route('register') }}" method="GET">
            <button type="submit" class="btn btn-primary">@lang('app.register_Pathfinder')</button>
        </form>
        <p class="text-center">@lang('app.thank_you_message_for_visit')</p>
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
