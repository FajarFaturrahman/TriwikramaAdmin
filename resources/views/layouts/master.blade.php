<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    

    <!-- style -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'>    
</head>
<body>


        <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/ImageTriwikramapng/Untitled-2.png') }}" width="40" height="40" class="d-inline-block align-top" alt="" style="border-radius:100px;">
                <h3 class="d-inline-block align-top font-weight-bolder text-light">TRIWIKRAMA</h3>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            
            <div id="navbar-collapse" class="collapse navbar-collapse">
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="nav-item ml-5 active">
                        <div class="rounded-circle" style="width: 40px; height: 40px; background: #fff; padding: 25%;">
                            <a href="{{ route('home' )}}"><img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/black/home.png')}}" alt="" width="20px" height="20px"></a>
                        </div>
                    </li>
                    
                    <li class="nav-item ml-5">
                        <div class="rounded-circle" style="width: 40px; height: 40px; background: #fff; padding: 25%;">
                            <a href="{{ route('portofolio') }}"><img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/black/list.png')}}" alt="" width="20px" height="20px"></a>
                        </div>
                    </li>

                    <li class="nav-item ml-5">
                        <div class="rounded-circle" style="width: 40px; height: 40px; background: #fff; padding: 25%;">
                            <a href="#"><img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/black/desktop-monitor.png')}}" alt="" width="20px" height="20px"></a>
                        </div>
                    </li>

                    <li class="nav-item ml-5">
                        <div class="rounded-circle" style="width: 40px; height: 40px; background: #fff; padding: 25%;">
                            <a href="{{ route('inbox') }}"><img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/black/email.png')}}" alt="" width="20px" height="20px"></a>
                        </div>
                    </li>

                    <li class="nav-item ml-5">
                        <div class="rounded-circle" style="width: 40px; height: 40px; background: #fff; padding: 25%;">
                            <a href="{{ route('client') }}"><img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/black/businessman.png')}}" alt="" width="20px" height="20px"></a>
                        </div>
                    </li>

                    <li class="nav-item ml-5">
                       <div class="rounded-circle" style="width: 40px; height: 40px; background: #fff; padding: 25%;">
                            <a href="#"><img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/black/portfolio.png')}}" alt="" width="20px" height="20px"></a>
                       </div>
                    </li>
                </ul>

                <ul class="navbar-nav pull-right ml-5">
                    <li class="nav-item ml-5">
                        <a class="nav-link text-light font-weight-bold pl-4 pr-4 mr-3" id="border" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
            
        </nav>

        <script>
        
            
        
        </script>


    
    @yield('content')

    <br>

    <footer class="footer mt-4">
        <div class="footer-block author text-light ml-4">
            Copyright @CV.Triwikrama corp 2019
        </div>
    </footer>

    <!-- javascript -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('js')
    
</body>
</html>
