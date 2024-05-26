<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('/css/conquistador.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
</head>

<body>
    <div class="sidenav">
        <h1>Conquistador: {{ $conquistador->user->nombreCompleto }}</h1>
        <a href={{ route('conquistador') }}>
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
            </svg>
            Tus Datos
        </a>
        @foreach ($clasesConquistador as $clases)
            <a href="{{ route('conquistador.clases', $clases->id) }}">
                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path class="st0"
                                d="M81.44,116.972c23.206,0,42.007-18.817,42.007-42.008c0-23.215-18.801-42.016-42.007-42.016 c-23.216,0-42.016,18.801-42.016,42.016C39.424,98.155,58.224,116.972,81.44,116.972z" />
                            <path class="st0"
                                d="M224.166,245.037c0-0.856-0.142-1.673-0.251-2.498l62.748-45.541c3.942-2.867,4.83-8.411,1.963-12.362 c-1.664-2.285-4.342-3.652-7.17-3.652c-1.877,0-3.667,0.589-5.191,1.689l-62.874,45.636c-2.341-1.068-4.909-1.704-7.65-1.704 h-34.178l-8.294-47.222c-4.555-23.811-14.112-42.51-34.468-42.51h-86.3C22.146,136.873,0,159.019,0,179.383v141.203 c0,10.178,8.246,18.432,18.424,18.432c5.011,0,0,0,12.864,0l7.005,120.424c0,10.83,8.788,19.61,19.618,19.61 c8.12,0,28.398,0,39.228,0c10.83,0,19.61-8.78,19.61-19.61l9.204-238.53h0.463l5.27,23.269c1.744,11.097,11.293,19.28,22.524,19.28 h51.534C215.92,263.461,224.166,255.215,224.166,245.037z M68.026,218.861v-67.123h24.126v67.123l-12.817,15.118L68.026,218.861z" />
                            <polygon class="st0"
                                points="190.326,47.47 190.326,200.869 214.452,200.869 214.452,71.595 487.874,71.595 487.874,302.131 214.452,302.131 214.452,273.113 190.326,273.113 190.326,326.256 512,326.256 512,47.47 " />
                            <path class="st0"
                                d="M311.81,388.597c0-18.801-15.235-34.029-34.028-34.029c-18.801,0-34.036,15.228-34.036,34.029 c0,18.785,15.235,34.028,34.036,34.028C296.574,422.625,311.81,407.381,311.81,388.597z" />
                            <path class="st0"
                                d="M277.781,440.853c-24.259,0-44.866,15.919-52.782,38.199h105.565 C322.648,456.771,302.04,440.853,277.781,440.853z" />
                            <path class="st0"
                                d="M458.573,388.597c0-18.801-15.235-34.029-34.028-34.029c-18.801,0-34.036,15.228-34.036,34.029 c0,18.785,15.235,34.028,34.036,34.028C443.338,422.625,458.573,407.381,458.573,388.597z" />
                            <path class="st0"
                                d="M424.545,440.853c-24.259,0-44.866,15.919-52.783,38.199h105.565 C469.411,456.771,448.804,440.853,424.545,440.853z" />
                        </g>
                    </g>
                </svg>
                {{ $clases->nombre }}
            </a>
        @endforeach
        <form action="/logout" method="get">
            @csrf
            <button class="my-button-loggout" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="main">
        <ul>
            @if ($status == 'nada')
                <div class="divTusDatos">
                    <div class="boxTusDatos">
                        <h2>Tus datos</h2>
                    </div>
                    <div class="boxTusDatos">
                        <svg class="svgPerson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                        <h3>Nombre: </h3>
                        <h3 class="h3Dato">{{ $conquistador->user->nombreCompleto }}
                        </h3>
                        <h3>Edad: </h3>
                        <h3 class="h3Dato">{{ $conquistador->user->edad }}</h3>
                    </div>
                    <div class="boxTusDatos">
                        <h3>Fecha de nacimiento: </h3>
                        <h3 class="h3Dato">{{ $conquistador->user->fecha_nacimiento }}</h3>
                    </div>
                    <div class="boxTusDatos">
                        <h3>Telefono: </h3>
                        <h3 class="h3Dato">{{ $conquistador->user->telefono }}</h3>
                    </div>
                    <div class="boxTusDatos">
                        <h3>Correo: </h3>
                        <h3 class="h3Dato">{{ $conquistador->user->email }}</h3>
                    </div>
                    <div class="boxTusDatos">
                        <h3>Direccion: </h3>
                        <h3 class="h3Dato">
                            {{ $conquistador->user->direccion }}
                        </h3>
                    </div>
                </div>
            @endif
            @if ($status == 'clase')
                <div class="divClase">
                    <h1>Clase: {{ $clase->nombre }}</h1>
                    <table>
                        <thead>
                            <tr>
                                @foreach ($tareas as $tarea)
                                    <th>
                                        <a href="/conquistador/tarea/{{ $tarea->id }}">{{ $tarea->nombre }}</a>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($conquistador->tareas as $tareaa)
                                    <td>
                                        @if ($tareaa->clase_id === $clase->id)
                                            {{ Log::info($tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador . '-' . $tareaa->pivot->completada) }}
                                            <input onclick="return false;" type="checkbox"
                                                name="{{ $tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador }}"
                                                value="1" @if ($tareaa->pivot->completada == 1) checked @endif>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
            @if ($status == 'Mostar Tarea')
                <h2>Id: {{ $tarea->id }}</h2>
                <h2>{{ $tarea->nombre }}</h2>
                <h3>{{ $tarea->descripcion }}</h3>
                <h3>{{ $tarea->fecha }}</h3>
            @endif

        </ul>
    </div>
</body>

</html>
