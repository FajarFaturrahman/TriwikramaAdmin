<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
<!-- <base href="http://www.triwikrama.co.id/" /> -->
<meta name="keywords" content="triwikrama, triwikrama bandung, triwikrama, it, teenagers, remaja, jasa pembuatan website, pengadaan hardware, software, program, aplikasi, it solution, bandung, hardware, indonesia, web, komputer, leptop, walls, shanaya, indonesia power, mitra pelajar komputer" />
<meta name="Robots" content="index,follow" >
<meta name="description" content="Mengapa bernama triwikrama? Tim kami mayoritas berusia muda. Muda juga identik dengan rasa ingin tahu dan kreatifitas yang tinggi, hal ini menjadi salah satu tolak ukur kami untuk terus mengembangkan skill di dunia IT, dan terus berinovasi dalam menciptakan produk – produk yang akan menjadi solusi terbaik untuk mitra-mitra kami." />
<meta name="generator" content="TRIWIKRAMA - Give Solutions For You" />
<meta property="og:title" content="triwikrama" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.facebook.com/ITTeenagersCorporation" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="http://www.triwikrama.co.id" />
<meta property="fb:admins" content="100000919400274" />

    <title>Triwikrama - Professional IT Solutions</title>
    
    <!-- Bootstrap Core CSS -->
     <!-- <link href="{{ asset('theme-1/css/bootstrap-grid.min.css') }}" rel="stylesheet">
     <link href="{{ asset('theme-1/css/bootstrap-flex.min.css') }}" rel="stylesheet"> -->
     <link href="{{ asset('theme-1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Plugin CSS -->        
    <link rel="stylesheet" href="{{ asset('theme-1/plugin/custom-scrollbar/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-1/plugin/owl-carousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-1/plugin/owl-carousel2/dist/assets/owl.theme.default.css') }}">

    <!-- Font CSS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Khand:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-1/fonts/font-awesome/css/font-awesome.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('theme-1/css/animate.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('theme-1/plugin/aos-master/dist/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme-1/plugin/swiper/dist/css/swiper.min.css') }}">


    <link rel="stylesheet/less" type="text/css" href="{{ asset('theme-1/less/content.less') }}" />
		<link rel="stylesheet/less" type="text/css" href="{{ asset('theme-1/less/style.less') }}" />





	  <script src="{{ asset('theme-1/js/less.js') }}"></script>    
    <script src="{{ asset('theme-1/js/jquery.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <script src="{{ asset('theme-1/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22141152-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

    

</script>

</head>
<style type="text/css">
img {
  max-width: auto;
}

</style>

<body data-spy="scroll" data-target="#menunav" data-offset="0">

    <nav class="navbar navbar-light  affix" id="menunav" role="navigation">
		<div class="container-fluid side-bar">
			<a href="#landing" class="navbar-brand">
			  <img src="http://triwikrama.co.id/images/logobaru.png" class="mx-auto d-block">
			</a>
			<a href="#/" class="sr-button">
				<i class="fa fa-bars"></i>
			</a>
			<ul class="nav navbar-nav side-list">
        <li class="nav-item">
          @if(Request::url() === route('home'))
            <a class="nav-link active" href="{{ route('home') }}">Service</a>
          @else
            <a class="nav-link" href="{{ route('home') }}">Service</a>
          @endif
        </li>
				<li class="nav-item">
        @if(Request::url() === route('about'))
          <a class="nav-link active" href="{{ route('about') }}">About Us</a>
        @else
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        @endif
				</li>
        <li class="nav-item">
        @if(Request::url() === route('client'))
          <a class="nav-link active" href="{{ route('client') }}">Our Client</a>
        @else
          <a class="nav-link" href="{{ route('client') }}">Our Client</a>
        @endif
        </li>
        <li class="nav-item">
        @if(Request::url() === route('portofolio'))
          <a class="nav-link active" href="{{ route('portofolio') }}">Portfolio</a>
        @else
          <a class="nav-link" href="{{ route('portofolio') }}">Portfolio</a>
        @endif
        </li>
        <li class="nav-item">
        @if(Request::url() === route('product'))
          <a class="nav-link active" href="{{ route('product') }}">Product</a>
        @else
          <a class="nav-link" href="{{ route('product') }}">Product</a>
        @endif
        </li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="http://triwikrama.co.id/?page=maintenance">Blog</a>
				</li> -->
        <li class="nav-item">
        @if(Request::url() === route('contact'))
          <a class="nav-link active" href="{{ route('contact') }}">Contact Us</a>
        @else
          <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
        @endif
        </li>
			</ul>
      <ul class="list-inline social-list">
        <li><a href="https://www.facebook.com/triwikrama3/"><i class="fa fa-facebook"></i></a></li>
        <li><a href="https://www.instagram.com/triwikramacorp/"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
      </ul>
		</div>
	</nav>

    <!-- page wrapper -->

    <div id="wrapper" class="wrap-toggle">
    @yield('content')
    </div>
    <!-- /.wrapper -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->

    <!-- Plugin JS / Jquery -->

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/easing/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenLite.min.js"></script>

  	<script type="text/javascript" src="{{ asset('theme-1/plugin/scroll-magic/scrollmagic/uncompressed/ScrollMagic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme-1/plugin/scroll-magic/scrollmagic/uncompressed/plugins/animation.gsap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme-1/plugin/scroll-magic/scrollmagic/uncompressed/plugins/debug.addIndicators.js') }}"></script>

    <script src="{{ asset('theme-1/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('theme-1/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('theme-1/plugin/owl-carousel2/src/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('theme-1/plugin/owl-carousel2/src/js/owl.animate.js') }}"></script>
    <script src="{{ asset('theme-1/plugin/owl-carousel2/src/js/owl.autoplay.js') }}"></script>
    <script src="{{ asset('theme-1/plugin/owl-carousel2/src/js/owl.navigation.js') }}"></script>
    <script src="{{ asset('theme-1/plugin/owl-carousel2/src/js/owl.hash.js') }}"></script>

	<script src="{{ asset('theme-1/plugin/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('theme-1/plugin/swiper/dist/js/swiper.min.js') }}"></script>
	<script src="{{ asset('theme-1/plugin/aos-master/dist/aos.js') }}"></script>

    <script src="{{ asset('theme-1/js/animation.js') }}"></script>
    <script src="{{ asset('theme-1/js/bottom.js') }}"></script>

  <script>   
   
  </script>
    
  <script>
    
  var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 50,
      centeredSlides: true,
      cssWidthAndHeight: true,
      slidesPerView: 'auto',
      visibilityFullFit: true,
      autoResize: false,
      loopedSlides: 4,
      touchRatio: 0.2,
      slideToClickedSlide: true,
      effect: 'coverflow',
      loop:true,
      loopedSlides: 5, //looped slides should be the same
      mousewheelControl: true,
      coverflow: {
          rotate: 20,
          depth: 100,
          modifier: 1,
          slideShadows : false
      },

  });

    var galleryTop = new Swiper('.gallery-top', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        effect: 'fade',
        keyboardControl: true,
        loop:true,
        loopedSlides: 5

    });

    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;

  </script>
  
	<script>
	    (function($){
	        $(window).load(function(){
	            $(".scroller-dot-dark").mCustomScrollbar({theme:"rounded-dots-dark"});
                $(".scroller-dark").mCustomScrollbar({theme:"dark"});
	        });
	    })(jQuery);
  </script>
  
    <script>
    $('.hide-button').hide();
    // $(window).on('scroll', function(){
    //   if($(window).scrollTop()>600){
    //     $('#menunav').removeClass('side-toggle');
    //     $('#wrapper').addClass('wrap-toggle');
    //     $('.portfolio-button').removeClass('port-btn-hidden');
    //   } else if($(window).scrollTop()>50){
    //     $('.portfolio-button').removeClass('port-btn-hidden');
    //   } else {
    //     $('#menunav').addClass('side-toggle');
    //     $('#wrapper').removeClass('wrap-toggle');
    //     $('.portfolio-button').addClass('port-btn-hidden');
    //   }
    //
    // });


    </script>
    
    <script type="text/javascript">
    // $(window).scroll(function() {
    //    var $this = $('.portfolio');
    //    if($(window).scrollTop() + $(window).height() == $(document).height()) {
    //         if (!$this.hasClass('port-collapse')) {
    //             $this.addClass('port-collapse');
    //             $('#updown').removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
    //             $('body').addClass('no-scroll');
    //             $('.portfolio-button').addClass('port-btn-toggle');
    //        } else {
    //             $this.removeClass('port-collapse');
    //             $('#updown').addClass('fa-chevron-circle-up').removeClass('fa-chevron-circle-down');
    //             $('body').removeClass('no-scroll');
    //        }
    //    }
    // });
    </script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Am8lISurprAbtDmIPU68QkjaYkbVKsLFl4csI40HPXNRXZyU3gDa72BXBCa4r7FxrnMpq%2bMMBHx5Yv8eHxjx1qPFTDovDdj8jDaZsY6yVWCQLho6%2bDUNsiMAiZ5jSNu5r1BXQtPZEt00lA%2bpHAD5U6P4Y2%2bckhpCvulDwMCJw533P8tHkiTgZDdy9MBFNdweq78DshEvBCeX26NTKIkdhpS3EtfRFIoA31NpIOEu1CXkrdDJ8GDDqG92nBfZUbAjWkYgLstWnl9krq2CG3uXf8bFPKzi9sq8ngnGykjCpmNTITzCTtAM5zBZrc%2bSTXdbW6u9o8%2fQOSLa61hhxyASez4mQix8Q3GLdK8LPEjd4HmqTi9Du80wpVWdK%2fPzjev7TYFPcvKLeQKfFNSs%2f6BU8RCOXUtpXFJaQUbM%2fPH%2fW3aW0KD41SEGUHaRJBlT7nk%2fl2ht%2fRJgGFzwV%2fNVayeZcXyCJlNw4Kk1Q%2fr3W5jA4VxsFx7udrGMWt3lnDsv6wynDH05BLNvpHXS0YT0nqrd3niX67TNpmTXd6RBZV%2f7LZD8P078y6fpKPdSiSId8XocQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
  @yield('js')
</body>
</html>