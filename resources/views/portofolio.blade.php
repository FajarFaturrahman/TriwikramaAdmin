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
                <a class="btn float-right text-white" href="{{ route('addPortofolio') }}" id="btnAddTop"><img src="{{ asset('img/IconTriwikramaAppAdmin/add2.png') }}" width="20px" height="20px" alt="" class="mr-1">Add Portofolio</a>
            </div>
        </div>

        <div class="row">
            
        </div>
    </div>

@endsection
