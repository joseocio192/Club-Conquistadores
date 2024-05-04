
@section('content')
    <div class="container">
        <h1>Conquistador</h1>
        <!-- Add your conquistador content here -->
       @foreach ( $conquistadores as $conquistador )
            <h2>{{ $conquistador->nombre }}</h2>
            <p>{{ $conquistador->apellido }}</p>
            <p>{{ $conquistador->email }}</p>
            <p>{{ $conquistador->telefono }}</p>
            <p>{{ $conquistador->fecha_nacimiento }}</p>
            <p>{{ $conquistador->calle }}</p>
            <p>{{ $conquistador->numero_exterior }}</p>
            <p>{{ $conquistador->numero_interior }}</p>
            <p>{{ $conquistador->colonia }}</p>
            <p>{{ $conquistador->ciudad_id }}</p>
            <p>{{ $conquistador->codigo_postal }}</p>
            <p>{{ $conquistador->sexo }}</p>
        @endforeach
    </div>
@endsection
