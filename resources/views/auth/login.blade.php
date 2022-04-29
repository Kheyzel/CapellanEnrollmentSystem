<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | CIT San Pablo Enrollment System</title>
    <link rel="shortcut icon" href="{{asset('../img/capellan-logo.png')}}" type="image/x-icon">
    <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />



        <style>
            html {
            height: 100vh;
        }
            .card {
              box-shadow: 0 0 10px 0 rgba(100, 100, 100, 0.26);
              border-radius: 15px;
            }

            body {
            /* The image used */
            background-image: url('../img/capellan-school-blur.jpg');

            
            /* Full height */
            height: 90%;

            /* Full width */
            width: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            
        }

        h4{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: black;
            padding-top: 25px;
            padding-bottom: 0px;
            
        }
            
        </style>

</head>

<body class="c-app flex-row align-items-center">
    
    <div class="container bg">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card-group rounded">
              <div class="card p-4">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-muted">Please sign in to your account</p>
                  <form method="POST" action="{{ url('/login') }}">
                      @csrf
                      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                          <i class="cil-user"></i>
                          </span>
                      </div>
                      <input type="name" class="form-control @error('name') is-invalid @enderror"
                      name="name" value="{{ old('name') }}"
                      placeholder="Name" id="floatingInput" required>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="input-group mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                          <i class="cil-lock-locked"></i>
                          </span>
                      </div>
                      <input type="password"
                      class="form-control @error('password') is-invalid @enderror"
                      placeholder="Password" name="password" id="floatingPassword" required>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="row">
                      <div class="col-6">
                          <button class="btn btn-lg btn-primary px-4 ml-auto" type="submit"><i class="cil-arrow-circle-right pr-3"></i>{{ __('Login') }}</button>
                      </div>
                      </form>
                      {{-- <div class="col-6 text-right">
                          <a href="{{ route('password.request') }}" class="btn btn-link px-0" type="button">{{ __('Forgot Your Password?') }}</a>
                      </div> --}}
                      </div>
                </div>
              </div>
              <div class="card text-white bg-light py-4 d-md-down-none" style="width:44%">
                <div class="card-body text-center pb-0">
                  <div>
                    
                    <img src="{{asset('../img/capellan-logo.png')}}" alt="logo" width="200px" height="200px"/>
                    <h4 class="font-weight-bold">CAPELLAN INSTITUTE OF TECHNOLOGY</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
