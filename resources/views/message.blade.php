@foreach($message as $row)
    <div class="row justify-content-center mt-2" id="message_id_{{ $row->id }}">
        <div class="rounded-left" id="left-box">
        </div>
        <div class="card col-md-11 rounded-right" id="inboxCard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <p class="my-auto"><strong>{{ $row->pengirim }}</strong></p>
                        <p class="my-auto">{{ $row->email }}</p>
                    </div>
                    <div class="col-md-2">
                        <div class="row float-right">
                            <a class="btn btn-light mr-3 mt-1 rounded-circle" id="show-message" data-id="{{ $row->id }}"><img class="img-fluid mx-auto my-auto" src="{{ asset('img/IconTriwikramaAppAdmin/read.png') }}" alt="" width="20px" heigth="20px"></a>
                            <a class="btn btn-danger mt-1 rounded-circle" id="delete-message" data-id="{{ $row->id }}"><img class="img-fluid mx-auto my-auto" src="{{ asset('img/IconTriwikramaAppAdmin/white/rubbish-bin2.png') }}" alt="" width="20px" heigth="20px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach