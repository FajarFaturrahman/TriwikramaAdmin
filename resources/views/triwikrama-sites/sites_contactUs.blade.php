@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

<div class="container-fluid section" id="contact">
     <div class="container">
        <div class="row col-contact">
          <div class="col-md-12">
            <h1 class="text-xs-center wow flipInY" data-wow-delay="1s">Contact Us</h1>
            <p class="text-center">We have experienced more than 8 years. Do not hesitate to ask what your business needs? <br> We will be happy to serve you.</p>
          </div>

          <div class="col-md-6">
            <h4><strong>Input your question below for information about our company:</strong></h4>
            <form action="{{ url('contact') }}" method="post">
            @csrf
              <div class="input-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
              </div>
              <div class="input-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
              <div class="input-group">
                <textarea class="form-control" name="message" placeholder="message"></textarea>
              </div>
              <div class="input-group">
                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}">
                @if($errors->has('g-recaptcha-response'))
                  <span class="invalid-feedback" style="display-block">
                    <strong>{{ $errors->first('g-captcha->response') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <button class="btn btn-inverse col-md-12 wow flipInX" data-wow-delay="3s" type="submit">Submit</button>
            </form>
          </div>

          <div class="col-md-6">
              <br>
              <h4><strong>Contact Information:</strong></h4>
              <div class="row information">

                  <div class="col-xs-4">
                    <i class="fa fa-phone"></i> Phone
                  </div>
                  <div class="col-xs-8">
                    : +628999999
                  </div>
                  <div class="col-xs-4">
                    <i class="fa fa-envelope"></i> Email
                  </div>
                  <div class="col-xs-8">
                    : hrd@triwikrama.co.id
                  </div>
                  <div class="col-xs-4">
                    <i class="fa fa-map-marker"></i> Address
                  </div>
                  <div class="col-xs-8">
                    : Jl Parakansaat
                  </div>
                
              </div>
              <hr>
              <h4><strong>Address location map:</strong></h4>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253497.13516734913!2d107.50307079265457!3d-6.90342901505421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C+Kota+Bandung%2C+Jawa+Barat%2C+Indonesia!5e0!3m2!1sid!2s!4v1506933380824" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
     </div>
</div>

@endsection