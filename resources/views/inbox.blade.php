@extends('layouts.master')

@section('title','Triwikrama | Inbox')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="box col-md-6">
                <div class="forSearch">
                    <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                    <input type="search" name="search" id="search" placeholder="search">
                </div>
            </div>
            <div class="col-md-5">
                <div class ="row float-right">
                    <p class="text-white mt-3"><strong>SHOW</strong></p>
                    <div class="dropdown">
                        <button class="btn m-2 pl-5 pr-5 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:100px; background: #fff; color:#0f0f0f;"><strong>All</strong></button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">All</a>
                            <a class="dropdown-item" href="#">Readed</a>
                            <a class="dropdown-item" href="#">Not Readed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 mt-2">

            @foreach($message as $row)

            <div class="row justify-content-center mt-2" id="message_id_{{ $row->id }}">                
                <div class="rounded-left" id="left-box">
                </div>
                <div class="card col-md-11 rounded-right" id="inboxCard">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <p class="my-auto"><strong>{{ $row->pengirim }}</strong></p>
                                <p class="my-auto">{{ $row->email }}</p>
                            </div>
                            <div class="col-md-2">
                                <div class="row float-right">
                                    <button href="javascript:void(0)" class="btn btn-light mr-3 mt-1 rounded-circle" id="show-message" data-target-id="{{ $row->id }}" data-toggle="modal" data-target="#modalMd"><img class="img-fluid mx-auto my-auto" src="{{ asset('img/IconTriwikramaAppAdmin/read.png') }}" alt="" width="20px" heigth="20px"></button>
                                    <button href="javascript:void(0)" class="btn btn-danger mt-1 rounded-circle" id="delete-message" data-target-id="{{ $row->id }}"><img class="img-fluid mx-auto my-auto" src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" alt="" width="20px" heigth="20px"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>

            @endforeach

        </div>

        {{ $message->links() }}

        <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalMdTitle">Detail Inbox</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="modalMdContent">                           
                            <p id="nama"></p>
                            <p id="surel"></p>
                            <p id="pesan"></p>
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
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '#show-message', function(){
        var message_id = $('#show-message').data('target_id');
        $('#modalMdTitle').html('Detail Inbox');
        $.get('inbox/'+message_id+'/edit', function(data){
            console.log(data);
            $('#modalMd').modal('show');
            $('#nama').html(data.pengirim);
            $('#surel').html(data.email);
            $('#pesan').html(data.pesan);
        });
    });
    $('body').on('click', '#delete-message', function () {
        var message_id = $('#delete-message').data('target_id');
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ url('inbox')}}"+'/'+message_id,
            success: function (data) {
                $("#message_id_" + message_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }); 
});

</script>

@endsection
