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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <style type="text/css">
        body{
            font-family: Fira Sans;
            src: url('{{ asset('fonts/FiraSans-Regular.tff') }}');
        }
    </style>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'>

</head>
<body>


        <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/ImageTriwikramapng/Untitled-2.png') }}" width="40" height="40" class="d-inline-block align-top" alt="" style="border-radius:100px;">
                <h3 class="d-inline-block align-top font-weight-bolder text-light">TRIWIKRAMA</h3>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="navbar-collapse" class="collapse navbar-collapse">
                <ul class="navbar-nav" id="navbar-nav">
                    <!-- Home Button -->
                    <li class="nav-item ml-5" id="nav-item">
                        <a href="{{ route('home') }}" data-toggle="tooltip" data-placement="bottom" title="Home">
                            <div class="rounded-circle justify-content-center" style="width: 40px; height: 40px; display: flex; align-items: center;" id="nav-container-img">
                                <img class="img-fluid" src="{{ asset('img/IconTriwikramaAppAdmin/white/home3.png')}}" alt="" width="20px" height="20px" style="margin: 0 auto;" id="nav-img">
                            </div>
                        </a>
                    </li>                                    
                </ul>

                <ul class="navbar-nav pull-right ml-5">
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

    <!-- javascript -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    
        $(document).ready(function(){
            $('#nav-item').mouseenter(function(){
                $('#nav-container-img').addClass("bg-white");
                $('#nav-img').attr('src', '{{ asset('img/IconTriwikramaAppAdmin/black/home.png')}}');
            });
            $('#nav-item').mouseleave(function(){
                $('#nav-container-img').removeClass("bg-white")
                $('#nav-img').attr('src', '{{ asset('img/IconTriwikramaAppAdmin/white/home3.png')}}');
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
        
    </script>
    @yield('js')
    
</body>
</html>
