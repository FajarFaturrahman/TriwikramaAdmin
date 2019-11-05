@extends('layouts.master')


@section('title','Triwikrama | Detail Portofolio')

@section('content')

    <div class="container mt-5">                
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="row">
                                    <h4>NAME OF THE PORTFOLIO </h4>                        
                                    <pre><h4> || </h4></pre>
                                    <h4 class="text-danger">TYPE OF THE PORFOLIO </h4>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row float-right mr-2">
                                    <a href="{{ route('addPortofolio') }}" class="btn mr-2" id="btnEditPortfolio">
                                        <img src="{{ asset('img/IconTriwikramaAppAdmin/white/pencil-edit-button2.png') }}" width="20px" height="20px" alt="" class="mt-2">
                                    </a>
                                    <button class="btn btn-danger" id="rounded-btn">
                                        <img src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" width="20px" height="20px" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <div class="card-body">
                        <h5><strong>IMAGES</strong></h5>
                        <div class="row">
                            <div class="col-md-3 mt-2">
                                <img src="{{ asset('img/contoh/Loginuat.png') }}" width="225px" height="140px" alt="">                       
                            </div>
                            
                            <div class="col-md-3 mt-2">
                                <img src="{{ asset('img/contoh/Dashboarduat.png') }}" width="225px" height="140px" alt="">                       
                            </div>

                            <div class="col-md-3 mt-2">
                                <img src="{{ asset('img/contoh/Detailuat.png') }}" width="225px" height="140px" alt="">                       
                            </div>

                            <div class="col-md-3 mt-2">
                                <img src="{{ asset('img/contoh/ListUser.png') }}" width="225px" height="140px" alt="">                       
                            </div>                                                        
                        </div>

                        <h5 class="mt-5"><strong>COMPANY INFORMATION</strong></h5>
                        <div class="col-md-12 mt-3">
                            <table class="border-0">
                                <tr>
                                    <td><strong>Website Type</strong></td>
                                    <td>Web App</td>
                                </tr>

                                <tr>
                                    <td><strong>Domain</strong></td>
                                    <td>www.user-acceptance-test.com</td>
                                </tr>

                                <tr>
                                    <td><strong>Created At</strong></td>
                                    <td>24-10-2018</td>
                                </tr>

                                <tr>
                                    <td><strong>STATUS</strong></td>
                                    <td><p class="bg-light mt-3" style="border-radius:100px;">Active</p></td>
                                </tr>
                            </table>
                        </div>
                        
                        <h5 class="mt-5"><strong>DESCRIPTION</strong></h5>
                        <div class="row justify-content-center">
                            <div class="col-md-11 mt-3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>                                
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>            
            
        </div>
        
    </div>

@endsection
