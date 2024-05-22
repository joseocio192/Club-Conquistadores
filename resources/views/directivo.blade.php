<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <link href="{{ asset('/css/director.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="sidenav">
        <a href="{{route('directivo')}}">Home</a>
        <a href="{{route('directivo.club',$club->id)}}">{{$club->nombre}}</a>
        @if ($user->directivo->ciudad_id != null)
        <a href="{{route('directivo.stats',$club->id)}}">Estadisticas</a>
        @endif
        @if ($user->directivo->ciudad_id != null)
        <a href="{{route('directivo.crearclubview')}}">Crear club</a>
        @endif
        <a href="{{route('directivo.altaDirectivo')}}">Dar de alta a directivo</a>
        <a href="{{route('directivo.altaInstructor')}}">Alta a instructor</a>
        <form action="/logout" method="get">
            <button type="submit">Cerrar sesion</button>
        </form>
    </div>
    <div class="main">
        <h1 class="text-center">Directivo: {{ $user->name }}</h1>

        @if ($status == 'nada')
        <h2>{{$user->name}}</h2>
        @endif

        @if ($status == 'club')
        <h2>Director del club: {{$club->director->user->name}}</h2>
        <h2>Cantidad de conquistadores: {{$cantidad}}</h2>
        <h2>Cantidad de instructores: {{$club->instructores->count()}}</h2>
        <h2>Añadir instructor</h2>
        <form action="{{route('directivo.addInstructor')}}" method="post">
            @csrf
            <input type="text" name="instructor_id" placeholder="id del instructor">
            <input type="text" name="club_id" value="{{$club->id}}" hidden>
            <button type="submit">Añadir</button>
        </form>
        <h2>Instructores disponibles</h2>
        @foreach ($instructores as $i)
        <h2>$i->user->name</h2>
        @endforeach
        <a href="{{route('registerInstructor')}}"> Registar a instructor</a>
        @endif

        @if ($status == 'ciudad')
        <h2>Clubes de {{$ciudad->nombre}}</h2>
        @foreach ($clubes as $c)
        <a href="{{route('directivo.club',$c->id)}}">{{$c->nombre}}</a>
        @endforeach

        <h2>Cantidad total de conquistadores en la ciudad: {{$totalConquistadores}}</h2>
        @foreach ($clubes as $c)
        <h5>{{$c->nombre}}: {{$c->users->where('rol','conquistador')->count()}}</h5>
        @endforeach
        @endif

        @if ($status == 'crearclub')
        <h2>Crear club</h2>
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
            <button type="submit">Crear</button>
        </form>
        @if ($user->directivo->pais_id != null)
        <h2>Crear Pais</h2>
        <form action="{{route('location.pais.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del pais">
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">Crear</button>
        </form>
        @endif
        @if ($user->directivo->estado_id != null || $user->directivo->pais_id != null)
        <h2>Crear Estado</h2>
        <form action="{{route('location.estado.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del estado">
            <select id="pais" name="pais">
                @foreach($pais as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endforeach
            </select>
            <input type="text" name="locale" placeholder="locale">
            <button type="submit">Crear</button>
        </form>
        @endif
        @if ($user->directivo->municipio_id != null || $user->directivo->estado_id != null || $user->directivo->pais_id != null)

        <h2>Crear Municipio</h2>
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
            <button type="submit">Crear</button>
        </form>
        @endif
        @if ($user->directivo->ciudad_id != null || $user->directivo->municipio_id != null || $user->directivo->estado_id != null || $user->directivo->pais_id != null)
        <h2>Crear ciudad</h2>
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
            <button type="submit">Crear</button>
        </form>
        @endif
        <h2>Crear especialidad</h2>
        <form action="{{route('especialidad.add')}}" method="post">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre de la especialidad">
            <input type="text" name="locale" placeholder="Locale">
            <button type="submit">Crear</button>
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
                    $('#pais').append('<option>Seleccionar</option>');
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
                        $('#estado').append('<option>Seleccionar</option>');
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
                        $('#municipio').append('<option>Seleccionar</option>');
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
                        $('#ciudad_id').append('<option>Seleccionar</option>');
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
                        $('#clubes').append('<option>Select</option>');
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
