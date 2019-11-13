@extends('layouts.masterHome')

@section('title','Triwikrama | Home')

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center">
            <h4 class="text-light ">Triwikrama Admin Panel, You can manage your Coorporate Website with some features</h4>                    
        </div>             

        <div class="autoplay">
            <div class="col-md-12">
                <div class="card mb-2 border-0">
                    <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forPortofolio.jpg') }}" alt="image 1">
                    <div class="card-body">
                        <h4 class="card-title">Set Your Portfolio</h4>
                        <a href="{{ route('portofolio') }}" class="btn float-right mt-5 font-weight-bold" id="btnStart" style="background-color: #D91E18;color: white;border-radius: 100px;padding-right: 35px;padding-left: 35px;padding-top: 10px;padding-bottom: 10px;">START</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-2 border-0">
                    <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forProduct.jpg') }}" alt="image 1">
                    <div class="card-body">
                        <h4 class="card-title">Set Your Product</h4>
                        <a href="{{ url('product') }}" class="btn float-right mt-5 font-weight-bold" id="btnStart" style="background-color: #D91E18;color: white;border-radius: 100px;padding-right: 35px;padding-left: 35px;padding-top: 10px;padding-bottom: 10px;">START</a>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card mb-2 border-0">
                    <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forInbox.jpg') }}" alt="image 1">
                    <div class="card-body">
                        <h4 class="card-title">See Your Inbox</h4>
                        <a href="{{ url('/inbox') }}" class="btn float-right mt-5 font-weight-bold" id="btnStart" style="background-color: #D91E18;color: white;border-radius: 100px;padding-right: 35px;padding-left: 35px;padding-top: 10px;padding-bottom: 10px;">START</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-2 border-0">
                    <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forRecruitment.jpg') }}" alt="image 1">
                    <div class="card-body">
                        <h4 class="card-title">See Your Recruitment</h4>
                        <a href="#" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                    </div>
                </div>
            </div>

                
                    
            <div class="col-md-12">
                <div class="card mb-2 border-0">
                    <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forClient.jpg') }}" alt="image 1">
                    <div class="card-body">
                        <h4 class="card-title">See Your Client</h4>
                        <a href="{{ url('/client') }}" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
    @section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>    
        <script>
            $(document).ready(function(){
                if($(window).width() < 960){
                    $('.autoplay').slick({
                    slidesToShow : 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            }else if($(window).width() > 960){
                    $('.autoplay').slick({
                        slidesToShow : 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                    });
                }            
            });
            
            
        </script>
    @endsection