@extends('layouts.master')

@section('title','Triwikrama | Client')

@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="box col-md-6">
                <div class="forSearch">
                    <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                    <input type="search" name="search" id="search" placeholder="search">
                </div>
            </div>

            <div class="col-md-6">
                <button type="button" class="btn float-right text-white" name="create_data" id="create_data"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Client</button>
            </div>
        </div>

        <div class="row mt-5">
            @foreach($client as $row)
            <div class="col-md-3 mt-2" id="show_client_{{ $row->id }}">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ URL::to('/') }}/images/{{ $row->gambar_client }}" class="card-img-top" height="240px" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a href="#" type="button" name="edit" id="{{ $row->id }}" class="edit btn-danger"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">                                                            
                                <a href="#" id="delete" data-id="{{ $row->id }}" class="delete"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt=""><a>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="text-center text-white">{{ $row->nama_client }}</h5>
            </div>  
            @endforeach          
        </div>        
    </div>


    <!-- Modal For Add/Edit Client -->

        <div class="modal fade" id="formModal" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD CLIENT</h4>
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">
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
                                        <img class="bg-light" src="{{ asset('img/IconTriwikramaAppAdmin/black/photo.png') }}" width="100px" height="100px" alt="">
                                        <span id="store_image"></span>
                                    </div>    
                                    <div class="row justify-content-center">
                                        <div class="form-group">                                        
                                            <input type="file" class="btn btn-danger font-weight-bold" style="background: #D91E18;" id="gambar_client" name="gambar_client">
                                        </div>                                    
                                    </div>
                                </div>  

                                <div class="col-md-7">                                                    
                                    <div class="form-group">
                                        <label for="nama_client">Client Name</label>
                                        <input  class="form-control mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="nama_client" id="nama_client">
                                    </div>

                                    <div class="form group">
                                        <label for="portfolio_info">Portfolio Info</label>
                                        <div class="row" id="portfolio_info">                                           
                                        </div>
                                    </div>

                                    <div class="row float-right mr-3 mt-5">                                        
                                        <button class="btn btn-link text-dark mr-3" data-dismiss="modal">CANCEL</button>
                                        <input type="hidden" name="action" id="action">
                                        <input type="hidden" name="hidden_id" id="hidden_id">
                                        <input type="submit" name="action_button" id="action_button" class="btn pl-4 pr-4 upload-image" style="border-radius:100px;background:#550E99;color:white" value="ADD">
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
                    url : "{{ route('client.store') }}",
                    method: "POST",
                    data : new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
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
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();                  
                            $('#formModal').modal('hide');          
                            $("#show_client_").load("{{ url('client') }}");
                        }
                        $('#form_result').html(html);
                    }
                });
            }

            if($('#action').val()=="Edit")
            {
                $.ajax({
                    url: "{{ url('client') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
                    success:function(response)
                    {
                        var html ='';
                        if(response.errors)
                        {
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < response.errors.length; count++)
                            {
                                html += '<p>' + response.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">' + response.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#store_image').html('');                            
                            $("#show_client_").load("ClientController.php");
                        }
                        $('#form_result').html(html);
                    }
                })
            }
        });

        $('body').on('click', '#delete', function(event){
            event.preventDefault();
            var mid = $(this).data('id');
            confirm("Are You sure want to delete ?");

            $.ajax({
                type: "DELETE",
                url: "{{ url('client') }}" + '/' + mid,
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
        });

    });

    </script>
@endsection