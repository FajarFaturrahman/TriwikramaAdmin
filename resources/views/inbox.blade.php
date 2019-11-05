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
            <div class="row justify-content-center">
                <div class="rounded-left" id="left-box">
                </div>
                <div class="card col-md-11 rounded-right" id="right-box">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <p class="my-auto"><strong>Rashif Malik Ilyasa</strong></p>
                                <p class="my-auto">malikutama30@gmail.com</p>
                            </div>
                            <div class="col-md-2">
                                <div class="row float-right">
                                    <button class="btn btn-light mr-3 mt-1 rounded-circle" id="buttonSize" data-toggle="modal" data-target="#detailInboxModal"><img class="img-fluid mx-auto my-auto" src="{{ asset('img/IconTriwikramaAppAdmin/read.png') }}" alt="" width="20px" heigth="20px"></button>
                                    <button class="btn btn-danger mt-1 rounded-circle" id="buttonSize2"><img class="img-fluid mx-auto my-auto" src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" alt="" width="20px" heigth="20px"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="detailInboxModal" tabindex="-1" role="dialog" aria-labelledby="detailInboxModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Inbox</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                           <div class="col-md-2">
                               <p><strong>Name :</strong></p>
                           </div>
                           <div class="col-md-10">
                               <p>Rashif Malik Ilyasa</p>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-2">
                               <p><strong>Email :</strong></p>
                           </div>
                           <div class="col-md-10">
                               <p>malikutama30@gmail.com</p>
                           </div>
                       </div>
                       <p><strong>Message :</strong></p>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                       <div class="row float-right mr-3 mt-5">
                           <button class="btn btn-link text-dark mr-3"data-dismiss="modal" aria-label="Close">Cancel</button>
                           <button class="btn pr-4 pl-4" style="border-radius: 100px; background: #550E99; color: #fff;">Reply</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection