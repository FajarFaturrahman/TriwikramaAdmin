@extends('layouts.master')

@section('title','Triwikrama | Client')

@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="box col-md-6">
                <form action="{{ url('admin-client') }}" method="GET">
                    <div class="forSearch">
                        <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                        <input type="text" name="cari" id="search" placeholder="search">                    
                    </div>                    
                </form>    
            </div>
            <div class="col-md-6">
                <button type="button" class="btn float-right text-white btn-add" name="create_data" id="create_data" style="width: 150px; height: 40px; border-radius: 100px; margin-top: 10px; font-size: 14px;"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="16px" height="16px" alt="" class="mr-2">ADD CLIENT</button>
            </div>
        </div>
        <div class="row mt-3" id="tampil">
            @foreach($client as $row)
            <div class="col-md-3 mt-4" id="show_client_{{ $row->id }}">
                <div class="card border-0" id="cardOverlay">
                    <div class="row justify-content-center" style="height: 240px;">
                        <div class="col-12">
                            <img src="{{ URL::to('/') }}/resizedImages/{{ $row->gambar_client }}" class="img-fluid mx-auto d-block card-img-top" style="padding: 60px;" alt="">
                        </div>
                    </div>
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-4">
                                <a href="#" name="edit" data-id="{{ $row->id }}" class="edit"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                            <div class="col-4">
                                <a href="{{ url('/admin-portofolio/' . $row->id . '/portofolio') }}"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                            <div class="col-4">                                                            
                                <a href="#" id="delete" data-id="{{ $row->id }}" class="delete"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt=""><a>                                
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center text-white mt-4" style="font-size: 18px;">{{ $row->nama_client }}</p>
            </div>  
            @endforeach          
        </div>
        
        
        <div class="row justify-content-center mt-2">
            {{ $client->links() }}
        </div>
        
    </div>

    <!-- Modal For Add/Edit Client -->

    <div class="modal fade" id="formModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD CLIENT</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="Close" id="iconCancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                    
                <div class="modal-body">                        
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" enctype="multipart/form-data">    
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row justify-content-center">                                        
                                    <span id="store_image"><img src="{{ URL::to('/') }}/img/IconTriwikramaAppAdmin/black/photo.png" width="160" style="opacity: 40%;" class="img-thumbnail p-4" /></span>
                                </div>      
                                <div class="row" style="position: absolute; bottom: 0;">
                                    <div class="col-3">
                                        <label class="btn-file-lab p-3 mt-2" id="con">
                                            <img id="img-client" src="{{ URL::to('/') }}/img/IconTriwikramaAppAdmin/white/photo2.png" width="25px" alt="">
                                            <input type="file" style="display: none;" id="gambar_client" name="gambar_client">
                                        </label>
                                    </div>
                                    <div class="col-9 p-4">
                                        <span id="file-selected" class="">click the button to add a file</span>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-7">                                                    
                                <div class="form-group">
                                    <label for="nama_client">Client Name</label>
                                    <input  class="form-control mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="nama_client" id="nama_client">
                                </div>
                                <div class="form-group">                                        
                                    <input class="switch-input mt-3 rounded border-0" style="background-color:#EFF2F4;" type="checkbox" value="1" name="client_highlight" id="highlight">
                                    <label for="highlight">Highlight</label>
                                </div>
                                <div class="form group">
                                    <label for="portfolio_info">Portfolio Info</label>
                                    <div class="row justify-content-center">                                        
                                        <span id="store_portofolio"></span>
                                    </div>
                                    <div class="row float-right mr-3 mt-5">                                        
                                        <button class="btn btn-link text-dark mr-3" data-dismiss="modal" id="buttonCancel">CANCEL</button>
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
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#gambar_client').bind('change', function(e){
                var filename = e.target.files[0].name;
                var fileimage =  URL.createObjectURL(event.target.files[0]);
                $('#file-selected').html(filename);
                $('#store_image').html('<img src="'+fileimage+'" width="160" class="img-thumbnail p-4"/>');
            });

            $("#buttonCancel").click(function(){
                $("#sample_form")[0].reset();
                $("#store_image").html('<img src="{{ URL::to("/") }}/img/IconTriwikramaAppAdmin/black/photo.png" width="160" style="opacity: 40%;" class="img-thumbnail p-4" />');
                $("#file-selected").html('click the button to add a file');
                $("#store-portofolio").html('');
                $(".alert").remove();
            });

            $("#iconCancel").click(function(){
                $("#sample_form")[0].reset();
                $("#store_image").html('<img src="{{ URL::to("/") }}/img/IconTriwikramaAppAdmin/black/photo.png" width="160" style="opacity: 40%;" class="img-thumbnail p-4" />');
                $("#file-selected").html('click the button to add a file');
            });

            $('#create_data').click(function(){
                $('.modal-title').text("ADD CLIENT");
                $('#action_button').val("Add");
                $('#action').val("Add");
                $('#formModal').modal('show');
            });

            $('#sample_form').on('submit', function(event){
                event.preventDefault();
                if($('#action').val() == 'Add')
                {
                    $.ajax({
                        url : "{{ route('admin-client.store') }}",
                        method: "POST",
                        data : new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType:'json',
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
                                
                                $('#sample_form')[0].reset();                  
                                $('#formModal').modal('hide');          
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
                        url: "{{ route('admin-client.update') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success:function(data)
                        {
                            var html ='';
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
                                $('#sample_form')[0].reset();
                                $('#store_image').html('');
                                $('#formModal').modal('hide');                            
                                location.reload()
                            }
                            $('#form_result').html(html);
                        },
                        error:function(xhr){
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

            $(document).on('click', '.edit', function(){
                var mid = $(this).data('id');            
                $('#form_result').html('');
                $.ajax({                    
                    url:"/admin-client/"+mid+"/edit",
                    dataType: 'json',
                    success:function(html){
                        console.log(html);                        
                        $('#nama_client').val(html.data.nama_client);
                        $('#store_image').html("<img src={{ URL::to('/') }}/resizedImages/" + html.data.gambar_client + " width='160' class='img-thumbnail p-4' />");
                        $('#store_image').append("<input type='hidden' name='hidden_image' value='" + html.data.gambar_client + "'>");
                        $('#hidden_id').val(html.data.id);                        
                        $('#store_portofolio').html(html.ambilPortofolio);
                        $('#highlight').prop("checked", html.data.client_highlight);
                        $('.modal-title').text('Edit Data Client');
                        $('#action_button').val('Edit');
                        $('#action').val('Edit');
                        $('#formModal').modal('show');
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
                        url: "{{ url('admin-client') }}" + '/' + mid,
                        data: {id:mid},
                        dataType: 'json',
                        success:function(response){
                            console.log(response);
                            $('#show_client_' + mid).remove();
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