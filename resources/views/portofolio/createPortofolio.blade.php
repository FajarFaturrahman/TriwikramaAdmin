@extends('layouts.master')


@section('title','Triwikrama | Add Portfolio')

@section('content')


<div class="container mt-5">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Perhatian</strong>
        <br />
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="file-upload-form" action="{{ url('portofolio', @$portofolio->id) }}" class="uploader" method="post"
        accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
        @if(!empty($portofolio))
        @method('PATCH')
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>ADD NEW PORTFOLIO</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-11 mx-auto">
                            <div class="form-group mt-4">
                                <label for="nama_aplikasi">
                                    <h5>Application Name</h5>
                                </label>
                                <input class="form-control pb-4 pt-4 mt-3 rounded border-0" type="text"
                                    name="nama_aplikasi" id="app_name"
                                    value="{{ old('nama_aplikasi', @$portofolio->nama_aplikasi) }}"
                                    style="background-color:#EFF2F4;">
                            </div>

                            <div class="form-group mt-4">
                                <label for="platform">
                                    <h5>Choose the platform</h5>
                                </label>
                                <select class="form-control rounded border-0 pb-2 pt-2 mt-3"
                                    style="background-color:#EFF2F4;height:50px" name="platform" id="choose_platform">
                                    <option value="Web Application"
                                        {{ old('platform', @$portofolio->platform) == 'Web Application' ? 'selected' : '' }}>
                                        Web Application</option>
                                    <option value="Mobile Application"
                                        {{ old('platform', @$portofolio->platform) == 'Mobile Application' ? 'selected' : '' }}>
                                        Mobile Application</option>
                                    <option value="Responsive Web Application"
                                        {{ old('platform', @$portofolio->platform) == 'Responsive Web Application' ? 'selected' : '' }}>
                                        Responsive Web Application</option>
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
                                <label for="tipe_website">
                                    <h5>Application type</h5>
                                </label>
                                <select class="form-control rounded border-0 pb-2 pt-2 mt-3"
                                    style="background-color:#EFF2F4;height:50px" name="tipe_website" id="tipe_website">
                                    <option value=""
                                        {{ old('tipe_website', @$portofolio->tipe_website) == '' ? 'selected' : '' }}>
                                        Choose Type</option>
                                    <option value="Corporate"
                                        {{ old('tipe_website', @$portofolio->tipe_website) == 'Corporate' ? 'selected' : '' }}>
                                        Corporate</option>
                                    <option value="E-Commerce"
                                        {{ old('tipe_website', @$portofolio->tipe_website) == 'E-Commerce' ? 'selected' : '' }}>
                                        E-Commerce</option>
                                    <option value="Mobile App"
                                        {{ old('tipe_website', @$portofolio->tipe_website) == 'Mobile App' ? 'selected' : '' }}>
                                        Mobile App</option>
                                    <option value="Web App"
                                        {{ old('tipe_website', @$portofolio->tipe_website) == 'Web App' ? 'selected' : '' }}>
                                        Web App</option>
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label for="domain_portofolio">
                                    <h5>Domain</h5>
                                </label>
                                <input class="form-control pb-4 pt-4 mt-3 rounded border-0"
                                    value="{{ old('domain_portofolio', @$portofolio->domain_portofolio) }}" type="text"
                                    name="domain_portofolio" id="domain_portofolio" style="background-color:#EFF2F4;">
                            </div>

                            <div class="form-group mt-4">
                                <label for="tanggal_dibuat">
                                    <h5>Created At</h5>
                                </label>
                                <input class="form-control input-tanggal pb-4 pt-4 mt-3 rounded border-0"
                                    value="{{ old('tanggal_dibuat', @$portofolio->tanggal_dibuat) }}" type="date"
                                    name="tanggal_dibuat" id="tanggal_dibuat" style="background-color:#EFF2F4;">
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

                        <div class="input-group control-group increment1">
                            <input type="file" name="gambar_website[]" class="form-control">
                            <input type="hidden" name="hidden_image" value="@$portofolio->gambarWeb">
                            <div class="input-group-btn">
                                <button class="btn btn-success" id="btn-success" type="button"><i
                                        class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                        </div>

                        <div class="clone1 d-none">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="gambar_website[]" class="form-control">
                                <input type="hidden" name="hidden_image" value="">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" id="btn-danger" type="button"><i
                                            class="glyphicon glyphicon-remove"></i>Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4" id="upload-image">
                    <div class="card-header">
                        <h4>UPLOAD MOBILE IMAGE</h4>
                    </div>

                    <div class="card-body">
                        <div class="input-group control-group increment2">
                            <input type="file" name="gambar_mobile[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" id="btn-success2" type="button"><i
                                        class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                        </div>

                        <div class="clone2 d-none">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="gambar_mobile[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" id="btn-danger2" type="button"><i
                                            class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>
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
                                <textarea class="form-control pb-4 pt-4 mt-3 rounded border-0" type="text"
                                    name="description"
                                    style="background-color:#EFF2F4;height:150px;">{{ old('description', @$portofolio->description) }}</textarea>
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
                                    <label for="id_client">
                                        <h5>Choose The Client</h5>
                                    </label>
                                    <select class="form-control rounded border-0 pb-2 pt-2 mt-3"
                                        style="background-color:#EFF2F4;height:50px" name="id_client" id="id_client">
                                        <option value=""
                                            {{ old('id_client', @$portofolio->id_client) == '' ? 'selected' : '' }}>
                                            Choose Client</option>
                                        @foreach($client as $client)
                                        <option value="{{ $client->id }}"
                                            {{ old('id_client', @$portofolio->id_client) == '@$client->nama_client' ? 'selected' : '' }}>
                                            {{ $client->nama_client }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <h5>Status</h5>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" value="active"
                                        id="active"
                                        {{ old('status', @$portofolio->status) == 'active' ? 'checked' : '' }}>
                                    <label for="active" class="form-check-label mr-5">Active</label>

                                    <input type="radio" class="form-check-input" name="status" value="expired"
                                        id="expired">
                                    <label for="Expired" class="form-check-label">Expired</label>
                                </div>

                                <div class="row float-right mt-4 mr-3">
                                    <button class="btn btn-link text-dark mr-3">Cancel</button>
                                    <button type="submit" class="btn pr-4 pl-4"
                                        style="border-radius:100px;background:#550E99;color:white">ADD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Edit Gambar Website -->


@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-success").click(function () {
            var html = $(".clone1").html();
            $(".increment1").after(html);
        });

        $("body").on('click', "#btn-danger", function () {
            $(this).parents(".control-group").remove();
        });

        $("#btn-success2").click(function () {
            var html = $(".clone2").html();
            $(".increment2").after(html);
        });

        $("body").on('click', "#btn-danger2", function () {
            $(this).parents(".control-group").remove();
        });
    });

</script>
@endsection
