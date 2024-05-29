<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
<form class="FormLayout" method="POST" action="{{ route('register') }}" id="registro">
    @csrf

    <h1>@lang('app.registration')</h1>
    <h2>@lang('app.personal_data_of_a_executive')</h2>
    <div class='RegistroDiv'>
        <div class='SeccionDiv1'>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="name">@lang('app.name')</label>
                    <input id="name" type="text" name="name" required autofocus><br>
                </div>

                <div>
                    <label for="apellido">@lang('app.lastName')</label>
                    <input id="apellido" type="text" name="apellido" class="Input" required><br>
                </div>
            </div>

            <div class='EmailDiv'>
                <label for="email">@lang('app.Email')</label>
                <input id="email" type="email" name="email" required><br>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="password">@lang('app.Password')</label>
                    <input id="password" type="password" name="password" required><br>
                </div>

                <div>
                    <label for="telefono">@lang('app.Phone')</label>
                    <input id="telefono" type="text" name="telefono"><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="fecha_nacimiento">@lang('app.Birthdate')</label>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required><br>
                </div>

                <div>
                    <label for="sexo">@lang('app.Sex')</label>
                    <select id="sexo" name="sexo" required><br>
                        <option value="">@lang('app.Select a gender')</option>
                        <option value="Hombre">@lang('app.Men')</option>
                        <option value="Mujer">@lang('app.Woman')</option>
                        <option value="Otro">@lang('app.Other')</option>
                    </select>
                </div>
            </div>
        </div>
        <h2 class='DatosH2'>@lang('app.Personal_data_of_An_executive')</h2>
        <div class='SeccionDiv2'>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="calle">@lang('app.Street')</label>
                    <input id="calle" type="text" name="calle" required><br>
                </div>

                <div>
                    <label for="numero_exterior">@lang('app.Street_number')</label>
                    <input id="numero_exterior" type="text" name="numero_exterior" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="numero_interior">@lang('app.Suite_number')</label>
                    <input id="numero_interior" type="text" name="numero_interior"><br>
                </div>

                <div>
                    <label for="colonia">@lang('app.Neighborhood')</label>
                    <input id="colonia" type="text" name="colonia" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="PaisDiv">
                    <label for="pais">@lang('app.Country')</label>
                    <select id="pais">
                        <option value="">@lang('app.Select_a_country')</option>
                    </select>
                </div>

                <div>
                    <label for="estado">@lang('app.State')</label>
                    <select id="estado"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="MunicipioDiv">
                    <label for="municipio">@lang('app.municipality')</label>
                    <select id="municipio"></select>
                </div>

                <div>
                    <label for="ciudad_id">@lang('app.City')</label>
                    <select id="ciudad_id" name="ciudad_id"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="ClubesDiv">
                    <label for="clubes">@lang('app.Clubs')</label>
                    <select id="clubes" name="clubes"></select>
                </div>

                <div>
                    <label for="codigo_postal">@lang('app.Postal_Code')</label>
                    <input id="codigo_postal" type="text" name="codigo_postal" required><br>
                </div>
            </div>
            <div class="SubSeccionDiv">
                <div class="ClubesDiv">
                    <label for="jefe_id">@lang('app.BossId')</label>
                    <input id="jefe_id" type="text" name="jefe_id">
                </div>

                <div class="rol">
                    <label>@lang('app.Role')</label>
                    <select name="rol" id="rol">
                        <option id="rol" value="director">@lang('app.Executive')</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="ButtonsDiv">

            <div>
                <a class="HomeBtn" id="home-button" onclick="window.history.go(-1); return false;">
                    @lang('app.Back')
                </a>
            </div>

            <div>
                <button class="RegisterBtn" type="submit" id="submit-button" disabled>
                    @lang('app.Sign_in')
                </button>
            </div>
        </div>
    </div>

</form>

<script type="text/javascript">
    $(document).ready(function() {
        console.log("Hola");
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
