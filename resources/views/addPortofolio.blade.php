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

            </div>
        </div>
    </div>
    

@endsection

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
        $(function(){
             $(".input-tanggal").datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
    </script>
@endsection    
