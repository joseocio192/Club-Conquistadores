<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
<form class="FormLayout" method="POST" action="{{ route('registerInstructor') }}" id="registro">
    @csrf

    <h1>Registro</h1>
    <h2>Datos personales Instructor</h2>
    <div class='RegistroDiv'>
        <div class='SeccionDiv1'>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" required autofocus><br>
                </div>

                <div>
                    <label for="apellido">Apellido</label>
                    <input id="apellido" type="text" name="apellido" class="Input" required><br>
                </div>
            </div>

            <div class='EmailDiv'>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required><br>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required><br>
                </div>

                <div>
                    <label for="telefono">Telefono</label>
                    <input id="telefono" type="text" name="telefono"><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required><br>
                </div>

                <div>
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" required><br>
                        <option value="">Select a gender</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
        </div>
        <h2 class='DatosH2'>Datos residencia de Instructor</h2>
        <div class='SeccionDiv2'>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="calle">Calle</label>
                    <input id="calle" type="text" name="calle" required><br>
                </div>

                <div>
                    <label for="numero_exterior">Numero Exterior</label>
                    <input id="numero_exterior" type="text" name="numero_exterior" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="numero_interior">Numero Interior</label>
                    <input id="numero_interior" type="text" name="numero_interior"><br>
                </div>

                <div>
                    <label for="colonia">Colonia</label>
                    <input id="colonia" type="text" name="colonia" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="PaisDiv">
                    <label for="pais">Pais</label>
                    <select id="pais">
                        <option value="">Select a country</option>
                    </select>
                </div>

                <div>
                    <label for="estado">Estado</label>
                    <select id="estado"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="MunicipioDiv">
                    <label for="municipio">Municipio</label>
                    <select id="municipio"></select>
                </div>

                <div>
                    <label for="ciudad_id">Ciudad</label>
                    <select id="ciudad_id" name="ciudad_id"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="ClubesDiv">
                    <label for="clubes">Clubes</label>
                    <select id="clubes" name="clubes"></select>
                </div>

                <div>
                    <label for="codigo_postal">Codigo Postal</label>
                    <input id="codigo_postal" type="text" name="codigo_postal" required><br>
                </div>
            </div>
        </div>

        <div class="ButtonsDiv">

            <div>
                <a class="HomeBtn" id="home-button" onclick="window.history.go(-1); return false;">
                    Volver
                </a>
            </div>

            <div>
                <button class="RegisterBtn" type="submit" id="submit-button" disabled>
                    Registrarse
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
