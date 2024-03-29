@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

<section class="section" id="client">
  <div class="container">
    <h2 class="client-title text-center">Our Clients</h2>
    <ul class="list-inline myclient row">
    
      @foreach($client as $row)
      <li class="list" >
        <div class="row justify-content-center">
          <div class="col-9" style="height: 115px; display: table;">    
            <a href="#" style="display: table-cell; vertical-align: middle">
                <img src="{{ URL::to('/') }}/resizedImages/{{ $row->gambar_client }}" class="img-fluid mx-auto d-block" style="max-width:115px; padding: 10px;">
            </a>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-9">
            <h4>{{ $row->nama_client }}</h4>
          </div>
        </div>        
      </li>
      @endforeach

    </ul>

    <center class="c-div">
      <button class="btn btn-default btn-loadmore" data-totalResult="{{ App\Client::count() }}">
        More Client
      </button>
    </center>
  </div>
</section>

@section('js')
  <script>
    $(document).ready(function(){
      $('body').on('click', '.btn-loadmore', function(e){
        e.preventDefault();
        var _totalCurrentResult = $('.list').length;
        var main_site="{{ url('/') }}";
        $.ajax({
          url: main_site + "/load-more-data",
          type: "GET",
          data: {
            skip:_totalCurrentResult
          },
          beforeSend:function(){
            $('.btn-loadmore').html('loading...');
          },
          success:function(response){
            console.log(response);
            var _html = "";
            $.each(response, function(index, value){
              _html += '<li class="list">';
                _html +='<div class="row justify-content-center">';
                  _html += '<div class="col-9" style="height: 115px; display: table;">';
                    _html += '<a href="#/" style="display: table-cell; vertical-align: middle">'
                      _html += '<img src="{{ URL::to("/") }}/resizedImages/'+value.gambar_client+'" class="img-fluid mx-auto d-block" style="max-width:115px; padding: 10px;">';
                    _html += '</a>';                      
                  _html += '</div>';
                _html += '</div>';
                _html+='<div class="row justify-content-center">';
                  _html += '<div class="col-9">';
                    _html += '<h4>'+value.nama_client+'</h4>';
                  _html += '</div>';    
                _html += '</div>';    
              _html += '</li>';
            });
            $('.myclient').append(_html);
            var _totalCurrentResult = $('.list').length;
            var _totalResult = parseInt($(".btn-loadmore").attr('data-totalResult'));
            console.log(_totalCurrentResult);
            console.log(_totalResult);
            if(_totalCurrentResult==_totalResult){
              $(".btn-loadmore").remove();
            }else{
              $(".btn-loadmore").html('Load More');
            }
          },
          error:function(xhr){
            console.log(xhr.responseText);
          }
        });
      })
    });
  </script>
@endsection

@endsection
