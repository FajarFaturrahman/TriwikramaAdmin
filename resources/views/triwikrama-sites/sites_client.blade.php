@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

<section class="section" id="client">
  <div class="container">
    <h2 class="client-title text-center">Our Clients</h2>
    <ul class="list-inline myclient row">
    
      @foreach($client as $row)
      <li>
        <a href="#/">
          <img src="{{ URL::to('/') }}/resizedImages/{{ $row->gambar_client }}">
        </a>
        <h4>{{ $row->nama_client }}</h4>        
      </li>
      @endforeach





    </ul>
    <center class="c-div">
      <button class="btn btn-default btn-loadmore">
        More Client
      </button>
    </center>
  </div>
</section>


@endsection
