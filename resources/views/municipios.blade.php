<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <div class="container">
        <h1>Select Location</h1>

        <form>
            <div class="form-group">
                <label for="pais">Pais</label>
                <select id="pais" class="form-control">
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" class="form-control">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="municipio">Municipio</label>
                <select id="municipio" class="form-control">
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <select id="ciudad" class="form-control">
                    @foreach($ciudades as $ciudad)
                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<script type="text/javascript">
    $('#pais').change(function(){
        var paisID = $(this).val();
        if(paisID){
            $.ajax({
                url: "{{url('api/get-state-list')}}?pais_id="+paisID,
                type: "GET",
                success: function(res) {
                    if(res) {
                        $('#estado').empty();
                        $('#estado').append('<option>Seleccionar</option>');
                        $.each(res,function(key,value){
                            $('#estado').append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $('#estado').empty();
                    }
                }
            });
        }else{
            $("#estado").empty();
        }
        // Clear the municipality and city dropdowns
        $("#municipio").empty();
        $("#ciudad").empty();
    });

    $('#estado').change(function(){
        var estadoID = $(this).val();
        if(estadoID){
            $.ajax({
                url: "{{url('api/get-municipality-list')}}?estado_id="+estadoID,
                type: "GET",
                success: function(res) {
                    if(res) {
                        $('#municipio').empty();
                        $('#municipio').append('<option>Seleccionar</option>');
                        $.each(res,function(key,value){
                            $('#municipio').append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $('#municipio').empty();
                    }
                }
            });
        }else{
            $("#municipio").empty();
        }
        // Clear the city dropdown
        $("#ciudad").empty();
    });

    $('#municipio').change(function(){
        var municipioID = $(this).val();
        if(municipioID){
            $.ajax({
                url: "{{url('api/get-city-list')}}?municipio_id="+municipioID,
                type: "GET",
                success: function(res) {
                    if(res) {
                        $('#ciudad').empty();
                        $('#ciudad').append('<option>Seleccionar</option>');
                        $.each(res,function(key,value){
                            $('#ciudad').append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $('#ciudad').empty();
                    }
                }
            });
        }else{
            $("#ciudad").empty();
        }
    });
</script>
