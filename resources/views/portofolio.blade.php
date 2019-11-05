@extends('layouts.master')


@section('title','Triwikrama | Portofolio')

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
                <a class="btn float-right text-white" href="{{ route('addPortofolio') }}" id="btnAddTop"><img src="{{ asset('img/IconTriwikramaAppAdmin/white/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Portofolio</a>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                        <img class="card-img-top" src="{{ asset('img/ImageTriwikramajpg/compressed/forInbox.jpg') }}" alt="image 1">
                        </div>

                        <div class="col-md-7">
                            <h5 class="ml-4"><strong>USER ACCEPTENCE TEST APP</strong></h5>

                            <table class="border-0 mt-2">
                                <tr>
                                    <td><strong>Website Type</strong></td>
                                    <td>:</td>
                                    <td>Web App</td>
                                </tr>

                                <tr>
                                    <td><strong>Domain</strong></td>
                                    <td>:</td>
                                    <td>www.user-acceptance-test.com</td>
                                </tr>

                                <tr>
                                    <td><strong>Created At</strong></td>
                                    <td>:</td>
                                    <td>24-10-2018</td>
                                </tr>
                                <tr>
                                    <td><strong class="">Status</strong></td>
                                    <td><p class="bg-light mt-3 pl-3 pr-3" style="border-radius:100px;">Active</p></td>
                                </tr>
                            </table>
                            <div class="row ml-2 float-right">
                                    <a class="btn btn-danger mr-4" href="{{ route('detailPortofolio') }}">View</a>                                
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
    </div>

@endsection
