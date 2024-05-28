<!DOCTYPE html>
<html>

<head>

    <title>Tutor</title>
    <link href="{{ asset('/css/tutor.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <a href="{{route('tutor.show', $pupilo->id)}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"/>
                </svg>
                {{$pupilo->user->name}}
            </a>
        @endforeach
        <form class="formLogOut" action="/logout" method="get">
            @csrf
            <button class="my-button-loggout" type="submit">Log out</button>
        </form>
    </div>

    <div class="main">
        <ul>
            @if ($status == 'nada')
            <div class="divAceptarPupilos">
                @if (count($pupilosSinAceptar) == 0)
                <h1>No hay pupilos por aceptar</h1>
                @else
                <h1>Pupilos por aceptar</h1>
                @foreach ($pupilosSinAceptar as $pupilo)
                    <div class="divPupilo">
                        <h2>{{$pupilo->user->name}}</h2>
                        <form action="{{route('tutor.aceptar', $pupilo->id)}}" method="post">
                            @csrf
                            <button type="submit">Aceptar</button>
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="divAceptarPupilos">
                <h2>Codigos</h2>
                @foreach ($codigos as $codigo)
                <h3>{{$codigo->onecode}}</h3>
                @endforeach
                <form action="{{route('tutor.generateOneTimeCode')}}" method="post">
                    @csrf
                    <button type="submit">Generar codigo</button>
                </form>
            </div>
            @endif
            @if ($status == 'show')
            <div class="divDatos">
                <h2>Datos del pupilo:</h2>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                    </svg>
                    <h3>Id: {{$hijo->user->id}}</h3>
                    <h3>Nombre: {{$hijo->user->name}} {{$hijo->user->apellido}}</h3>
                    <h3>Edad: {{$hijo->user->edad}}</h3>
                </div>
                <h3>Telefono: {{$hijo->user->telefono}}</h3>
                <h3>Fecha de nacimiento: {{$hijo->user->fecha_nacimiento}}</h3>
                <h3>Direccion:
                    {{ $hijo->user->colonia . ' ' .
                    $hijo->user->calle . ' ' .
                    $hijo->user->numero_exterior }}
                </h3>
            </div>
            @endif
        </ul>
    </div>
    @if ($errors->any())
    <script>
        let errorsExist = true;
        let title_error = "{{ __('app.error_title') }}";
        let error = "{{ __('app.error_message') }}";
        let button = "{{ __('app.accept_error') }}";
        let errorList =
            '@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach';

        if (errorsExist) {
            Swal.fire({
                icon: 'error',
                title: title_error,
                text: error,
                confirmButtonText: button,
                footer: '<ul>' + errorList + '</ul>'
            });
        }
    </script>
@endif
</body>


</html>
