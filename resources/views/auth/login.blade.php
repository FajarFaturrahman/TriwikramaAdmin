<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
  <!-- bootstrap -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle.css') }}">

  <!-- javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- font -->
  <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'> 
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-12">
            <div class="col-md-8">
                <div class="row border-box">
                    <div class="col-sm-6 p-0 bg-right">
                        <img src="{{ asset('img/ImageTriwikramapng/Untitled-2.png') }}" class="img mt-4 mx-auto d-block" alt="">

                        <h5 class="text-white p-3 mt-5">welcome to Triwikrama admin panel, please login to use this application. </h5>
                    </div>

                    <div class="col-sm-6 p-0">
                        <div class="card">
                            <div class="card-header mt-4">
                                    <h5 class="text-center"><img src="{{ asset('img/IconTriwikramaAppAdmin/black/logout.png') }}" width="25px" height="25px"alt="">LOGIN PAGE</h5>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}"> 
                                    @csrf    
                                                                   
                                    <div class="form-group">
                                        <input type="email" id="email" class="form-control pb-4 pt-4 rounded-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control pb-4 pt-4 rounded-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group justify-content-center">
                                    <button type="submit" class="btn text-white font-weight-bold pt-3 pb-3" id="btnLogin">LOGIN</button>                                                                                                            
                                    </div>
                                    
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="btn btn-link">Lupa Password ?</a>
                                    @endif    
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
