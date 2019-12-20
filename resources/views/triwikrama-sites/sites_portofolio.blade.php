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
                        <a href="#" id="showMobile" data-id="{{ $row->id }}">
                          <div class="portfolio-mobile">
                            @foreach($row->GambarMobile->take(1) as $gambarm)
                              <img src="{{ URL::to('/') }}/resizedImages/{{ $gambarm->gambar_mobile }}" alt="">
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
                <div class="owl-con">
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
                  <div class="col-8" id="websiteType">: </div>
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
              success:function(response){
                var _html = "";
                $.each(response, function(index, value){
                  
                    _html += '<div class="col-3 p-col list mt-5">';
                      _html += '<a href="#" id="show" data-id="'+ value.id +'">';
                        _html += '<img src="http://triwikrama.co.id/images/project.png" alt="">';
                      _html += '</a>';
                      _html += '<span class="mt-4">'+ value.nama_aplikasi +'</span>';
                    _html += '</div>';
                  
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

          $('body').on('click', '#show', function(event){
            event.preventDefault();
            var mid = $(this).data('id');
            $('#owl-con1').html('<div id="port1" class="owl-carousel owl-theme port1"></div>');
            $('.owl-con').html('<div id="port2" class="owl-carousel owl-theme hidden port2 "></div>');

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
                var slidercode;
                var owl = $("#port2");
                owl.owlCarousel({
                  autoplayTimeout:1000,
                  autoplay: true,
                  items: data.jumlah,
                  navigation: true
                });   
                $('#websiteType').text(data.data.tipe_website);
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


