<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
</style>
<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
<form class="FormLayout" method="POST" action="{{ route('register') }}" id="registro">
    @csrf
    <h1>@lang('app.registration')</h1>
    <h2>@lang('app.personal_data_of_a_executive')</h2>
    <div class='RegistroDiv'>
        <div class='SeccionDiv1'>
            <h1>@lang('app.register')</h1>
            <h2>@lang('app.personal_data_of_a_executive')</h2>
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
                <label for="email">@lang('app.email')</label>
                <input id="email" type="email" name="email" required><br>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="password">@lang('app.password')</label>
                    <input id="password" type="password" name="password" required><br>
                </div>

                <div>
                    <label for="telefono">@lang('app.phone')</label>
                    <input id="telefono" type="text" name="telefono"><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="fecha_nacimiento">@lang('app.birthdate')</label>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required><br>
                </div>

                <div>
                    <label for="sexo">@lang('app.sex')</label>
                    <select id="sexo" name="sexo" required><br>
                        <option value="">@lang('app.select a gender')</option>
                        <option value="Hombre">@lang('app.man')</option>
                        <option value="Mujer">@lang('app.woman')</option>
                        <option value="Otro">@lang('app.other')</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='SeccionDiv2'>
            <h2 class='DatosH2'>@lang('app.personal_data_of_An_executive')</h2>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="calle">@lang('app.street')</label>
                    <input id="calle" type="text" name="calle" required><br>
                </div>

                <div>
                    <label for="numero_exterior">@lang('app.street_number')</label>
                    <input id="numero_exterior" type="text" name="numero_exterior" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="numero_interior">@lang('app.suite_number')</label>
                    <input id="numero_interior" type="text" name="numero_interior"><br>
                </div>

                <div>
                    <label for="colonia">@lang('app.neighborhood')</label>
                    <input id="colonia" type="text" name="colonia" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="PaisDiv">
                    <label for="pais">@lang('app.country')</label>
                    <select id="pais">
                        <option value="">@lang('app.select_a_country')</option>
                    </select>
                </div>

                <div>
                    <label for="estado">@lang('app.state')</label>
                    <select id="estado"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="MunicipioDiv">
                    <label for="municipio">@lang('app.municipality')</label>
                    <select id="municipio"></select>
                </div>

                <div>
                    <label for="ciudad_id">@lang('app.city')</label>
                    <select id="ciudad_id" name="ciudad_id"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="ClubesDiv">
                    <label for="clubes">@lang('app.clubs')</label>
                    <select id="clubes" name="clubes"></select>
                </div>

                <div>
                    <label for="codigo_postal">@lang('app.postal_Code')</label>
                    <input id="codigo_postal" type="text" name="codigo_postal" required><br>
                </div>
            </div>
            <div class="SubSeccionDiv">
                <div>
                    <label for="jefe_id">@lang('app.bossId')</label>
                    <input id="jefe_id" type="text" name="jefe_id">
                </div>

                <div class="ClubesDiv">
                    <label>@lang('app.role')</label>
                    <select name="rol" id="rol">
                        <option id="rol" value="director">@lang('app.executive')</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="ButtonsDiv">
            <div>
                <a class="HomeBtn" id="home-button" onclick="window.history.go(-1); return false;">
                    @lang('app.back')
                </a>
            </div>

            <div>
                <button class="RegisterBtn" type="submit" id="submit-button" disabled>
                    @lang('app.sign_in')
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
