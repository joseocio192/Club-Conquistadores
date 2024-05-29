@extends('layouts.app')
<!-- resources/views/register.blade.php -->
<!DOCTYPE html>

<head>
    <title>@lang('app.registration')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('/css/register.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
</head>

<body>

    <form class="FormLayout" method="POST" action="{{ route('register') }}" id="registro">
        @csrf

        <h1>@lang ('app.Register')</h1>
        <h2>@lang('app.Conquerors_personal_data')</h2>
        <div class='RegistroDiv'>
            <div class='SeccionDiv1'>
                <div class='SubSeccionDiv'>
                    <div>
                        <label for="name">@lang('app.Name')</label>
                        <input id="name" type="text" name="name" required autofocus
                            value="{{ old('name') }}"><br>
                    </div>

                    <div>
                        <label for="apellido">@lang('app.lastName')</label>
                        <input id="apellido" type="text" name="apellido" class="Input"
                            value="{{ old('apellido') }}" required><br>
                    </div>
                </div>

                <div class='EmailDiv'>
                    <label for="email">@lang('app.Email')</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required><br>
                </div>

                <div class='SubSeccionDiv'>
                    <div>

                        <label for="password">@lang('app.Password')</label>
                        <input id="password" type="password" name="password" value="{{ old('password') }}"
                            required><br>
                    </div>

                    <div>
                        <label for="telefono">@lang('app.Phone')</label>
                        <input id="telefono" type="text" name="telefono" value="{{ old('telefono') }}"><br>

                    </div>
                </div>

                <div class='SubSeccionDiv'>
                    <div>

                        <label for="fecha_nacimiento">@lang('app.Birthdate')</label>
                        <input id="fecha_nacimiento" type="date" name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento') }}" required><br>

                    </div>

                    <div>
                        <label for="sexo">@lang('app.Sex')</label>
                        <select id="sexo" name="sexo" required>
                            <option value="">{{ __('app.Select_a_gender') }}</option>
                            <option value="{{ __('app.man') }}" {{ old('sexo') == __('app.man') ? 'selected' : '' }}>
                                {{ __('app.man') }}
                            </option>
                            <option value="{{ __('app.women') }}"
                                {{ old('sexo') == __('app.women') ? 'selected' : '' }}>
                                {{ __('app.women') }}
                            </option>
                            <option value="{{ __('app.Other') }}"
                                {{ old('sexo') == __('app.Other') ? 'selected' : '' }}>
                                {{ __('app.Other') }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <h2 class='DatosH2'>@lang('app.Details_of_the_conqueror_residence')</h2>
            <div class='SeccionDiv2'>
                <div class='SubSeccionDiv'>
                    <div>

                        <label for="calle">@lang('app.Street')</label>
                        <input id="calle" type="text" name="calle" value="{{ old('calle') }}" required><br>
                    </div>

                    <div>
                        <label for="numero_exterior"> @lang('app.street_number')</label>
                        <input id="numero_exterior" type="text" name="numero_exterior"
                            value="{{ old('numero_exterior') }}" required><br>

                    </div>
                </div>

                <div class='SubSeccionDiv'>
                    <div>
                        <label for="numero_interior">@lang('app.Suite_number')</label>
                        <input id="numero_interior" type="text" name="numero_interior"
                            value="{{ old('numero_interior') }}"><br>
                    </div>

                    <div>
                        <label for="colonia">@lang('app.Neighborhood')</label>
                        <input id="colonia" type="text" name="colonia" value="{{ old('colonia') }}" required><br>

                    </div>
                </div>

                <div class='SubSeccionDiv'>
                    <div class="PaisDiv">
                        <label for="pais">@lang('app.Country')</label>
                        <select id="pais" name="pais">
                            <option value="">@lang('app.Select_a_country')</option>
                        </select>
                    </div>

                    <div>
                        <label for="estado">@lang('app.State')</label>
                        <select id="estado" name="estado"></select>
                    </div>
                </div>

                <div class='SubSeccionDiv'>
                    <div class="MunicipioDiv">
                        <label for="municipio">@lang('app.Municipality')</label>
                        <select id="municipio" name="municipio"></select>
                    </div>

                    <div>
                        <label for="ciudad_id">@lang('app.City')</label>
                        <select id="ciudad_id" name="ciudad"></select>
                    </div>
                </div>

                <div class='SubSeccionDiv'>
                    <div class="ClubesDiv">
                        <label for="clubes">@lang('app.Clubs')</label>
                        <select id="clubes" name="clubes"></select>
                    </div>

                    <div>
                        <label for="codigo_postal"> @lang('app.postal_code')</label>
                        <input id="codigo_postal" type="text" name="codigo_postal"
                            value="{{ old('codigo_postal') }}" required><br>

                    </div>
                </div>
            </div>

            {{-- <input type="hidden" name="status" value="{{ $status }}"> --}}

            @if ($status == 'tutor')
                <label for="tutorLegal_id">@lang('app.onecode')</label>
                <input id="tutorLegal_id" type="text" name="onecode" required
                    value="{{ $onecode->onecode }}"><br>
                <input type="hidden" name="autorizado" value="1">
            @else
                <label for="tutorLegal_id">@lang('app.onecode')</label>
                <input id="tutorLegal_id" type="text" name="onecode" value="{{ old('onecode') }}" required><br>
                <input type="hidden" name="autorizado" value="0">
                <input type="hidden" name="rol" value="conquistador">
            @endif
            <div class="ButtonsDiv">
                <div>
                    <a class="HomeBtn" id="home-button" onclick="window.location.href = '/';">
                        @lang('app.Back')
                    </a>
                </div>

                <div>
                    <button class="RegisterBtn" type="submit" id="submit-button" disabled>
                        @lang('app.Sign_up')
                    </button>
                </div>
            </div>
        </div>
    </form>
    @section('content')
    @endsection
</body>
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
<script type="text/javascript">
    $(document).ready(function() {
        let oldPais = "{{ old('pais') }}";
        let oldEstado = "{{ old('estado') }}";
        let oldMunicipio = "{{ old('municipio') }}";
        let oldCiudad = "{{ old('ciudad') }}";
        let oldClub = "{{ old('clubes') }}";

        $.ajax({
            url: "{{ url('api/get-pais-list') }}",
            type: "GET",
            success: function(res) {
                if (res) {
                    $('#pais').empty();
                    $('#pais').append('<option>{{ __('app.select') }}</option>');
                    $.each(res, function(key, value) {
                        $('#pais').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                    if (oldPais) {
                        $('#pais').val(oldPais).change();
                    }
                } else {
                    $('#pais').empty();
                }
            }
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
                            $('#estado').append('<option value="">Seleccionar</option>');
                            $.each(res, function(key, value) {
                                $('#estado').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                            if (oldEstado) {
                                $('#estado').val(oldEstado).change();
                            }
                        } else {
                            $('#estado').empty();
                        }
                    }
                });
            } else {
                $("#estado").empty();
            }
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
                            $('#municipio').append('<option value="">Seleccionar</option>');
                            $.each(res, function(key, value) {
                                $('#municipio').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                            if (oldMunicipio) {
                                $('#municipio').val(oldMunicipio).change();
                            }
                        } else {
                            $('#municipio').empty();
                        }
                    }
                });
            } else {
                $("#municipio").empty();
            }
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
                            $('#ciudad_id').append('<option value="">Seleccionar</option>');
                            $.each(res, function(key, value) {
                                $('#ciudad_id').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                            if (oldCiudad) {
                                $('#ciudad_id').val(oldCiudad).change();
                            }
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
                            $('#clubes').append('<option value="">Seleccionar</option>');
                            $.each(res, function(key, value) {
                                $('#clubes').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                            if (oldClub) {
                                $('#clubes').val(oldClub).change();
                            }
                        }
                    }
                });
            } else {
                $("#clubes").empty();
            }
        });

        $('#clubes').change(function() {
            var clubID = $(this).val();
            if (clubID) {
                $('#submit-button').prop('disabled', false);
            } else {
                $("#submit-button").prop('disabled', true);
            }
        });
    });
</script>


</html>
