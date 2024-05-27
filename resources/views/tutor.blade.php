<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('/css/tutor.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
</head>

<body>
    <div class="sidenav">
        <h1 class="text-center">Tutor: {{$user->name}} </h1>
        <a href="{{route('tutor')}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M280.4 148.3L96 300.1V464a16 16 0 0 0 16 16l112.1-.3a16 16 0 0 0 15.9-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.6a16 16 0 0 0 16 16.1L464 480a16 16 0 0 0 16-16V300L295.7 148.3a12.2 12.2 0 0 0 -15.3 0zM571.6 251.5L488 182.6V44.1a12 12 0 0 0 -12-12h-56a12 12 0 0 0 -12 12v72.6L318.5 43a48 48 0 0 0 -61 0L4.3 251.5a12 12 0 0 0 -1.6 16.9l25.5 31A12 12 0 0 0 45.2 301l235.2-193.7a12.2 12.2 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0 -1.7-16.9z"/>
            </svg>
            Home</a>
        <a href="{{route('register.tutor', $user->id)}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
            </svg>
            Añadir pupilo</a>
        @foreach ($pupilos as $pupilo)
        <a href="{{route('tutor.show', $pupilo->id)}}">{{$pupilo->user->name}}</a>
        @endforeach
        <form class="formLogOut" action="/logout" method="get">
            @csrf
            <button class="my-button-loggout" type="submit">Log out</button>
        </form>
    </div>

    <div class="main">
        <ul>
            @if ($status == 'nada')
            <h1>Pupilos por aceptar</h1>

            @foreach ($pupilosSinAceptar as $pupilosn)
            <form action="{{ route('tutor.aceptar') }}" method="post">
                @csrf
                <h2>{{$pupilosn->user->name}}</h2>
                <input type="hidden" name="idpupilo" value="{{$pupilosn->id}}">
                <button type="submit">aceptar</button>
                <button type="submit">No aceptar</button>
            </form>
            @endforeach

            @endif
            @if ($status == 'show')
            <h2>sus datos:</h2>
            <h3>Id: {{$hijo->user->name}}</h3>
            <h3>Nombre: {{$hijo->user->name}} {{$hijo->user->apellido}}</h3>
            @endif
        </ul>
    </div>
</body>

</html>
