@extends('layouts.master')


@section('title','Triwikrama | Home')

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center">
            <h4 class="text-light ">Triwikrama Admin Panel, You can manage your Coorporate Website with some features</h4>                    
        </div> 
        
        <!-- wrapper -->
        <div id="slideCarousel" class="carousel slide carousel-multi-item" data-ride="carousel">                               
            
            <!-- slides -->
            <div class="carousel-inner mt-3" role="listbox">

                <!-- slide 1 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card mb-2 border-0">
                                <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forPortofolio.jpg') }}" alt="image 1">
                                <div class="card-body">
                                    <h4 class="card-title">Set Your Portfolio</h4>
                                    <a href="{{ route('portofolio') }}" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2 border-0">
                                <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forProduct.jpg') }}" alt="image 1">
                                <div class="card-body">
                                    <h4 class="card-title">Set Your Product</h4>
                                    <a href="#" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of slide 2 -->

                <!-- slide 2 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card mb-2 border-0">
                                <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forInbox.jpg') }}" alt="image 1">
                                <div class="card-body">
                                    <h4 class="card-title">See Your Inbox</h4>
                                    <a href="#" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2 border-0">
                                <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forRecruitment.jpg') }}" alt="image 1">
                                <div class="card-body">
                                    <h4 class="card-title">See Your Recruitment</h4>
                                    <a href="#" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of slide 2 -->

                <!-- slide 3 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card mb-2 border-0">
                                <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forClient.jpg') }}" alt="image 1">
                                <div class="card-body">
                                    <h4 class="card-title">See Your Client</h4>
                                    <a href="#" class="btn float-right mt-5 font-weight-bold" id="btnStart">START</a>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <!-- end of slide 3 -->

            </div>
            <!-- end of slides -->

            <!-- Control -->
           
                <a class="carousel-control-prev" href="#slideCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
                <a class="carousel-control-next" href="#slideCarousel" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>           

            <!-- end of control -->

        </div>
        <!-- end of wrapper -->
        
    </div>

    

@endsection



<script>

</script>


