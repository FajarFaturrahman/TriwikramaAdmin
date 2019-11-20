@extends('layouts.master')


@section('title','Triwikrama | Portofolio')

@section('content')

    <div class="container mt-5">
        <div class="row">
            
            <div class="box col-md-6">
                <form action="{{ url('/portofolio') }}" method="GET">
                    <div class="forSearch">
                        <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                        <input type="text" name="cari" id="search" placeholder="search">                    
                    </div>                    
                </form>    
            </div>
            

            <div class="col-md-6">
                <a class="btn float-right text-white" href="{{ url('/portofolio/create') }}" id="btnAddTop"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Portofolio</a>
            </div>
        </div>
        
        <div class="row mt-5">
            @foreach($portofolio as $portofolio)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="autoplay ml-1">                
                                    @foreach($portofolio->gambarWeb as $gambar)                                    
                                        <div class="col-md-10">                                           
                                            <img src="{{ URL::to('/') }}/images/{{ $gambar->gambar_website }}" class="card-img-top" height="240px" alt=""> 
                                        </div>                                
                                    @endforeach                
                                </div>     
                            </div>

                            <div class="col-md-7">                                
                                <h5 class="ml-4"><strong>{{ $portofolio->nama_aplikasi }}</strong></h5>                                

                                <table class="border-0 mt-2">
                                    <tr>
                                        <td><strong>Website Type</strong></td>
                                        <td>:</td>
                                        <td>{{ $portofolio->tipe_website }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Domain</strong></td>
                                        <td>:</td>
                                        <td>{{ $portofolio->domain_portofolio }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Created At</strong></td>
                                        <td>:</td>
                                        <td>{{ $portofolio->tanggal_dibuat }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong class="">Status</strong></td>
                                        <td><p class="bg-light mt-3 pl-3 pr-3" style="border-radius:100px;">{{ $portofolio->status }}</p></td>
                                    </tr>
                                </table>
                                <div class="row ml-2 float-right">
                                        <a class="btn btn-danger mr-4" href="{{ url('/portofolio/' . $portofolio->id . '/detailPortofolio') }}">View</a>                                
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                <br>
            @endforeach                
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
                slidesToShow : 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        }
    });        
    </script>
@endsection    
