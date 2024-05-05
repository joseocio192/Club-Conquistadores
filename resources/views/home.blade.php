<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('app.title')</title>
    @vite('resources/js/app.js')
</head>

<body>
     <h1>Club de Conquistadores</h1>
     <p>¡Bienvenido!</p>
     <p>Por favor, inicia sesión o regístrate para continuar.</p>
     <form action="{{ route('login') }}" method="GET">
          <button type="submit">Iniciar sesión</button>
     </form>
     <form action="{{ route('registerTutorLegal') }}" method="GET">
            <button type="submit">Registrar tutor legal</button>
     </form>
     <form action="{{ route('register') }}" method="GET">
          <button type="submit">Registrar conquistador</button>
     </form>
     @if($records->count())
         <h2>Records:</h2>
         <ul>
        @foreach($records as $record)
            <li>{{ $record->nombre . " " . $record->locale }}</li> <!-- Replace 'column1' with the actual column name -->
        @endforeach
         </ul>
     @else
         <p>No records found.</p>
     @endif
        <p>¡Gracias por visitarnos!</p>
     <!-- <div id="root"></div> -->
</body>

</html>
