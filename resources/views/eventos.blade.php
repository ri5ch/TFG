<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/eventos.css">
  <style>
    body {
        background-color: #343a40; /* Color de fondo oscuro */
        color: #fff; /* Color del texto */
    }

    .black-line {
        height: 110px;
        background-color: #222; /* Color de la línea negra un poco menos oscuro */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .white-text {
        color: #fff; /* Color del texto blanco */
    }

    .img-fluid {
        max-width: 400px;
        max-height: 300px;
    }

    .relative {
        position: relative;
    }

    .flex {
        display: flex;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .mt-3 {
        margin-top: 1rem;
    }

    .flex-grow-0 {
        flex-grow: 0;
    }

    .cover {
        position: relative;
        background-size: contain;
        background-position: center;
    }

    .w-28 {
        width: 7rem;
    }

    .sm\:w-36 {
        width: 9rem;
    }

    .h-full {
        height: 100%;
    }

    .rounded-l-lg {
        border-radius: 0.3rem 0 0 0.3rem;
    }

    .-mb-1 {
        margin-bottom: -0.25rem;
    }

    .absolute {
        position: absolute;
    }

    .z-10 {
        z-index: 10;
    }

    .bg-cover {
        background-size: cover;
    }

    .bg-no-repeat {
        background-repeat: no-repeat;
    }

    .bg-center {
        background-position: center;
    }

    .z-20 {
        z-index: 20;
    }

    .bg-contain {
        background-size: contain;
    }

    .top-0 {
        top: 0;
    }

    .left-0 {
        left: 0;
    }

    .flex-grow {
        flex-grow: 1;
    }

    .p-3 {
        padding: 0.75rem;
    }

    .items-center {
        align-items: center;
    }

    .justify-start {
        justify-content: flex-start;
    }

    .gap-3 {
        gap: 0.75rem;
    }

    .flex-nowrap {
        flex-wrap: nowrap;
    }

    .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 400;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .rounded {
        border-radius: 0.25rem;
    }

    .text-xs {
        font-size: 0.75rem;
    }

    .sm\:text-sm {
        font-size: 0.875rem;
    }

    .mt-1 {
        margin-top: 0.25rem;
    }

    .sm\:mt-3 {
        margin-top: 0.75rem;
    }

    .font-semibold {
        font-weight: 600;
    }

    .text-xl {
        font-size: 1.25rem;
    }

    .sm\:text-2xl {
        font-size: 1.5rem;
    }

    .text-black {
        color: #000;
    }

    .text-white {
        color: #fff;
    }

    .badge-container {
        display: flex;
        gap: 0.25rem;
        flex-wrap: nowrap;
    }

    .custom-card {
        transition: all 0.3s ease;
        background-color: #fff; /* Color de fondo inicial */
        color: #000; /* Color de texto inicial */
    }

    .custom-card:hover {
        background-color: #6c757d; /* Cambiar a gris al pasar el ratón */
        color: #fff; /* Cambiar color de texto al blanco */
        z-index: 10; /* Aumentar z-index para estar por encima de las demás */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Añadir sombra */
        transform: translateY(-5px); /* Elevar ligeramente */
    }

    .custom-card:hover .cover {
        filter: grayscale(100%); /* Convertir la imagen a escala de grises */
    }
  </style>
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <a class="navbar-brand me-4" href="{{ route('eventocreate') }}">
      <span class="ms-3">+</span> 
    </a>
    <a class="navbar-brand d-flex align-items-center mx-auto" href="{{route('eventos')}}">
        <img src="imagenes/logo1.png" alt="Logo" height="90" class="me-2" />
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

  <div class="black-line ">
    <img src="https://i0.wp.com/salacopernico.es/wp-content/uploads/2023/07/entradas.png?fit=1200%2C400&amp;ssl=1" alt="Entradas" class="img-fluid">
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

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

  @if (session('logro'))
  <div class="d-flex justify-content-center align-items-center position-fixed top-50 start-50 translate-middle" style="z-index: 1050;">
    <div class="card text-white bg-dark" style="width: 18rem;">
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="this.parentElement.style.display='none';"></button>
        <img src="{{ session('logro')['imagen'] }}" class="card-img-top" alt="{{ session('logro')['nombre'] }}" style="height: 150px; object-fit: cover;">
        <div class="card-body text-center">
          <strong>¡CONGRATULATIONS!</strong> YOU HAVE ACHIEVED: {{ session('logro')['nombre'] }} <br> 
          {{ session('logro')['descripcion'] }} <br>
      </div>
    </div>
  </div>
  @endif
  
  <div class="container mt-5">
    @foreach ($eventos as $evento)
    <div class="relative d-flex transition-all hover:shadow-lg shadow-white cursor-pointer bg-white text-black hover:bg-black/70 rounded-lg mt-3 custom-card">
      <div class="flex-grow-0">
        <div class="cover w-28 sm:w-36 h-full rounded-l-lg -mb-1 relative bg-white" style="padding-top: calc(1080 / 1350 * 100%); background-image:url('{{ asset('storage/imagenes/' . $evento->Imagen) }}'); background-size: cover; background-position: center;">
        </div>
      </div>
      <div class="flex-grow relative p-3 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-start gap-3 flex-nowrap">
          <div class="subtitle badge rounded text-xs sm:text-sm bg-primary text-white p-1 sm:px-2">
            <h6>
              <span class="font-extralight">{{ \Carbon\Carbon::parse($evento->Fecha)->format('D') }}</span>
              <span class="font-bold">{{ \Carbon\Carbon::parse($evento->Fecha)->format('d') }}</span>
              <span class="font-extralight">{{ \Carbon\Carbon::parse($evento->Fecha)->format('M') }}</span>
            </h6>
          </div>
          <div class="subtitle text-xs sm:text-sm">
            {{ $evento->Ubicacion }}
          </div>
        </div>
        <div class="info-container text-primary dark:text-gray-300 flex-grow">
          <p class="mt-1 sm:mt-3 font-semibold text-xl sm:text-2xl text-black sm:w-full sm:text-clip" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
            {{ $evento->Nombre }}
          </p>
        </div>
        <div class="d-flex justify-content-end mt-3">
          <form action="{{ route('eventos.participar', ['idEvento' => $evento->IDEvento]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Participate</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
