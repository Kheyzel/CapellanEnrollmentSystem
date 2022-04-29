<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Register | CIT San Pablo Enrollment System</title>
    <link rel="shortcut icon" href="{{asset('../img/capellan-logo.png')}}" type="image/x-icon">
    
    <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>


    <style>
        html{
            height: 100vh;
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
    </style>
</head>
<body class="c-app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <div class="container-header">
                        <img class="float-left mr-3 mt-2 mb-3" src="{{asset('../img/capellan-logo.png')}}" alt="logo" height="70px" width="70px"/>
                        <div class="pl-3">
                            <h1>Register New User</h1>
                            <p class="text-muted">Capellan Institute of Technology San Pablo</p>
                        </div>
                        
                    </div>
                    
                    <form method="post" action="{{ url('/register') }}">
                        @csrf
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="cil-user"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}"
                                   placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="cil-user"></i>
                              </span>
                            </div>
                            <select class="form-control @error('role') is-invalid @enderror" id="select1" name="role">
                                <option selected disabled>Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Registrar">Registrar</option>
                                <option value="Accounting">Accounting</option>
                            </select>
                            {{-- <input type="text" class="form-control @error('role') is-invalid @enderror"
                                   name="role" value="{{ old('role') }}" placeholder="Role"> --}}
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="cil-envelope-open"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="cil-lock-locked"></i>
                              </span>
                            </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="cil-lock-locked"></i>
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Confirm password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        {{-- <a href="{{ route('login') }}" class="text-center">I already have a membership</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- CoreUI -->
<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
