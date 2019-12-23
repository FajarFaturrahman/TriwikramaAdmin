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
                <select name="filter[]" id="pfilter" class="form-control btn-filter">
                  <option value="*" disabled selected>-- Filter --</option>
                  <option value="semua">All</option>
                  <option value="Corporate">Corporate</option>
                  <option value="E-Commerce">E-Commerce</option>
                  <option value="Web App">Web App</option>
                  <option value="Mobile App">Mobile App</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 right-con">
          <div class="col-right">
            <div class="reload-data"></div>            
            <div class="row myPortofolio">
                @foreach($portofolio as $row)                                  
                    <div class="p-col list mt-5 mr-3">
                        @if($row->platform == "Mobile Application")
                        <a href="#" id="show2" data-id="{{ $row->id }}">
                          <div class="portfolio-mobile">
                            @foreach($row->GambarMobile->take(1) as $gambarm)
                              <img src="{{ URL::to('/') }}/resizedImages/{{ $gambarm->gambar_mobile }}" alt="">
                            @endforeach
                          </div>
                        </a>    
                        @elseif($row->platform == "Responsive Web Application")
                        <a href="#" id="show" data-id="{{ $row->id }}">
                          <div class="portfolio-item">
                            @foreach($row->GambarWeb->take(1) as $gambarw)
                              <img src="{{ URL::to('/') }}/resizedImages/{{ $gambarw->gambar_website }}" alt="">
                            @endforeach
                          </div>
                        </a>
                        @else
                        <a href="#" id="show" data-id="{{ $row->id }}">
                          <div class="portfolio-item">
                            @foreach($row->GambarWeb->take(1) as $gambarw)
                              <img src="{{ URL::to('/') }}/resizedImages/{{ $gambarw->gambar_website }}" alt="">
                            @endforeach
                          </div>
                        </a>  
                        @endif
                      
                      <span class="mt-4">{{ $row->nama_aplikasi }}</span>                      
                    </div>            
                @endforeach                
            </div>
            <center class="c-div" style="margin-top: 40px;">
              <button class="btn btn-default btn-loadmore" data-totalResult="{{ App\Portofolio::count() }}">
                More Project
              </button>
            </center>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal For Web -->
  <div class="modal fade modal-portfolio" id="pModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button id="btn-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12 col-first">
                <div id="owl-con1" class="portfolio-slide">
                  <div id="port1" class="owl-carousel owl-theme port1">                     
                  </div>

                  <div class="responsive-slide" id="resImg">                                                                   
                  </div>
                </div>
                <div class="owl-con" id="owl1">
                  <div id="port2" class="owl-carousel owl-theme hidden port2">
                    
                  </div>

                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12 col-last">
                <h5 class="top">WEBSITE</h5>
                <h4 class="top" id="namaApp"></h4>
                <br>
                <div class="attribut clearfix">
                </div>
                <h6>Company Information</h6>
                <div class="row">
                  <div class="col-4">Website Type</div>
                  <div class="col-8 row" id="websiteType">: </div>
                  <div class="col-4">Domain</div>
                  <div class="col-8" id="domain">: </div>
                  <div class="col-4">Project Created</div>
                  <div class="col-8" id="projectCreated">: </div>

                </div>
                <br>
                <h6>Description</h6>
                <p id="deskripsi"></p>

                <a href="#" class="btn btn-danger">Visit Website</a>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal For Mobile -->

  <div class="modal fade modal-portfolio" id="pMobile">
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
              <div id="owl-con2" class="portfolio-slide">
                <div id="port3" class="owl-carousel owl-theme port1">
                                   
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 col-last">
              <h5 class="top">MOBILE APP</h5>
              <h4 class="top" id="namaMobileApp"></h4>
              <br>
              <div class="attribut clearfix">
              </div>
              <h6>Company Information</h6>
              <div class="row">
                <div class="col-4">Mobile App Type</div>
                <div class="col-8 row" id="mobileAppType">:</div>
                <div class="col-4">Domain</div>
                <div class="col-8" id="mobileDomain">: </div>
                <div class="col-4">Project Created</div>
                <div class="col-8" id="mobileProjectCreated">: </div>

              </div>
              <br>
              <h6>Description</h6>
              <p id="mobile_deskripsi"></p>

              <a href="#" class="btn btn-danger">Visit Website</a>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
</div>
  


@endsection

@section('js')

    <script>
        $(document).ready(function(){

           //Token Ajax
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
           
          aniPortfolio();          

          $('body').on('click', '#btn-close', function(){
            $('#port2').html("");
            $('#port1').html("");
          });

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
              success:function(data){                           
                
                $('.myPortofolio').append(data);
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


          // Web        
          $('body').on('click', '#show', function(event){
            event.preventDefault();
            var mid = $(this).data('id');
            $('#owl-con1').html('<div id="port1" class="owl-carousel owl-theme port1"></div><div class="port-con"></div>');
            $('#owl1').html('<div id="port2" class="owl-carousel owl-theme hidden port2 "></div>');

            $.ajax({
              type: "GET",
              url: "{{ url('/sites-portofolio') }}" + '/' +mid,
              data: {id:mid},
              dataType: "json",
              success:function(data){
                console.log(data);
                $('#namaApp').text(data.data.nama_aplikasi);
                $('#port2').html(data.ambilFoto);
                $('#port1').html(data.ambilFoto);
                if(data.data.platform == "Responsive Web Application"){
                  $('.port-con').html('<div class="responsive-slide" id="resImg1"></div>');
                  $('#resImg1').html(data.fotomr);
                }else{

                }
                var slidercode;
                var owl = $("#port2");
                owl.owlCarousel({
                  autoplayTimeout:1000,
                  autoplay: true,
                  items: data.jumlah,
                  navigation: true
                });   
                $('#websiteType').html(data.tipeApp);
                $('#domain').text(data.data.domain_portofolio);
                $('#projectCreated').text(data.data.tanggal_dibuat);
                $('#deskripsi').text(data.data.description);
                $('#pModal').modal('show');
                
              },
              error:function(xhr){
                console.log(xhr.responseText);
              }
            });

          });

          // Mobile
          $('body').on('click', '#show2', function(event){
            event.preventDefault();
            var mid = $(this).data('id');
            $('#owl-con2').html('<div id="port3" class="owl-carousel owl-theme port1"></div>');

            $.ajax({
              type: "GET",
              url: "{{ url('/sites-portofolio') }}" + '/' +mid,
              data: {id:mid},
              dataType: "json",
              success:function(data){
                console.log(data);
                $('#namaMobileApp').text(data.data.nama_aplikasi);                
                $('#port3').html(data.ambilFotoMobile);
                $('#mobileAppType').html(data.tipeApp);
                $('#mobileDomain').text(data.data.domain_portofolio);
                $('#mobileProjectCreated').text(data.data.tanggal_dibuat);
                $('#mobile_deskripsi').text(data.data.description);
                $('#pMobile').modal('show');
                
              },
              error:function(xhr){
                console.log(xhr.responseText);
              }
            });

          });

          // //Responsive
          // $('body').on('click', '#show1', function(event){
          //   event.preventDefault();
          //   var mid = $(this).data('id');
          //   $('#owl-con1').html('<div id="port1" class="owl-carousel owl-theme port1"></div><div class="responsive-slide" id="resImg1"></div>');
          //   $('#owl1').html('<div id="port2" class="owl-carousel owl-theme hidden port2 "></div>');

          //   $.ajax({
          //     type: "GET",
          //     url: "{{ url('/sites-portofolio') }}" + '/' +mid,
          //     data: {id:mid},
          //     dataType: "json",
          //     success:function(data){
          //       console.log(data);
          //       $('#namaResponsiveApp').text(data.data.nama_aplikasi);                
          //       $('#port2').html(data.ambilFoto);
          //       $('#port1').html(data.ambilFoto);
          //       $('#resImg1').html(data.fotomr);
          //       var owl2 = $("#port2");
          //       owl2.owlCarousel({
          //         autoplayTimeout:1000,
          //         autoplay: true,
          //         items: data.jumlah,
          //         navigation: true
          //       });   
          //       $('#responsiveAppType').html(data.tipeApp);
          //       $('#responsiveDomain').text(data.data.domain_portofolio);
          //       $('#responsiveProjectCreated').text(data.data.tanggal_dibuat);
          //       $('#responsive_deskripsi').text(data.data.description);
          //       $('#pResponsive').modal('show');
                
          //     },
          //     error:function(xhr){
          //       console.log(xhr.responseText);
          //     }
          //   });

          // });

          //Filter Data With Ajax
          $('body').on('change', '#pfilter', function(e){
            e.preventDefault();
            var filter = $(this).val();

            if(filter == "semua"){
              location.reload();
            }else{
              $.ajax({
                type: "post",
                data: {status:filter},
                url: "{{ url('/sites-portofolio/filter') }}" + '/' + filter,
                dataType: "json",
                beforeSend: function(){
                    $(".reload-data").html('<div class="row justify-content-center"><div class="text-dark">Reload data ... </div></div>');
                    $(".myPortofolio").html("");
                },
                success: function(data){
                    console.log(data);
                    $(".myPortofolio").html(data);
                    $(".c-div").html("");
                    $(".reload-data").html("");
                    
                    
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
              });        
            }
             
        });
          
          
        });
              
        
    </script>

@endsection


