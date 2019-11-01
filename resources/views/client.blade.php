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
                <button class="btn float-right text-white" id="btnAddTop"><img src="{{ asset('img/IconTriwikramaAppAdmin/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Client</button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/telkom.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/walls.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/klhk.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0" id="cardOverlay">
                    <img src="{{ asset('img/ImageTriwikramapng/jungleland.png') }}" class="card-img-top" alt="">
                    <div class="overlay">
                        <div class="row mx-auto" id="slideup">
                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/pencil-edit-button2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/list2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>

                            <div class="col-md-4">
                                <a href="#"><img src="{{ asset('img/IconTriwikramaAppAdmin/rubbish-bin2.png') }}" width="20px" height="20px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection