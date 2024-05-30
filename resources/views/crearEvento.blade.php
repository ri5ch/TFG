<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Control Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">

    <style>

        footer a {
          text-decoration: none;
          color: inherit;
        }
    </style>
    
    <header>
    <!-- nabvar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand me-4" href="{{ route('eventocreate') }}">
          <span class="ms-3">+</span> 
        </a>
        <a class="navbar-brand d-flex align-items-center mx-auto" href="{{route('eventos')}}">
            <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" height="90" class="me-2" />
        </a>
        <div class="dropdown ms-2 me-3">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('adminUsers') }}">Users</a>
              <a class="dropdown-item" href="{{ route('panelAdmin') }}">PanelAdmin</a>
              <!-- Incluir el enlace de Logout aquí -->
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
        </div>
      </nav>
    </header>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">CREATE EVENT</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('eventostore')}}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group">
                                <label for="IDTipoEvento">Tipo of Evemt</label>
                                <select name="IDTipoEvento" id="IDTipoEvento" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($tipoEvento as $tipo)
                                        <option value="{{ $tipo->IDTipoEvento }}">{{ $tipo->Nombre }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="Nombre">Name :</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="Fecha">Date:</label>
                                <input type="date" name="Fecha" id="Fecha" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="Ubicacion">Location:</label>
                                <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="HoraInicio">Start Time:</label>
                                <input type="time" name="HoraInicio" id="HoraInicio" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="HoraFin">End Time:</label>
                                <input type="time" name="HoraFin" id="HoraFin" class="form-control" required>
                            </div>
                            
    
                            <div class="form-group">
                                <label for="Descripcion">Description:</label>
                                <textarea name="Descripcion" id="Descripcion" class="form-control" rows="4" required></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="Imagen">Image:</label>
                                <input type="file" name="Imagen" id="Imagen" class="form-control-file" required>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
