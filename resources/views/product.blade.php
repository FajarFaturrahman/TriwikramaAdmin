@extends('layouts.master')

@section('title','Triwikrama | Product')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="box col-md-6">
                <form action="{{ url('admin-product') }}" method="GET">
                    <div class="forSearch">
                        <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                        <input type="text" name="cari" id="search" placeholder="search">                    
                    </div>                    
                </form>    
            </div>
            

            <div class="col-md-6">
                <button type="button" class="btn float-right text-white btn-add" name="btnAddTop" id="btnAddTop" style="width: 150px; height: 40px; border-radius: 100px; margin-top: 10px; font-size: 14px;"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="16px" height="16px" alt="" class="mr-2">ADD PRODUCT</button>
            </div>
        </div>
        
        <div class="row mt-3" id="tampil">
            @foreach($product as $row)
                <div class="col-md-12 mt-4" id="show_product_{{ $row->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">                                    
                                    <div class="autoplay ml-5 mr-5">                
                                        @foreach($row->gambarProduct as $gambar)                                    
                                            <div class="col-md-12">           
                                                <div class="row justify-content-center">
                                                    <img src="{{ URL::to('/') }}/resizedImages/{{ $gambar->gambar_product }}" class="card-img-top" width="240px" alt=""> 
                                                </div>                                
                                            </div>                                
                                        @endforeach                
                                    </div>                                                                
                                </div>

                                <div class="col-md-6">
                                    <div class="card-header" id="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3>{{ $row->nama_product }}</h3>                                
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" id="delete" class="delete btn ml-3 rounded-circle" data-id="{{ $row->id }}" style="height:50px;width:50px;background:#D91E18;color:white">
                                                    <img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" class="mt-2" width="20px" height="20px" alt="">
                                                </a>
    
                                                <a href="#" id="edit" class="edit btn ml-2 rounded-circle" data-id="{{ $row->id }}" name="edit" style="height:50px;width:50px;background:#550E99;color:white">
                                                    <img  class="mt-2" src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt="">
                                                </a>
                                            </div>
                                        </div>                                    
                                    </div>                                
                                    <p class="mt-3 p-des">
                                    @if(strlen($row->deskripsi) > 200)
                                        {{substr($row->deskripsi,0,200)}}
                                        <span class="read-more-show hide_content">Read More <i class="fa fa-angle-down"></i></span>
                                        <span class="read-more-content"> {{substr($row->deskripsi,200,strlen($row->deskripsi))}} 
                                        <span class="read-more-hide hide_content">Read Less <i class="fa fa-angle-up"></i></span> </span>
                                        @else
                                        {{$row->deskripsi}}
                                    @endif                                        
                                    </p>                                
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>                                    
            @endforeach    
        </div>

        <div class="row justify-content-center mt-4">
            {{ $product->links() }}
        </div>        
    </div>

    <!-- Modal For Add/Edit Client -->

        <div class="modal fade" id="modalAddEditProduct" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD PRODUCT</h4>
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close" id="icon-close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form action="post" id="form_add" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="">
                            <div class="row">
                                <div class="col-md-7">                                
                                    <div class="form-group">
                                        <label for="nama_product">Product Name</label>
                                        <input  class="form-control mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="nama_product" id="nama_product">
                                    </div>

                                    <div class="form group">
                                        <label for="deskripsi">Description</label>                                        
                                        <textarea class="form-control pb-5 pt-5 mt-3 rounded border-0" style="background-color:#EFF2F4;height:218px;" type="text" name="deskripsi" id="deskripsi"></textarea>
                                    </div>                                                                        
                                </div>  

                                <div class="col-md-5">
                                    <div class="row ml-5">                                        
                                        <span id="store_image"></span>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            
                                            <div class="input-group control-group increment mb-3">
                                                <div class="row button-con">
                                                    <div class="col-10">
                                                        <input type="file" style="max-width: 250px;" id="gambar_product" name="gambar_product[]">
                                                    </div>
                                                    <div class="col-2">
                                                        <a style="width: 20px; height: 20px; padding: 6px; display: none;" id="delete_file">
                                                            <img src="{{ URL::to('/') }}/img/IconTriwikramaAppAdmin/red/close-cross (1).png" class="ml-2" width="10px"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <!-- <div class="row">
                                                    <div class="col-3">
                                                        <label class="btn-file-lab p-2 mt-2" id="con">
                                                            <img id="img-client" src="{{ URL::to('/') }}/img/IconTriwikramaAppAdmin/white/photo2.png" width="25px" alt="">
                                                            <input type="file" style="display: none;" id="gambar_product" name="gambar_product[]">
                                                        </label>
                                                    </div>
                                                    <div class="col-9 pt-2" style="text-align: left;">
                                                        <span id="file-selected">click the button to add a file</span>
                                                    </div>
                                                </div> -->
                                                <!-- <input type="file" name="gambar_product[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                </div> -->
                                            </div>

                                            <div class="clone d-none">
                                                <div class="row button-con mb-3">
                                                    <div class="col-10">
                                                        <input type="file" style="max-width: 250px;" id="gambar_product" name="gambar_product[]">
                                                    </div>
                                                    <div class="col-2">
                                                        <a style="width: 20px; height: 20px; padding: 6px;" id="delete_files">
                                                            <img src="{{ URL::to('/') }}/img/IconTriwikramaAppAdmin/red/close-cross (1).png" class="ml-2" width="10px"/>
                                                        </a>
                                                    </div>
                                                </div>                                                
                                                <!-- <div class="control-group input-group" style="margin-top:10px">            
                                                    <input type="file" name="gambar_product[]" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="row justify-content-center mt-4">
                                                <button id="button-add-more-image" class="btn" style="background: #550E99; color: #fff;" type="button"><img class="mr-2" src="{{ URL::to('/') }}/img/IconTriwikramaAppAdmin/white/add2.png" width="14px" />Add More Image</button>
                                            </div>
                                            <p class="mt-2">(File Max: 2048 KB)</p>
                                        </div>                                        
                                    </div>
                                    <hr class="">   
                                    <div class="row float-right mr-3 mt-5">
                                        <button class="btn btn-link text-dark mr-3" data-dismiss="modal" id="btn-cancel">CANCEL</button>
                                        <input type="hidden" name="action" id="action">
                                        <input type="hidden" name="hidden_id" id="hidden_id">
                                        <input type="submit" name="action_button" id="action_button" class="btn pl-4 pr-4" style="border-radius:100px;background:#550E99;color:white" value="ADD">
                                    </div>
                                </div>
                            </div>
                        </form>        
                    </div>                    
                </div>
            </div>
        </div>
    <!-- end of modal -->
    
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#btn-cancel").click(function(){
                $("#form_add")[0].reset();
                location.reload();
            });

            $("#icon-close").click(function(){
                $("#form_add")[0].reset();
                location.reload();
            });


            $('.read-more-content').addClass('hide_content');
            $('.read-more-show, .read-more-hide').removeClass('hide_content');

            $('.read-more-show').on('click', function(e) {
                $(this).next('.read-more-content').removeClass('hide_content');
                $(this).addClass('hide_content');
                e.preventDefault();
            });

            $('.read-more-hide').on('click', function(e){
                var p = $(this).parent('.read-more-content');
                p.addClass('hide_content');
                p.prev('.read-more-show').removeClass('hide_content');
                e.preventDefault();
            })

            if($(window).width() < 960){
                    $('.autoplay').slick({
                    slidesToShow : 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    arrows: true,
                prevArrow:"<button type='button' class='slick-prev pull-left bg-dark'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow:"<button type='button' class='slick-next pull-right bg-dark'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
                });
            }else if($(window).width() > 960){
                    $('.autoplay').slick({
                        slidesToShow : 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: true,
                prevArrow:"<button type='button' class='slick-prev pull-left bg-dark'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow:"<button type='button' class='slick-next pull-right bg-dark'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
                    });
            }                   

            //EDIT

            $("#button-add-more-image").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            // EDIT

            $("body").on('click', "#delete_file", function(){
                $(this).parents(".button-con").remove();
            });

            $("body").on('click', "#delete_files", function(){
                $(this).parents(".button-con").remove();
            });

            $('#btnAddTop').click(function(){
                $('.modal-title').text("ADD PRODUCT");
                $('#action_button').val('Add');
                $('#action').val('Add');
                $('#modalAddEditProduct').modal('show');
            });

            $('#form_add').on('submit', function(event){
                event.preventDefault();
                if($('#action').val() == 'Add')
                {
                    $.ajax({
                        url: "{{ route('admin-product.store') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success:function(data){
                            var html = '';
                            if(data.errors)
                            {
                                html = '<div class="alert alert-danger">';
                                for(var count = 0; count < data.errors.length; count++)
                                {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            else
                            {                                
                                $('#form_add')[0].reset();
                                $('#modalAddEditProduct').modal('hide');
                                location.reload();
                            }
                            $('#form_result').html(html);
                        },
                        error:function(xhr){
                            console.log(xhr.responseText);
                        }
                    })
                }

                if($('#action').val() == 'Edit')
                {
                    $.ajax({
                        url: "{{ route('admin-product.update') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success:function(data){
                            var html='';
                            if(data.errors)
                            {
                                html = '<div class="alert alert-danger">';
                                for(var count = 0; count < data.errors.length; count++)
                                {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            else                            
                            {                                
                                $('#form_add')[0].reset();
                                $('#modalAddEditProduct').modal('hide');
                                location.reload();
                            }
                            $('#form_result').html(html);
                            
                        },
                        error:function(xhr){
                            console.log(xhr.responseText);
                        }
                    });
                }

            });

            // EDIT

            $(document).on('click', '.edit', function(){
                var mid = $(this).data('id');
                $('#form_result').html('');
                $.ajax({                    
                    url: "/admin-product/"+mid+"/edit",
                    dataType: 'json',
                    success:function(html){
                        console.log(html);
                        $('#nama_product').val(html.data.nama_product);
                        $('#deskripsi').val(html.data.deskripsi);
                        $('#hidden_id').val(html.data.id);
                        $('#store_image').html(html.ambilFoto);
                        $('.modal-title').text('Edit Data Product');
                        $('#action_button').val('Edit');
                        $('#action').val('Edit');
                        $('#modalAddEditProduct').modal('show');
                    },
                    error:function(xhr){
                        console.log(xhr.responseText);
                    }
                })
            });

            $('body').on('click', '#delete', function(event){
                event.preventDefault();
                var mid = $(this).data('id');
                var conf = confirm("Are You sure want to delete ?");

                if(conf == true){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin-product') }}" + '/' + mid,
                        data: {id:mid},
                        dataType: "json",
                        success:function(response){
                            console.log(response);
                            $('#show_product_' + mid).remove();
                        },
                        error:function(xhr){
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
            
            // EDIT

            $('body').on('click', '#delete_image', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var conf = confirm("Are You sure want to delete ?");

                if(conf == true){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin-product/delete') }}" + '/' + id,
                        data: {id:id},
                        dataType: "json",
                        success:function(response){
                            console.log(response);
                            $('#img_thumbnail_' + id).remove();
                        },
                        error:function(xhr){
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

@endsection