<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #28272C;
        }

        .card {
            transition: all 0.3s ease;
            height: 100%;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-5px);
            background-color: #51606d;
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card-body {
            height: 100%;
        }

        h1 {
            color: aliceblue;
        }

        .dropdown-menu a {
            white-space: nowrap;
            font-size: 14px; /* Ajusta el tamaño de la fuente */
        }

        .dropdown-toggle::after {
            margin-left: 0.5rem; /* Espacio entre el texto y el ícono de la flecha */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand me-4" href="{{ route('eventocreate') }}">
            <span class="ms-3">+</span>
        </a>
        <a class="navbar-brand d-flex align-items-center mx-auto" href="{{ route('eventos') }}">
            <img src="imagenes/logo1.png" alt="Logo" height="90" class="me-2" />
        </a>
        <div class="dropdown ms-2 me-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('adminUsers')}}">Users</a>
                <a class="dropdown-item" href="{{'panelAdmin'}}">Admin Panel</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="mb-4">Event List</h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if ($eventos->isEmpty())
        <div class="alert alert-info">No hay eventos disponibles.</div>
        @else
        <div class="row">
            @foreach ($eventos as $evento)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/imagenes/' . $evento->Imagen) }}" class="card-img-top" alt="{{ $evento->Nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $evento->Nombre }}</h5>
                        <p class="card-text">{{ $evento->Descripcion }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $evento->Fecha }}</p>
                        <p class="card-text"><strong>Location:</strong> {{ $evento->Ubicacion }}</p>
                        <a href="{{ route('eventoedit', ['id' => $evento->IDEvento]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('eventodestroy', ['id' => $evento->IDEvento]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
