<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    

    <!-- style -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.scss') }}">
    
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>


        <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/iconAndLogo/logoTriwikrama.png') }}" width="40" height="40" class="d-inline-block align-top" alt="" style="border-radius:100px;">
                <h3 class="d-inline-block align-top font-weight-bolder text-light">TRIWIKRAMA</h3>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="nav-item ml-5 active">
                        <a class="nav-link text-light" href="{{ route('home') }}">
                            <img src="{{ asset('img/iconAndLogo/home3.png') }}" onmouseover="this.src='{{ asset('img/iconAndLogo/home.png') }}';" onmouseout="this.src='{{ asset('img/iconAndLogo/home3.png') }}';" alt="">
                        </a>
                    </li>

                    <li class="nav-item ml-5">
                        <a class="nav-link" href="{{ route('portofolio') }}">
                            <img src="{{ asset('img/iconAndLogo/portfolio2.png') }}" onmouseover="this.src='{{ asset('img/iconAndLogo/portfolio.png') }}';" onmouseout="this.src='{{ asset('img/iconAndLogo/portfolio2.png') }}';" alt="" alt="">
                        </a>
                    </li>

                    <li class="nav-item ml-5">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('img/iconAndLogo/graph-line-screen2.png') }}" onmouseover="this.src='{{ asset('img/iconAndLogo/graph-line-screen.png') }}';" onmouseout="this.src='{{ asset('img/iconAndLogo/graph-line-screen2.png') }}';" alt="">
                        </a>
                    </li>

                    <li class="nav-item ml-5">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('img/iconAndLogo/email2.png') }}" onmouseover="this.src='{{ asset('img/iconAndLogo/email.png') }}';" onmouseout="this.src='{{ asset('img/iconAndLogo/email2.png') }}';" alt="">
                        </a>
                    </li>

                    <li class="nav-item ml-5">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('img/iconAndLogo/info3.png') }}" onmouseover="this.src='{{ asset('img/iconAndLogo/info1.png') }}';" onmouseout="this.src='{{ asset('img/iconAndLogo/info3.png') }}';" alt="">
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav pull-right">
                    <li class="nav-item ml-5">
                    <a class="nav-link text-light font-weight-bold pl-4 pr-4 mr-3" id="border" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
            
        </nav>


    
    @yield('content')

    <br>

    <footer class="footer mt-4">
        <div class="footer-block author text-light ml-4">
            Copyright @CV.Triwikrama corp 2019
        </div>
    </footer>
</body>
</html>
