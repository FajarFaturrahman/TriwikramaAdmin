@extends('layouts.master')


@section('title','Triwikrama | Portofolio')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="box col-md-6">
                <form action="{{ url('admin-portofolio') }}" method="GET">
                    <div class="forSearch">
                        <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                        <input type="text" name="cari" id="search" placeholder="search">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/admin-portofolio/create') }}" class="btn float-right text-white btn-add" name="btnAddTop" id="btnAddTop" style="width: 200px;height: 40px;border-radius: 100px;margin-top: 10px;font-size:14px;">
                    <img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}"  width="16px" height="16px" alt="" class="mr-2">ADD PORTOFOLIO
                </a>
            </div>
        </div>

        <div class="row mt-3 p-1">
            @foreach($portofolio as $portofolios)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="autoplay ml-3 mr-2">
                                    @foreach($portofolios->gambarWeb as $gambar)
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <img src="{{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_website }}" class="card-img-top" width="240px"" alt="">
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach($portofolios->gambarMobile as $mobile)
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <img src="{{ URL::to('/') }}/resizedImages/{{ $mobile->gambar_mobile }}" width="100px" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-7">
                                <h5 class="ml-4"><strong>{{ $portofolios->nama_aplikasi }}</strong></h5>

                                <div class="row ml-2 mt-4">
                                    <div class="col-4"><strong>Website Type</strong></div>
                                    <div class="col-7">
                                       <div class="row">
                                        @foreach($portofolios->tipeAplikasi as $tipe)
                                                <p class="ml-3">{{ $tipe->tipe_website }}</p>
                                            @endforeach
                                       </div>
                                    </div>
                                </div>

                                <div class="row ml-2 mt-2">
                                    <div class="col-4"><strong>Domain</strong></div>
                                    <div class="col-7">                                                                              
                                        <p>{{ $portofolios->domain_portofolio }}</p>                                       
                                    </div>
                                </div>

                                <div class="row ml-2 mt-2">
                                    <div class="col-4"><strong>Created At</strong></div>
                                    <div class="col-7">                                                                              
                                        <p>{{ $portofolios->tanggal_dibuat }}</p>                                       
                                    </div>
                                </div>

                                <div class="row ml-2 mt-2">
                                    <div class="col-4"><strong>Status</strong></div>
                                    <div class="col-7">                                                                              
                                        <p>{{ $portofolios->status }}</p>                                       
                                    </div>
                                </div>

                                <div class="row ml-2 float-right">
                                        <a class="btn btn-danger mr-4" href="{{ url('/admin-portofolio/' . $portofolios->id . '/detailPortofolio') }}">View</a>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center mt-4">
            {{ $portofolio->links() }}
        </div>
    </div>

@endsection

@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
    $(document).ready(function(){        
            $('.autoplay').slick({
                slidesToShow : 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                prevArrow:"<button type='button' class='slick-prev pull-left bg-dark'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow:"<button type='button' class='slick-next pull-right bg-dark'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
            });
        
    });        
    </script>
@endsection    
