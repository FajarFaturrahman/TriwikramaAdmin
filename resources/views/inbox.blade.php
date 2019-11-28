@extends('layouts.master')

@section('title','Triwikrama | Inbox')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            
            <div class="box col-md-6">
                <form action="{{ url('inbox') }}" method="GET">
                    <div class="forSearch">
                        <span class="icon"><i class="fa fa-search fa-1x"></i></span>
                        <input type="text" name="cari" id="search" placeholder="search">                    
                    </div>                    
                </form>      
            </div>
            

            <div class="col-md-5">
                <div class ="row float-right">
                    <div class="col-4">
                        <p class="text-white mt-2"><strong>SHOW</strong></p>
                    </div>
                    <div class="col-8">
                        <select class="form-control" name="filter[]" id="filter" class="btn m-2 pl-5 pr-5" style="border-radius:100px; background: #fff; color:#0f0f0f;">
                            <option value="semua">All</option>
                            <option value="readed">Readed</option>
                            <option value="not-readed">Not Readed</option>
                        </select>
                    </div>
                    <!-- <div class="dropdown">
                        <button class="btn m-2 pl-5 pr-5 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:100px; background: #fff; color:#0f0f0f;"><strong>All</strong></button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <input type="submit" class="dropdown-item" name="all" value="all" id="all">
                            <input type="submit" class="dropdown-item" name="readed" value="readed" id="readed">
                            <input type="submit" class="dropdown-item" name="not-readed" value="not-readed" id="not">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
        <div class="col-md-12 mt-2 message-container">
            @include('message')
        </div>

        <div class="row justify-content-center mt-3">
            {{ $message->links() }}
        </div>


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
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1"><strong>NAMA</strong></div>
                                    <div class="col-md-11"><p id="nama"></p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"><strong>EMAIL</strong></div>
                                    <div class="col-md-11"><p id="surel"></p></div>
                                </div>
                            </div>
                            <div class="col-md-12"><strong>PESAN </strong></div><br>
                            <div class="col-md-12"><p id="pesan"></p></div>
                            <div class="col-md-12 float-right">
                                <div class="row float-right mr-1 mt-4">
                                    <button class="btn btn-link text-dark mr-2" data-dismiss="modal" aria-label="Close">CANCEL</button>
                                    <input class="btn pl-4 pr-4" type="submit" style="border-radius:100px;background:#550E99;color:white" value="Reply">
                                </div>
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

        // fetch_inbox();

        // function fetch_inbox(query = '')
        // {
        //     $.ajax({
        //         url: "{{ url('inbox') }}",
        //         method: 'GET',
        //         data:{query:query},
        //         dataType: 'json',
        //         success:function(data){
        //             $('#content').html(data.data_inbox);
        //         }
        //     });
        // }

        // $(document).on('keyup', '#search', function(){
        //     var query = $(this).val();
        //     fetch_inbox(query);
        // });

        $('body').on('click', '#show-message', function(event){
            event.preventDefault();
            var mid = $(this).data('id'); 

            $.ajax({
                type: "GET",
                url: "{{ url('inbox') }}" + '/' + mid,
                data: {id:mid},
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('#modalMdTitle').text("Detail Inbox from " + data.pengirim);
                    $('#nama').text(data.pengirim);
                    $('#surel').text(data.email);
                    $('#pesan').text(data.pesan);
                    $('#modalMd').modal('show');    
                },
                error:function(data){
                    $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                }
            });
        });
        
        //Delete Ajax
        $('body').on('click', '#delete-message', function(event){
            event.preventDefault();
            var mid = $(this).data('id');
            var r = confirm("Are You sure want to delete !");
            if(r == true){
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('inbox') }}" + '/' + mid,
                    data: {id:mid},
                    dataType: "json",
                    success:function(response){
                        console.log(response);
                        $('#message_id_' + mid).remove();
                    },
                    error:function(xhr){
                        console.log(xhr.responseText);
                    }
                });
            } else{
                
            }
        });

        //Filter Data With Ajax
        $('body').on('change', '#filter', function(e){
            e.preventDefault();
            var filter = $(this).val();

             $.ajax({
                type: "post",
                data: {status:filter},
                url: "{{ url('inbox/filter') }}" + '/' + filter,
                dataType: "json",
                beforeSend: function(){
                    $(".message-container").html('<center><div class="text-white">Reload data ... </div></center>');
                },
                success: function(data){
                    console.log(data);
                    $(".message-container").html(data);
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });         
        });
        
    });

</script>

@endsection
