<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="css/estilo2.css">
    <title>Login</title>
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
          <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-front">
                <div class="center-wrap">
                  <div class="section text-center">
                    <h4 class="mb-4 pb-3">Log In</h4>
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: transparent"><i class=" uil uil-at"></i></span>
                                <input id="email" type="email" class="form-style form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email" autofocus>
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
                            <span class="input-group-text" style="background-color:transparent"><i class="uil uil-lock-alt"></i></span>
                            <input id="password" type="password" class="form-style form-control @error('password') is-invalid @enderror" name="password" placeholder="Your Password" required autocomplete="current-password">
                          </div>
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
  
                      <div class="row mb-0">
                        <div class="col-md-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    @if (Route::has('password.request'))
                    <p class="mb-0 mt-4 text-center"> <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a></p>

                @endif
                 
            
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
