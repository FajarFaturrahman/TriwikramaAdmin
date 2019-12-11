@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

  <section class="section" id="portfolio">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 left-con">
          <div class="col-left">
            <div class="fl-left">
              <h2 class="ttl1">PORTFOLIO <br><small>THE PROJECT WE'VE DONE</small></h2>
              <div class="fselect">
                <select name="pfilter" id="pfilter" class="form-control btn-filter" onchange="pFilter($(this))">
                  <option value="*" disabled selected>-- Filter --</option>
                  <option value="*">All</option>
                  <option value=".corporate">Corporate</option>
                  <option value=".e-commerce">E-Commerce</option>
                  <option value=".web-app">Web App</option>
                  <option value=".mobile-app">Mobile App</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 right-con">
          <div class="col-right">
            <div class="row myPortofolio">
              
              @foreach($portofolio as $row)        
                <div class="col-md-3 col-sm-4 col-xs-12 p-con web-app list">
                  <a href="#pModal-{{ $row->id }}" id="show" class="p-col" data-toggle="modal" data-target="#pModal-{{ $row->id }}" role="button">
                    <img src="http://triwikrama.co.id/images/project.png" alt="">
                  </a>
                  <span>{{ $row->nama_aplikasi }}</span>
                </div>
              @endforeach
              
            </div>
            <center class="c-div">
              <button class="btn btn-default btn-loadmore" data-totalResult="{{ App\Portofolio::count() }}">
                More Project
              </button>
            </center>
          </div>
        </div>
      </div>
    </div>
  </section>

  @foreach($portofolio as $row2)
  <div class="modal fade modal-portfolio" id="pModal-{{ $row2->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12 col-first">
                <div class="portfolio-slide">
                  <div id="port1" class="owl-carousel owl-theme port1">
                  @foreach($row2->gambarWeb as $gambar)
                    <div class="item">
                      <img src="{{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_website }}" alt="">
                    </div>
                  @endforeach    

                  </div>

                  <div class="responsive-slide" id="resImg">                                                                   
                  </div>
                </div>

                <div id="port2" class="owl-carousel owl-theme hidden port2">
                  @foreach($row2->gambarWeb as $gambar)
                    <div class="item">
                      <img src="{{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_website }}" alt="">
                    </div>
                  @endforeach 

                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12 col-last">
                <h5 class="top">WEBSITE</h5>
                <h4 class="top" id="namaApp">{{ $row2->nama_aplikasi }}</h4>
                <br>
                <div class="attribut clearfix">
                </div>
                <h6>Company Information</h6>
                <div class="row">
                  <div class="col-4">Website Type</div>
                  <div class="col-8" id="websiteType">: {{ $row2->tipe_website }}</div>
                  <div class="col-4">Domain</div>
                  <div class="col-8" id="domain">: {{ $row2->domain_portofolio }}</div>
                  <div class="col-4">Project Created</div>
                  <div class="col-8" id="projectCreated">: {{ $row2->tanggal_dibuat }}</div>

                </div>
                <br>
                <h6>Description</h6>
                <p id="deskripsi"> {{ $row2->description }}</p>

                <a href="#" class="btn btn-danger">Visit Website</a>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endforeach  


@endsection

@section('js')

    <script>

        $(document).ready(function(){
              $('body').on('click', '.btn-loadmore', function(e){
          e.preventDefault();          
          var _totalCurrentResult = $('.list').length;
          var main_site="{{ url('/') }}";
          $.ajax({
            url: main_site + "/load-more-data-port",
            type: "GET",
            data: {
              skip:_totalCurrentResult
            },
            beforeSend:function(){
              $('.btn-loadmore').html('loading...');
            },
            success:function(response){
              var _html = "";
              $.each(response, function(index, value){
                _html += '<div class="col-md-3 col-sm-4 col-xs-12 p-con web-app list">';
                  _html += '<a href="#" id="show" class="p-col" data-id="'+ value.id +'" role="button">';
                    _html += '<img src="http://triwikrama.co.id/images/project.png" alt="">';
                  _html += '</a>';
                  _html += '<span>'+ value.nama_aplikasi +'</span>';
                _html += '</div>'
              });

              
              $('.myPortofolio').append(_html);
              var _totalCurrentResult = $('.list').length;
              var _totalResult = parseInt($(".btn-loadmore").attr('data-totalResult'));
              console.log(_totalCurrentResult);
              console.log(_totalResult);
              if(_totalCurrentResult == _totalResult){
                $('.btn-loadmore').remove();
              }else{
                $('.btn-loadmore').html('Load More');
              }
            },
            error:function(xhr){
              console.log(xhr.responseText);
            }
          })
        });       
        });
    </script>
    <script>
        aniPortfolio();
    </script>
@endsection


