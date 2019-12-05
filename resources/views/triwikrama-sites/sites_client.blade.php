@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

<section class="section" id="client">
  <div class="container">
    <h2 class="client-title text-center">Our Clients</h2>
    <ul class="list-inline myclient row">
      <li>
        <a href="#/">
          <img src="{{ asset('theme-1/img/logo/beacukai.png') }}">
        </a>
        <h4>DJ bea dan cukai</h4>
        <h5>KPPBC TMP A Bandung</h5>
        <h5>KPPBC TMP C Amamapare</h5>
      </li>
      <li>
        <a href="#/">
          <img src="{{ asset('theme-1/img/logo/telkom.png') }}">
        </a>
        <h4>Telkom Indonesia</h4>
      </li>      

      <li>
        <a href="#/">
          <img src="{{ asset('theme-1/img/logo/telkom.png') }}">
        </a>
        <h4>Telkom Indonesia</h4>
      </li>      

      <li>
        <a href="#/">
          <img src="{{ asset('theme-1/img/logo/telkom.png') }}">
        </a>
        <h4>Telkom Indonesia</h4>
      </li>      





    </ul>
    <center class="c-div">
      <button class="btn btn-default btn-loadmore">
        More Client
      </button>
    </center>
  </div>
</section>


@endsection
