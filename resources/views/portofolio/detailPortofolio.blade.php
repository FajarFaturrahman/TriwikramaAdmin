@extends('layouts.master')


@section('title','Triwikrama | Detail Portofolio')

@section('content')

    <div class="container mt-5">                
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="row">
                                    
                                    <h4>{{ $portofolio->nama_aplikasi }}</h4>                        
                                    <pre><h4> || </h4></pre>
                                    <h4 class="text-danger">{{ $portofolio->platform }}</h4>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row float-right mr-2">
                                    <a href="{{  url('/portofolio/' . $portofolio->id . '/edit') }}" class="btn mr-2" id="btnEditPortfolio">
                                        <img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt="" class="mt-2">
                                    </a>
                                    <form action="{{ url('/portofolio', $portofolio->id) }}" method="POST">
				                        @method('DELETE')
				                        @csrf
                                        <button class="btn btn-danger" type="submit" id="rounded-btn">
                                            <img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt="">
                                        </button>
				                    </form>                                    
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <div class="card-body">
                        <h5><strong>IMAGES</strong></h5>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="autoplay ml-2 mr-2">                
                                    @foreach($portofolio->gambarWeb as $gambar)                                    
                                        <div class="col-md-10">                                           
                                            <img src="{{ URL::to('/') }}/images/{{ $gambar->gambar_website }}" class="card-img-top" width="240px" alt=""> 
                                        </div>                                
                                    @endforeach

                                    @foreach($portofolio->gambarMobile as $mobile)                                    
                                        <div class="col-md-10">                                           
                                            <img src="{{ URL::to('/') }}/images/{{ $mobile->gambar_mobile }}" class="card-img-top" width="240px" alt=""> 
                                        </div>                                
                                    @endforeach                                                   
                                </div>
                            </div>                                                        
                        </div>

                        <h5 class="mt-5"><strong>COMPANY INFORMATION</strong></h5>
                        <div class="col-md-12 mt-3">
                            <table class="border-0 p-2">
                                <tr>
                                    <td><strong>Website Type</strong></td>
                                    <td>{{ $portofolio->tipe_website }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Domain</strong></td>
                                    <td>{{ $portofolio->domain_portofolio }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Created At</strong></td>
                                    <td>{{ $portofolio->tanggal_dibuat }}</td>
                                </tr>

                                <tr>
                                    <td><strong>STATUS</strong></td>
                                    <td><p class="bg-light mt-3" style="border-radius:100px;">{{ $portofolio->status }}</p></td>
                                </tr>
                            </table>
                        </div>
                        
                        <h5 class="mt-5"><strong>DESCRIPTION</strong></h5>
                        <div class="row justify-content-center">
                            <div class="col-md-11 mt-3">
                                <p>{{ $portofolio->description }}</p>                                
                            </div>
                        </div>                        
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
                $('autoplay').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,arrows: true,
                arrows: true,
                prevArrow:"<button type='button' class='slick-prev pull-left bg-dark'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow:"<button type='button' class='slick-next pull-right bg-dark'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
            });
            }else if($(window).width() > 960){
                $('.autoplay').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    arrows: true,
                    prevArrow:"<button type='button' class='slick-prev pull-left bg-dark'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                    nextArrow:"<button type='button' class='slick-next pull-right bg-dark'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
                });
            }            
        });
    </script>
@endsection