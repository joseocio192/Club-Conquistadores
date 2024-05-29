<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('app.instructor')</title>
    <link href="{{ asset('/css/instructor.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fontawesome.com/v5/icons/chevron-circle-down?f=classic&s=solid">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!--************************************ Sidebar ************************************-->
    <div class="sidenav">
        <h1 class="text-center">@lang('app.instructor') {{ $user->name }}</h1>
        <a href="{{ route('instructor.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
            </svg>
            @lang('app.your_data')
        </a>
        <a href="{{ route('instructor.crear') }}">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
            </svg>
            @lang('app.manage_class')
        </a>
        <!--Ojo las variables dentro de los foreach NO SON LOCALES -->
        @foreach ($clasesDeInstructor as $clases)
            <a href="{{ route('instructor.clases', $clases->id) }}">
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
            <button class="my-button-loggout" type="submit">@lang('app.log_out')</button>
        </form>
    </div>

    <div class="main">
        <!--************************************ Clases ************************************-->
        @if ($status == 'clase')
            {{ Log::info($clase) }}
            <div class="divTareasAsis">
                <h2>{{ $clase->nombre }}</h2>
                <!--************************************ Tabla Tareas ************************************-->
                <h3>@lang('app.tasks')</h3>
                    <form action={{ route('instructor.sendhw') }} method="post">
                        @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th>@lang('app.name')</th>
                                    @if ($tareas->count() == 0)
                                        <th>@lang('app.there_are_no_tasks')</th>
                                    @else
                                    @foreach ($tareas as $tarea)
                                        <th>
                                            <a href="/instructor/tarea/{{ $tarea->id }}">{{ $tarea->nombre }}</a>
                                        </th>
                                    @endforeach
                                    @endif
                                </tr>
                            </thead>
                            @foreach ($conquistadores as $conquistador)
                                <tr>
                                    <td>
                                        <a href="/instructor/conquistador/{{ $conquistador->user->id }}">{{ $conquistador->user->name }}</a>
                                    </td>
                                    @foreach ($conquistador->tareas as $tareaa)
                                        <td class="tdTareas">
                                            @if ($tareaa->clase_id === $clase->id)
                                                {{ Log::info($tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador . '-' . $tareaa->pivot->completada) }}
                                                <input type="checkbox"
                                                    name="{{ $tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador }}"
                                                    value="1" @if ($tareaa->pivot->completada == 1) checked @endif>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <button class="btnEnviar" type="submit">@lang('app.send')</button>
                    </form>

                    <!--************************************ Tabla Asistencia ************************************-->
                    <h3>@lang('app.assitence')</h3>
                    <form action="{{ route('instructor.definer') }}" method="post">
                        @csrf
                        <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                        <div class="divTablaAsis">
                            <table>
                                <thead>
                                    <tr>
                                        <th>@lang('app.name')</th>
                                        @if ($asistencias->count() == 0)
                                            <th>@lang('app.there_are_no_assists')</th>
                                        @else
                                            @foreach ($conquistador->asistencia as $asistencia)
                                            <th>{{ $asistencia->fecha }}</th>
                                            @endforeach
                                        @endif
                                        <th class="thBtnDia">
                                            <button class="btnDia" type="submit" name="adddia">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M416 208H272V64c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V304h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z"/>
                                                </svg>
                                            </button>
                                            <button class="btnDia" type="submit" name="deleteDia">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M416 208H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z"/>
                                                </svg>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($conquistadores as $conquistador)
                                    <tr>
                                        @if ($asistencias->count() == 0)
                                            <th>@lang('app.there_are_no_assists')</th>
                                        @else
                                            <td>{{ $conquistador->user->name }}</td>
                                            @foreach ($conquistador->asistencia as $asistencia)
                                                @if ($asistencia->id_clase === $clase->id)
                                                        <td class="tdAsistencia">
                                                            <input type="checkbox"
                                                                name="asistencia_{{ $asistencia->pivot->id_asistencia . '-' . $asistencia->pivot->id_conquistador }}"
                                                                value="1" @if ($asistencia->pivot->asistio == 1) checked @endif/>
                                                            <select class="selectPulcritud"
                                                                name="pulcritud_{{ $asistencia->pivot->id_asistencia . '-' . $asistencia->pivot->id_conquistador }}">
                                                                <option value="1"
                                                                    @if ($asistencia->pivot->pulcritud == 1) selected @endif>1</option>
                                                                <option value="2"
                                                                    @if ($asistencia->pivot->pulcritud == 2) selected @endif>2</option>
                                                                <option value="3"
                                                                    @if ($asistencia->pivot->pulcritud == 3) selected @endif>3</option>
                                                                <option value="4"
                                                                    @if ($asistencia->pivot->pulcritud == 4) selected @endif>4</option>
                                                                <option value="5"
                                                                    @if ($asistencia->pivot->pulcritud == 5) selected @endif>5</option>
                                                            </select>
                                                        </td>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <button class="btnEnviar" type="submit" name="save">@lang('app.send')</button>
                    </form>

        <!--************************************ Añadir Alumnos ************************************-->
        <h3 class="h3AddAlumno">@lang('app.add_students_to_class')</h3>
        <form class="frmAlmTar" action="{{ route('instructor.anadirAlumnos') }}" method="post">
            @csrf
            <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
            @lang('app.students_id')
            <input type="text" name="alumnos" placeholder="(Separados por comas)">
            <button class="my-button" type="submit">@lang('app.add')</button>
        </form>

        <!--************************************ Eliminar Alumnos ************************************-->
        <h3>@lang('app.remove_students_from_class')</h3>
        <form class="frmAlmTar" action="{{ route('instructor.eliminarAlumnos') }}" method="post">
            @csrf
            <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
            @lang('app.students_id')
            <input type="text" name="alumnos" placeholder="(Separados por comas)">
            <button class="my-button" type="submit">@lang('app.delete')</button>
        </form>

        <!--************************************ Crear Tarea ************************************-->
        <h3>@lang('app.create_task')</h3>
        <form class="frmAlmTar" action="{{ route('instructor.crearTarea') }}" method="post">
            @csrf
            <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
            @lang('app.name')
            <input type="text" name="nombre">
            @lang('app.description')
            <input type="text" name="descripcion">
            @lang('app.due_date')
            <input type="date" name="fecha">
            <button class="my-button" type="submit">@lang('app.create')</button>
        </form>
        <!--************************************ Modificar Tarea ************************************-->
        <h3>@lang('app.modify_task')</h3>
        <form class="frmAlmTar" action="{{ route('instructor.modificarTarea') }}" method="post">
            @csrf
            <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
            @lang('app.id_:')
            <input type="text" name="tarea_id">
            @lang('app.name')
            <input type="text" name="nombre">
            @lang('app.description')
            <input type="text" name="descripcion" placeholder="Descripcion de la tarea">
            @lang('app.due_date')
            <input type="date" name="fecha" placeholder="Fecha de la tarea">
            <button class="btnModTar" type="submit">@lang('app.modify')</button>
        </form>
    </div>
    @endif

    <!-- SI estamos en la ruta instructor.clases mostrar estudiantes de dicha clase -->
    <!--************************************ Gestionar clases ************************************-->
    @if ($status == 'crear')
        <div class="divGestionarClases">
            <form action="{{ route('instructor.crear') }}" method="post">
                @csrf
                <div class="divCrearClase">
                    <h3> @lang('app.create_class')</h3>
                    <div>
                        @lang('app.class_name')
                        <input type="text" name="nombre">
                    </div>
                    <div>
                        @lang('app.minimum_age')
                        <input type="number" name="edadMinima">
                    </div>
                    <div>
                        @lang('app.color')
                        <input type="text" name="color">
                    </div>
                    <div>
                        @lang('app.logo')
                        <input type="text" name="logo">
                    </div>
                    <div>
                        @lang('app.entry_time')
                        <input type="time" name="horario">
                    </div>
                    <div>
                        @lang('app.exit_time')
                        <input type="time" name="horario2">
                    </div>
                    <button class="btnCrearClase" type="submit">@lang('app.create')</button>
                </div>

            </form>
            <div class="divEliminarClase">
                <form action="{{ route('instructor.eliminarClase') }}" method="post">
                    <h3> @lang('app.delete_class') </h3>
                    <div>
                        @lang('app.class_id')
                        <input type="text" name="clase_id">
                    </div>

                </form>
                <button class="btnEliminarClase" type="submit">@lang('app.delete')</button>
            </div>
            @csrf
        </div>
    @endif
    <!--************************************ Mostrar tarea ************************************-->
    @if ($status == 'Mostar Tarea')
        <div class="divMostrarTarea">
            <h2>{{ $tarea->nombre }}</h2>
            <h2>@lang('app.task_id') {{ $tarea->id }}</h2>
            <h3 class="h3Descripcion">@lang('app.description') {{ $tarea->descripcion }}</h3>
            <h3>@lang('app.due_date') {{ $tarea->fecha }}</h3>
            <h2 class="h2ModificarTarea">@lang('app.modify_task')</h2>
            <form action="{{ route('instructor.modificarTarea') }}" method="post">
                @csrf
                <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">
                <div>
                    @lang('app.class_name')
                    <input type="text" name="nombre">
                    @lang('app.description')
                    <textarea name="descripcion" maxlength="450"> </textarea>
                    @lang('app.due_date')
                    <input type="date" name="fecha">
                </div>
                <button class="my-button" type="submit">@lang('app.modify')</button>
            </form>
        </div>
    @endif

    <!--************************************ Mostar Conquistador ************************************-->
    @if ($status == 'Mostar Conquistador')
        <div class="divTusDatos">
            <div class="divDatos">
                <h2>@lang('app.pathfinder_id') {{ $conquistador->user->id }}</h2>
            </div>
            <div class="divDatos">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                </svg>
                <h3>@lang('app.name') </h3>
                <h3 class="h3Dato">{{ $conquistador->user->name }}</h3>
                <h3>@lang('app.age') </h3>
                <h3 class="h3Dato">{{ $conquistador->edad }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.phone') </h3>
                <h3 class="h3Dato">{{ $conquistador->user->telefono }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.email') </h3>
                <h3 class="h3Dato">{{ $conquistador->user->email }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.address') </h3>
                <h3 class="h3Dato">
                    {{ $conquistador->tutorLegal->colonia .
                        ' ' .
                        $conquistador->tutorLegal->calle .
                        ' ' .
                        $conquistador->tutorLegal->numero_exterior }}
                </h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.legal_guardian') </h3>
                <h3 class="h3Dato">{{ $conquistador->tutorLegal->name . ' ' . $conquistador->tutorLegal->apellido }}
                </h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.guardian_phone') </h3>
                <h3 class="h3Dato">{{ $conquistador->tutorLegal->telefono }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.guardian_email') </h3>
                <h3 class="h3Dato">{{ $conquistador->tutorLegal->email }}</h3>
            </div>
        </div>
    @endif
    <!--************************************ Mostar Datos ************************************-->
    @if ($status == 'nada')
        <div class="divTusDatos">
            <div class="divDatos">
                <h2>@lang('app.your_data')</h2>
            </div>
            <div class="divDatos">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                </svg>
                <h3>@lang('app.name')</h3>
                <h3 class="h3Dato">{{ $user->name }}</h3>
                <h3>@lang('app.age')</h3>
                <h3 class="h3Dato">{{ $user->edad }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.phone')</h3>
                <h3 class="h3Dato"> {{ $user->telefono }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.email') </h3>
                <h3 class="h3Dato">{{ $user->email }}</h3>
            </div>
            <div class="divDatos">
                <h3>@lang('app.address')</h3>
                <h3 class="h3Dato">{{ $user->colonia . ' ' . $user->calle . ' ' . $user->numero_exterior }}</h3>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
    </div>

</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

        var chk = $('input[type="checkbox"]');
        chk.each(function() {
            var v = $(this).attr('checked') == 'checked' ? 1 : 0;
            $(this).after('<input type="hidden" name="' + $(this).attr('name') + '" value="' + v +
                '" />');
        });

        chk.change(function() {
            var v = $(this).is(':checked') ? 1 : 0;
            $(this).next('input[type="hidden"]').val(v);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var select = document.querySelectorAll('select');

        var sel = $('select');
        sel.each(function() {
            var v = $(this).val();
            $(this).after('<input type="hidden" name="' + $(this).attr('name') + '" value="' + v +
                '" />');
        });

        sel.change(function() {
            var v = $(this).val();
            $(this).next('input[type="hidden"]').val(v);
        });
    });

    document.getElementById('my-form').addEventListener('submit', function(event) {
        var horario1 = document.getElementById('horario1').value;
        var horario2 = document.getElementById('horario2').value;
        document.getElementById('horario1').value = horario1 + '-' + horario2;
    });
</script>
