@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

<div id="main" class="product">
  <div class="slide-section">
    <div class="swiper-container">
      <div class="swiper-container gallery-thumbs">
        <h1 class="text-center">Our Products</h1>
        <p class="text-center">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="swiper-wrapper">
          @foreach($product as $row)
            @foreach($row->gambarProduct as $gambar)                                                                                                             
              <a href="#wistart" class="swiper-slide page-scroll" data-title="{{ $row->nama_product }}" style="background-image:url({{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_product }})"></a>
            @endforeach              
          @endforeach  
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
                <div class="swiper-slide product-content" id="wistart">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm col-img">
                          <img src="http://triwikrama.co.id/theme-1/img/material1.png">
                        </div>
                        <div class="col-sm col-desc">
                          <h2 class="display-3">Wi-Start</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          <a href="#" class="btn btn-danger">Pelajari lebih lanjut</a>
                        </div>
                      </div>
                    </div>
                </div>                
          </div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>

@endsection