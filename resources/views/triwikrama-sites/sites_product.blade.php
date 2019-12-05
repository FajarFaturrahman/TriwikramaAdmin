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
              <a id="img-button-det" href="#details" class="swiper-slide page-scroll" data-title="{{ $row->nama_product }}" data-id="{{ $row->id }}" style="background-image:url({{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_product }})"></a>
            @endforeach              
          @endforeach  
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
                <div class="swiper-slide product-content" id="details">
                    <div class="container">
                      <div class="row">
                        <div class="store-image">
                          
                        </div>
                        <div class="col-sm col-desc">
                          <h2 class="display-3" id="product-name"></h2>
                          <p id="product-description"></p>
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

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
      $('body').on('click', '#img-button-det', function(e){
        e.preventDefault()
        var mid = $(this).data('id');
        
        $.ajax({
          type: "GET",
          url: "{{ url('/sites-product') }}" + '/' + mid,
          data: {id:mid},
          dataType: "json",
          success:function(html){
            console.log(html);
            $('#product-name').text(html.data.nama_product);
            $('#product-description').text(html.data.deskripsi);
            $('.store-image').html(html.gambar);
          },
          error:function(xhr){
            console.log(xhr.responseText);
          }
        });
      });
    })
  </script>
@endsection

@endsection