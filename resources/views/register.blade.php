<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="css/estilo2.css">
    <title>Register</title>
</head>
<body class="shadow-lg ">
  <!-- logo -->
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4 text-center">
        <div class="logo-container">
          <a href="#" class="logo" target="_blank">
            <img src="imagenes/logo1.png" alt="Logo" class="img-fluid">
          </a>
        </div>
      </div>
    </div>
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

  <div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3">
                        <a href="{{ route('formularioLogin') }}" class="text-decoration-none"><span>Log In </span></a>
                        <a href="{{ route('formularioRegis') }}" class="text-decoration-none"><span>Sign Up</span></a>
                    </h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-front">
                            <div class="center-wrap">
                                <div class="section text-center">
                                    <h4 class="mb-4 pb-3">Sign Up</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: transparent"><i class="uil uil-user"></i></span>
                                                    <input id="name" type="text" class="form-style form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: transparent"><i class="uil uil-at"></i></span>
                                                    <input id="email" type="email" class="form-style form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email">
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: transparent"><i class="uil uil-lock-alt"></i></span>
                                                    <input id="password" type="password" class="form-style form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Your Password">
                                                </div>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: transparent"><i class="uil uil-lock-alt"></i></span>
                                                    <input id="password-confirm" type="password" class="form-style form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
