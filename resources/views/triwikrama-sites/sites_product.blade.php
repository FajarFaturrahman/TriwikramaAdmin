@extends('triwikrama-sites.sites-layout.sites-master')

@section('content')

<div id="main">
  <div class="slide-section">
    <div class="swiper-container">
      <div class="swiper-container gallery-thumbs">
        <h1 class="text-xs-center">OUR PRODUCT</h1>
        <p class="text-xs-center">
          OUR PRODUCTS EVER MADE
        </p>
        <div class="swiper-wrapper">
            <a href="#wistart" class="swiper-slide page-scroll" data-title="Wi-Start" style="background-image:url(<?php echo$assets;?>img/product/wi-start-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Geepos" style="background-image:url(<?php echo$assets;?>img/product/geepos-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Kopi Komunikasi" style="background-image:url(<?php echo$assets;?>img/product/kopikom-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Klinik Umum" style="background-image:url(<?php echo$assets;?>img/product/klinik-umum-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Skin Care" style="background-image:url(<?php echo$assets;?>img/product/skincare-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Klinik Gigi" style="background-image:url(<?php echo$assets;?>img/product/klinik-gigi-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Laboratorium" style="background-image:url(<?php echo$assets;?>img/product/laboratorium-ss.png)"></a>
            <a href="#" class="swiper-slide" data-title="Inventory" style="background-image:url(<?php echo$assets;?>img/product/inventory-ss.jpg)"></a>
            <a href="#" class="swiper-slide" data-title="POS" style="background-image:url(<?php echo$assets;?>img/product/pos-ss.jpg)"></a>
            <a href="#" class="swiper-slide" data-title="AirPOS" style="background-image:url(<?php echo$assets;?>img/product/airpos-ss.JPG)"></a>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>

      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>

@endsection