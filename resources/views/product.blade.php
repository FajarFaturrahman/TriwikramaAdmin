@extends('layouts.master')

@section('title', 'Triwikrama | Product')

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
                <button class="btn float-right text-white" data-toggle="modal" data-target="#modalAddEditProduct" id="btnAddTop"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Product</button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="card-img-top" src="{{ asset('img/contoh/ListUser.png') }}" alt="image 1">
                            </div>

                            <div class="col-md-6">
                                <h3>USER ACCEPTANCE TEST APPLICATION</h3>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>

            <div class="col-md-1">
                <button class="btn pr-4 pl-4 pt-3 pb-3 m-0" style="border-radius:0px;background:#D91E18;color:white">
                    <img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt="">
                </button>
 
                <button class="btn pr-4 pl-4 pt-3 pb-3 m-0" style="border-radius:0px;background:#550E99;color:white" data-toggle="modal" data-target="#modalAddEditProduct">
                    <img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt="">
                </button>    
            </div>
        </div>
    </div>

        <!-- Modal For Add/Edit Client -->

        <div class="modal fade" id="modalAddEditProduct">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">ADD PRODUCT</h4>
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-7">                                
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input  class="form-control mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="product_name" id="product_name">
                                    </div>

                                    <div class="form group">
                                        <label for="description">Description</label>                                        
                                        <textarea class="form-control pb-5 pt-5 mt-3 rounded border-0" style="background-color:#EFF2F4;height:218px;" type="text" id="description"></textarea>
                                    </div>                                                                        
                                </div>  

                                <div class="col-md-5">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <button class="my-float2">
                                                <img src="{{ asset('img/IconTriwikramaAppAdmin/white/photo2.png') }}" width="20px" height="20px">
                                            </button>
                                        </div>                                        
                                    </div>
                                    <hr class="">   
                                    <div class="row float-right mr-3 mt-5">
                                        <button class="btn btn-link text-dark mr-3">CANCEL</button>
                                        <input class="btn pl-4 pr-4" type="submit" style="border-radius:100px;background:#550E99;color:white" value="ADD">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    <!-- end of modal -->
    
@endsection