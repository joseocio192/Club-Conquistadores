<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('app.instructor')</title>
    <link href="{{ asset('/css/director.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="sidenav">
        <h1 class="text-center">@lang('app.directive') {{ $user->name }}</h1>
        <a href="{{route('directivo')}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M280.4 148.3L96 300.1V464a16 16 0 0 0 16 16l112.1-.3a16 16 0 0 0 15.9-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.6a16 16 0 0 0 16 16.1L464 480a16 16 0 0 0 16-16V300L295.7 148.3a12.2 12.2 0 0 0 -15.3 0zM571.6 251.5L488 182.6V44.1a12 12 0 0 0 -12-12h-56a12 12 0 0 0 -12 12v72.6L318.5 43a48 48 0 0 0 -61 0L4.3 251.5a12 12 0 0 0 -1.6 16.9l25.5 31A12 12 0 0 0 45.2 301l235.2-193.7a12.2 12.2 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0 -1.7-16.9z"/>
            </svg>
            @lang('app.home')</a>
        <a href="{{route('directivo.club',$club->id)}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M335.5 4l288 160c15.4 8.6 21 28.1 12.4 43.5s-28.1 21-43.5 12.4L320 68.6 47.5 220c-15.4 8.6-34.9 3-43.5-12.4s-3-34.9 12.4-43.5L304.5 4c9.7-5.4 21.4-5.4 31.1 0zM320 160a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM144 256a40 40 0 1 1 0 80 40 40 0 1 1 0-80zm312 40a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM226.9 491.4L200 441.5V480c0 17.7-14.3 32-32 32H120c-17.7 0-32-14.3-32-32V441.5L61.1 491.4c-6.3 11.7-20.8 16-32.5 9.8s-16-20.8-9.8-32.5l37.9-70.3c15.3-28.5 45.1-46.3 77.5-46.3h19.5c16.3 0 31.9 4.5 45.4 12.6l33.6-62.3c15.3-28.5 45.1-46.3 77.5-46.3h19.5c32.4 0 62.1 17.8 77.5 46.3l33.6 62.3c13.5-8.1 29.1-12.6 45.4-12.6h19.5c32.4 0 62.1 17.8 77.5 46.3l37.9 70.3c6.3 11.7 1.9 26.2-9.8 32.5s-26.2 1.9-32.5-9.8L552 441.5V480c0 17.7-14.3 32-32 32H472c-17.7 0-32-14.3-32-32V441.5l-26.9 49.9c-6.3 11.7-20.8 16-32.5 9.8s-16-20.8-9.8-32.5l36.3-67.5c-1.7-1.7-3.2-3.6-4.3-5.8L376 345.5V400c0 17.7-14.3 32-32 32H296c-17.7 0-32-14.3-32-32V345.5l-26.9 49.9c-1.2 2.2-2.6 4.1-4.3 5.8l36.3 67.5c6.3 11.7 1.9 26.2-9.8 32.5s-26.2 1.9-32.5-9.8z"/>
            </svg>
            {{$club->nombre}}</a>
        @if ($user->directivo->ciudad_id != null)
        <a href="{{route('directivo.stats',$club->id)}}">@lang('app.stadistics')</a>
        @endif
        @if ($user->directivo->ciudad_id != null)
        <a href="{{route('directivo.crearclubview')}}">@lang('app.create_club')</a>
        @endif
        <a href="{{route('directivo.altaDirectivo')}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
            </svg>
            @lang('app.sign_up_directive')</a>
        <a href="{{route('directivo.altaInstructor')}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
            </svg>
            @lang('app.sign_up_instructor')</a>
        <form action="/logout" method="get">
            <button class="my-button-loggout" type="submit">@lang('app.log_out')</button>
        </form>
    </div>

    <div class="main">
        <!--******************************* Card Datos *******************************-->
        @if ($status == 'nada')
        <div class="divDatos">
            <h2>Tus Datos</h2>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                </svg>
                <h3>Id: {{$user->id}}</h3>
                <h3>Nombre: {{$user->name}} {{$user->apellido}}</h3>
                <h3>Edad: {{$user->edad}}</h3>
            </div>
            <h3>Telefono: {{$user->telefono}}</h3>
            <h3>Fecha de nacimiento: {{$user->fecha_nacimiento}}</h3>
            <h3>Direccion:
                {{ $user->colonia . ' ' .
                $user->calle . ' ' .
                $user->numero_exterior }}
            </h3>
        </div>
        @endif

        @if ($status == 'club')
        <div class="divClub">
            <h2>{{$club->nombre}}</h2>
            <div class="divDatosClub"> 
                <h3>@lang('app.club_director'): {{$club->director->user->name}}</h3>
                <h3>@lang('app.pathfinders_quantity'): {{$cantidad}}</h3>
            </div>
            <div class="divDatosClub">
                <h3>@lang('app.instructors_quantity'): {{$club->instructores->count()}}</h3>
                <h3>@lang('add.add_instructor')</h2>
            </div>
            <form class="frmAddInstructor" action="{{route('directivo.addInstructor')}}" method="post">
                @csrf
                <div>
                    <h3>ID del Instructor:</h3>
                    <input class="inputIDInstructor" type="text" name="instructor_id">
                    <input type="text" name="club_id" value="{{$club->id}}" hidden>
                </div>
                <button type="submit">@lang('app.add')</button>
            </form>
            <h2 class="h2InstructoresDisponibles">@lang('app.instructors_avaible')</h2>
            @foreach ($instructores as $i)
            <h3>$i->user->name</h3>
            @endforeach
            <a class="btnRegisterInstructor" href="{{route('registerInstructor')}}"> @lang('app.instructor_register')</a>
            <div class="divTable">
                <h2 class="h2ConqPorMes">Conquistadores por mes</h2>
                <table>
                    <tr>
                        <th>Club</th>
                        @foreach ($fechas as $fecha)
                        <th>{{$fecha->fecha}}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{$club->nombre}}</td>
                        @foreach ($fechas as $f)
                        <th>{{$f->cantidad}}</th>
                        @endforeach
                    </tr>
                </table>
            </div>
            @endif
        </div>
        

        @if ($status == 'ciudad')
        <h2>@lang('app.clubs') {{$ciudad->nombre}}</h2>
        @foreach ($clubes as $c)
        <a href="{{route('directivo.club',$c->id)}}">{{$c->nombre}}</a>
        @endforeach

        <h2>@lang('app.total_number_of_pathfinders_in_the_city') {{$totalConquistadores}}</h2>
        @foreach ($clubes as $c)
        <h5>{{$c->nombre}}: {{$c->users->where('rol','conquistador')->count()}}</h5>
        @endforeach

        <h2>Cantidad de conquistadores por mes por club</h2>
        @foreach ($clubes as $cl)

        <table>
            <tr>
                <th>Club</th>
                @foreach ($cl->numbers as $fecha)
                <th>{{$fecha->fecha}}</th>
                @endforeach
            </tr>
            <tr>
                <td>{{$cl->nombre}}</td>
                @foreach ($cl->numbers as $f)
                <th>{{$f->cantidad}}</th>
                @endforeach
            </tr>
        </table>

        @endforeach
        @endif

        @if ($status == 'crearclub')
        <h2>@lang('app.create_club')</h2>
        <form action="{{route('directivo.crearclub')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del club">
            <input type="text" name="directivo_id" placeholder="directivo id">
            <select id="especialidad" name="especialidad">
                @foreach ($especialidad as $e)
                <option value="{{$e->id}}">{{$e->nombre}}</option>
                @endforeach
            </select>
            <input type="text" name="calle" placeholder="calle">
            <input type="text" name="numero_exterior" placeholder="numero exterior">
            <input type="text" name="numero_interior" placeholder="numero interior">
            <input type="text" name="colonia" placeholder="colonia">
            <input type="text" name="lema" placeholder="lema">
            <input type="text" name="logo" placeholder="logo">
            <select id="pais" name="pais"></select>
            <select id="estado" name="estado"></select>
            <select id="municipio" name="municipio"></select>
            <select id="ciudad_id" name="ciudad"></select>
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">@lang('app.craete')</button>
        </form>
        @if ($user->directivo->pais_id != null)
        <h2>@lang('app.create_country')</h2>
        <form action="{{route('location.pais.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del pais">
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">@lang('app.craete')</button>
        </form>
        @endif
        @if ($user->directivo->estado_id != null || $user->directivo->pais_id != null)
        <h2>@lang('app.create_state')</h2>
        <form action="{{route('location.estado.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del estado">
            <select id="pais" name="pais">
                @foreach($pais as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endforeach
            </select>
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">@lang('app.craete')</button>
        </form>
        @endif
        @if ($user->directivo->municipio_id != null || $user->directivo->estado_id != null || $user->directivo->pais_id != null)

        <h2>@lang('app.create_municipality')</h2>
        <form action="{{route('location.municipio.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del municipio">
            <select id="pais" name="pais">
                @foreach($pais as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endforeach
            </select>

            <select id="estado" name="estado">
            </select>
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">@lang('app.craete')</button>
        </form>
        @endif
        @if ($user->directivo->ciudad_id != null || $user->directivo->municipio_id != null || $user->directivo->estado_id != null || $user->directivo->pais_id != null)
        <h2>@lang('app.create_city')</h2>
        <form action="{{route('location.ciudad.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre de la ciudad">
            <select id="pais" name="pais">
                @foreach($pais as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endforeach
            </select>
            <select id="estado" name="estado">
                <option>{{$ciudad->municipio->estado->nombre}}</option>
            </select>
            <select id="municipio" name="municipio">
                <option value="{{$ciudad->municipio->id}}">{{$ciudad->municipio->id}}</option>
            </select>
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">@lang('app.craete')</button>
        </form>
        @endif
        <h2>@lang('app.create_speciality')</h2>
        <form action="{{route('especialidad.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre de la especialidad">
            <input type="text" name="locale" placeholder="Locale">
            <button type="submit">@lang('app.craete')</button>
        </form>
        @endif
    </div>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('api/get-pais-list') }}",
            type: "GET",
            success: function(res) {
                if (res) {
                    $('#pais').empty();
                    $('#pais').append('<option>{{__("app.Seleccionar")}}</option>');
                    $.each(res, function(key, value) {
                        $('#pais').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                } else {
                    $('#pais').empty();
                }
            }
        });
    });

    $('#pais').change(function() {
        var paisID = $(this).val();
        if (paisID) {
            $.ajax({
                url: "{{ url('api/get-state-list') }}?pais_id=" + paisID,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#estado').empty();
                        $('#estado').append('<option>{{__("app.Seleccionar")}}</option>');
                        $.each(res, function(key, value) {
                            $('#estado').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $('#estado').empty();
                    }
                }
            });
        } else {
            $("#estado").empty();
        }
        // Clear the municipality and city dropdowns
        $("#municipio").empty();
        $("#ciudad_id").empty();
        $("#clubes").empty();
    });

    $('#estado').change(function() {
        var estadoID = $(this).val();
        if (estadoID) {
            $.ajax({
                url: "{{ url('api/get-municipality-list') }}?estado_id=" + estadoID,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#municipio').empty();
                        $('#municipio').append('<option>{{__("app.Seleccionar")}}</option>');
                        $.each(res, function(key, value) {
                            $('#municipio').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $('#municipio').empty();
                    }
                }
            });
        } else {
            $("#municipio").empty();
        }
        // Clear the city dropdown
        $("#ciudad_id").empty();
        $("#clubes").empty();
    });

    $('#municipio').change(function() {
        var municipioID = $(this).val();
        if (municipioID) {
            $.ajax({
                url: "{{ url('api/get-city-list') }}?municipio_id=" + municipioID,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#ciudad_id').empty();
                        $('#ciudad_id').append('<option>{{__("app.Seleccionar")}}</option>');
                        $.each(res, function(key, value) {
                            $('#ciudad_id').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $('#ciudad_id').empty();
                    }
                }
            });
        } else {
            $("#ciudad_id").empty();
            $("#clubes").empty();
        }
    });

    $('#ciudad_id').change(function() {
        var ciudad_id = $(this).val();
        if (ciudad_id) {
            $.ajax({
                url: "{{ url('api/get-club-list') }}?ciudad_id=" + ciudad_id,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#clubes').empty();
                        $('#clubes').append('<option>{{__("app.Seleccionar")}}</option>');
                        $.each(res, function(key, value) {
                            $('#clubes').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                }
            });
        } else {
            $("#clubes").empty();
        }
    });

    $('#clubes').change(function() {
        var ciudad_id = $(this).val();
        if (ciudad_id) {
            $('#submit-button').prop('disabled', false);
        } else {
            $("#submit-button").prop('disabled', true);
        }
    });
</script>
