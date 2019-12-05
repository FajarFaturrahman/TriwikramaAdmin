@extends('triwikrama-sites.sites-layout.sites_master')


@section('content')
<div id="service" >
  <div class="owl-carousel">
      <div class="section" id="web-custom" data-hash="webcustom">
        <div class="container">
          <div class="row float-section">
            <div class="col-sm-12 col-md-6 col-sec">
              <h2 class="ttl1">WEBSITE CUSTOM</h2>
              <p class="txt1">The needs of websites in various business areas would be different needs and purposes, be it a regular information website or an integrated website. Therefore Triwikrama provides website creation services in accordance with the needs and objectives of the desired business field ranging from features to the desired design can be appropriate for the purpose of supporting the right target. In order for a website that has been built will not be in vain.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-sec">
              <img src="{{ asset('theme-1/img/service/alldevice.png') }}" class="mx-auto d-block img1">
              <ul class="list-inline webcos-logo">
                <li class="list-inline-item"><img src="{{ asset('theme-1/img/service/e-commerce.png') }}"></li>
                <li class="list-inline-item"><img src="{{ asset('theme-1/img/service/company.png') }}"></li>
                <li class="list-inline-item"><img src="{{ asset('theme-1/img/service/bootstrap.png') }}"></li>
                <li class="list-inline-item"><img src="{{ asset('theme-1/img/service/google-plus.png') }}"></li>
                <li class="list-inline-item"><img src="{{ asset('theme-1/img/service/domain.png') }}"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="section" id="web-app" data-hash="webapp">

        <div class="container">
          <div class="row">
            <div class="col-sm-12  col-left ">
              <img src="{{ asset('theme-1/img/service/allwebapp.png') }}" class="mx-auto img1">
            </div>
            <div class="col-sm-12  col-right ">
              <h2 class="ttl1">WEB APPLICATION</h2>
              <p class="txt1">In the world of business, industry, commerce and even governance would require an application system for ease in data management and transaction processing. Plus the internet era that can not be separated from human life required an application that can overcome it all. Therefore Triwikrama provides services to create a web-based application system that can support any device, any operating system and wherever.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="section" id="mobile-app" data-hash="mobileapp">
        <div class="container">
           <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 order-2 order-md-1 col-left ">
              <img src="{{ asset('theme-1/img/service/google-pixel.png') }}" class="img1">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 order-1 order-md-2 col-right ">
              <h2 class="ttl1"><i class="fa fa-android"></i> android <span>application</span></h2>
              <p class="txt1">Users especially Android Smartphone increasing every day. High mobility requires interacting and working on a smartphone is an alternative way. We provide native android-based mobile app development that focuses on UI and UX design with a simple workflow system.</p>
            </div>
           </div>
        </div>
      </div>

  </div>
  <ul class="list-inline" id="section-icon">
    <li class="active nav1"><a href="#webcustom"><i class="fa fa-television"></i></a></li>
    <li class="nav2"><a href="#webapp"><i class="fa fa-globe"></i></a></li>
    <li class="nav3"><a href="#mobileapp"><i class="fa fa-android"></i></a></li>

  </ul>
</div>
@endsection