@extends('layouts.master')


@section('title','Triwikrama | Add Portfolio')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">                
                <div class="card">
                    <div class="card-header">
                        <h4>ADD NEW PORTFOLIO</h4>
                    </div>

                    <div class="card-body">
                        <div class="col-md-11 mx-auto">
                            <div class="form-group mt-4">
                                <label for="app_name"><h5>Application Name</h5></label>
                                <input class="form-control pb-4 pt-4 mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="app_name" id="app_name">
                            </div>

                            <div class="form-group mt-4">
                                <label for="choose_platform"><h5>Choose the platform</h5></label>
                                <select class="form-control rounded border-0 pb-2 pt-2 mt-3" style="background-color:#EFF2F4;height:50px" name="choose_platform" id="choose_platform">
                                    <option value="Web Application">Web Application</option>
                                    <option value="Mobile Application">Mobile Application</option>
                                    <option value="Responsive Web Application">Responsive Web Application</option>
                                </select>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Company Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="col-md-11 mx-auto">
                            <div class="form-group mt-4">
                                <label for="app_type"><h5>Application type</h5></label>
                                <select class="form-control rounded border-0 pb-2 pt-2 mt-3" style="background-color:#EFF2F4;height:50px" name="app_type" id="app_type">
                                    <option value="">Choose Type</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="E-Commerce">E-Commerce</option>
                                    <option value="Mobile App">Mobile App</option>
                                    <option value="Web App">Web App</option>                                
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label for="domain"><h5>Domain</h5></label>
                                <input class="form-control pb-4 pt-4 mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="domain" id="domain">
                            </div>

                            <div class="form-group mt-4">
                                <label for="created_at"><h5>Created At</h5></label>
                                <input class="form-control input-tanggal pb-4 pt-4 mt-3 rounded border-0" style="background-color:#EFF2F4;" type="text" name="created_at" id="created_at">                                
                            </div>
                        </div>        
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" id="upload-image">
                    <div class="card-header">
                        <h4>UPLOAD WEB IMAGE</h4>
                    </div>

                    <div class="card-body">
                        <button class="my-float">
                            <img src="{{ asset('img/IconTriwikramaAppAdmin/white/photo2.png') }}" width="20px" height="20px">
                        </button>
                    </div>
                </div>

                <div class="card mt-4" id="upload-image">
                    <div class="card-header">
                        <h4>UPLOAD MOBILE IMAGE</h4>
                    </div>

                    <div class="card-body">
                        <button class="my-float">
                            <img src="{{ asset('img/IconTriwikramaAppAdmin/white/photo2.png') }}" width="20px" height="20px">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" id="descAndClient">
                    <div class="card-header">
                        <h4>DESCRIPTION</h4>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12 mx-auto">
                            <div class="form-group">
                                <input class="form-control pb-4 pt-4 mt-3 rounded border-0" style="background-color:#EFF2F4;height:150px;" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" id="descAndClient">                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="choose_client"><h5>Choose The Client</h5></label>
                                    <select class="form-control rounded border-0 pb-2 pt-2 mt-3" style="background-color:#EFF2F4;height:50px" name="choose_client" id="choose_client">
                                        <option value="">Choose Type</option>
                                        <option value="Telkom">Telkom</option>
                                        <option value="Wall's">Wall's</option>
                                        <option value="KLHK">KLHK</option>
                                        <option value="Jungle Land">Jungle Land</option>                                
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <h5>Status</h5>
                                <div class="form-check">                                    
                                    <input type="radio" class="form-check-input" id="active">
                                    <label for="active" class="form-check-label mr-5">Active</label>
                                                
                                    <input type="radio" class="form-check-input" id="expired">
                                    <label for="Expired" class="form-check-label">Expired</label>
                                </div>

                                <div class="row float-right mt-4 mr-3">
                                    <button class="btn mr-3">Cancel</button>
                                    <button class="btn pr-3 pl-3" style="border-radius:100px;background:#550E99;color:white">ADD</button>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
        $(function(){
             $(".input-tanggal").datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
    </script>
@endsection    
