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
        <a href="{{route('directivo')}}">@lang('app.home')</a>
        <a href="{{route('directivo.club',$club->id)}}">{{$club->nombre}}</a>
        @if ($user->directivo->ciudad_id != null)
        <a href="{{route('directivo.stats',$club->id)}}">@lang('app.stadistics')</a>
        @endif
        @if ($user->directivo->ciudad_id != null)
        <a href="{{route('directivo.crearclubview')}}">@lang('app.create_club')</a>
        @endif
        <a href="{{route('directivo.altaDirectivo')}}">@lang('app.sign_up_directive')</a>
        <a href="{{route('directivo.altaInstructor')}}">@lang('app.sign_up_instructor')</a>
        <form action="/logout" method="get">
            <button type="submit">@lang('app.log_out')</button>
        </form>
    </div>
    <div class="main">
        <h1 class="text-center">@lang('app.directive') {{ $user->name }}</h1>

        @if ($status == 'nada')
        <h2>{{$user->name}}</h2>
        @endif

        @if ($status == 'club')
        <h2>@lang('app.club_director') {{$club->director->user->name}}</h2>
        <h2>@lang('app.pathfinders_quantity') {{$cantidad}}</h2>
        <h2>@lang('app.instructors_quantity') {{$club->instructores->count()}}</h2>
        <h2>@lang('add.add_instructor')</h2>
        <form action="{{route('directivo.addInstructor')}}" method="post">
            @csrf
            <input type="text" name="instructor_id" placeholder="id del instructor">
            <input type="text" name="club_id" value="{{$club->id}}" hidden>
            <button type="submit">@lang('app.add')</button>
        </form>
        <h2>@lang('app.instructors_avaible')</h2>
        @foreach ($instructores as $i)
        <h2>$i->user->name</h2>
        @endforeach
        <a href="{{route('registerInstructor')}}"> @lang('app.instructor_register')</a>
        <h2>Conquistadores por mes</h2>
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
        @endif

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
                    $('#pais').append('<option>{{__("app.select")}}</option>');
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
                        $('#estado').append('<option>{{__("app.select")}}</option>');
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
                        $('#municipio').append('<option>{{__("app.select")}}</option>');
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
                        $('#ciudad_id').append('<option>{{__("app.select")}}</option>');
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
                        $('#clubes').append('<option>{{__("app.select")}}</option>');
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
