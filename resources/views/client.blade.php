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
                <button class="btn float-right text-white" data-toggle="modal" data-target="#modalAddEditClient" id="btnAddTop"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Client</button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3 mt-2">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/telkom.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#modalAddEditClient" ><img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/walls.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#modalAddEditClient" ><img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/klhk.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#modalAddEditClient" ><img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/jungleland.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#modalAddEditClient" ><img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal For Add/Edit Client -->

        <div class="modal fade" id="modalAddEditClient">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">ADD CLIENT</h4>
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row justify-content-center">
                                    <img class="bg-light" src="{{ asset('img/IconTriwikramaAppAdmin/black/photo.png') }}" width="100px" height="100px" alt="">
                                </div>    
                                <div class="row justify-content-center">
                                    <button class="btn btn-danger font-weight-bold" style="background: #D91E18;">Open File Location</button>
                                </div>
                            </div>  

                            <div class="col-md-7">
                                <form action="">
                                    <div class="form-group">
                                        <label for="client_name">Client Name</label>
                                        <input  class="form-control mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="client_name" id="client_name">
                                    </div>

                                    <div class="form group">
                                        <label for="portfolio_info">Portfolio Info</label>
                                        <div class="row" id="portfolio_info">
                                            <p class="bg-light mt-3 ml-3" style="border-radius:100px;">Walls Coorporate App</p>
                                            <p class="bg-light mt-3 ml-3" style="border-radius:100px;">Walls Admin</p>                                        
                                        </div>
                                    </div>

                                    <div class="row float-right mr-3 mt-5">
                                        <button class="btn btn-link text-dark mr-3">CANCEL</button>
                                        <button class="btn pl-4 pr-4" style="border-radius:100px;background:#550E99;color:white">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end of modal -->
@endsection