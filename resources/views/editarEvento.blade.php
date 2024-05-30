<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Edit</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .container {
            margin-top: 50px;
            max-width: 900px;
            animation: fadeIn 1s ease-in-out;
        }
        .table {
            animation: slideIn 0.8s ease-in-out;
        }
        .btn-primary, .btn-danger {
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover, .btn-danger:hover {
            transform: scale(1.05);
        }
        .navbar-brand img {
            transition: transform 0.3s;
        }
        .navbar-brand img:hover {
            transform: scale(1.1);
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand me-4" href="{{ route('eventocreate') }}">
            <span class="ms-3">+</span>
        </a>
        <a class="navbar-brand d-flex align-items-center mx-auto" href="{{ route('eventos') }}">
            <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" height="90" class="me-2" />
        </a>
        <div class="dropdown ms-2 me-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('adminUsers') }}">Users</a>
                <a class="dropdown-item" href="{{ route('panelAdmin') }}">Admin Panel</a>
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url()->previous() }}" class="back-button"><i class="fas fa-arrow-left"></i> Volver</a>
            <div class="card">
                <div class="card-header">Editar Evento</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('eventoupdate', $evento->IDEvento) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="IDTipoEvento">Tipo de Evento:</label>
                            <select name="IDTipoEvento" id="IDTipoEvento" class="form-control" required>
                                <option value="">Seleccionar</option>
                                @foreach($tipoEvento as $tipo)
                                    <option value="{{ $tipo->IDTipoEvento }}" {{ $tipo->IDTipoEvento == $evento->IDTipoEvento ? 'selected' : '' }}>{{ $tipo->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Nombre">Nombre del Evento:</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $evento->Nombre }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Fecha">Fecha:</label>
                            <input type="date" name="Fecha" id="Fecha" class="form-control" value="{{ $evento->Fecha }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Ubicacion">Ubicación:</label>
                            <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" value="{{ $evento->Ubicacion }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Descripcion">Descripción:</label>
                            <textarea name="Descripcion" id="Descripcion" class="form-control" rows="4" required>{{ $evento->Descripcion }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Imagen">Imagen:</label>
                            <input type="file" name="Imagen" id="Imagen" class="form-control-file">
                            @if($evento->Imagen)
                                <img src="{{ asset('storage/imagenes/' . $evento->Imagen) }}" alt="{{ $evento->Nombre }}" width="100" class="mt-2">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Evento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
