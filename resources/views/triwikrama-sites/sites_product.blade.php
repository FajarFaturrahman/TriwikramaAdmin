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
            @foreach($row->gambarProduct->take(1) as $gambar)                                                                                                             
              <a id="img-button-det" href="#{{ $row->id }}" class="swiper-slide page-scroll" data-title="{{ $row->nama_product }}" data-id="{{ $row->id }}" style="background-image:url({{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_product }})"></a>
            @endforeach              
          @endforeach  
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
          @foreach($product as $row2)
          <div class="swiper-slide product-content" id="{{ $row2->id }}">
            <div class="container">
              <div class="row">
                <div class="col-sm col-img">
                  @foreach($row2->gambarProduct->take(1) as $gambar2)
                  <img src="{{ URL::to('/') }}/resizedImages/{{ $gambar2->gambar_product }}">
                  @endforeach
                </div>
                <div class="col-sm col-desc">
                  <h2 class="display-3">{{ $row2->nama_product }}</h2>
                  <p>{{ $row2->deskripsi }}</p>
                  <a href="#" class="btn btn-danger">Pelajari lebih lanjut</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach             
        </div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>

@endsection