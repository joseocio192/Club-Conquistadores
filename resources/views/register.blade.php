<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
    body {
        font-family: Arial, sans-serif;
    }

    form {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form label {
        display: block;
        margin-top: 10px;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="password"],
    form input[type="date"],
    form select {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    form button[type="submit"]:hover {
        background-color: #0056b3;
    }

    form button[disabled] {
        background-color: #ccc;
        cursor: not-allowed;
    }

    form button[disabled]:hover {
        background-color: #ccc;
    }
</style>

<form method="POST" action="{{ route('register') }}" id="registro">
    @csrf

    <h1>Registro</h1>

    <label for="name">Nombre</label>
    <input id="name" type="text" name="name" required autofocus><br>

    <label for="apellido">Apellido</label>
    <input id="apellido" type="text" name="apellido" required><br>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" required><br>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required><br>

    <label for="telefono">Telefono</label>
    <input id="telefono" type="text" name="telefono"><br>

    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required><br>

    <label for="calle">Calle</label>
    <input id="calle" type="text" name="calle" required><br>

    <label for="numero_exterior">Numero Exterior</label>
    <input id="numero_exterior" type="text" name="numero_exterior" required><br>

    <label for="numero_interior">Numero Interior</label>
    <input id="numero_interior" type="text" name="numero_interior"><br>

    <label for="colonia">Colonia</label>
    <input id="colonia" type="text" name="colonia" required><br>
    <label for="pais">Pais</label>
    <select id="pais">
        <option value="">Select a country</option>
    </select>

    <label for="estado">Estado</label>
    <select id="estado"></select>

    <label for="municipio">Municipio</label>
    <select id="municipio"></select>

    <label for="ciudad_id">ciudad</label>
    <select id="ciudad_id" name="ciudad_id"></select>

    <label for="clubes">Clubes</label>
    <select id="clubes" name="clubes"></select>

    <label for="codigo_postal">Codigo Postal</label>
    <input id="codigo_postal" type="text" name="codigo_postal" required><br>

    <label for="sexo">Sexo</label>
    <select id="sexo" name="sexo" required><br>
        <option value="">Select a gender</option>
        <option value="Hombre">Hombre</option>
        <option value="Mujer">Mujer</option>
        <option value="Otro">Otro</option>
    </select>

    <label for="tutorLegal_id">Tutor id</label>
    <input id="tutorLegal_id" type="text" name="tutorLegal_id" required><br>
    <button type="submit" class="btn btn-primary" id="submit-button" disabled>
        registrarse
    </button>

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
