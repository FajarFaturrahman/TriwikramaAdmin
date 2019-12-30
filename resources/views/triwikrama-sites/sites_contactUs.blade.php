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
            <form action="{{ url('contact') }}" method="post" id="form-contact">
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
                <div class="g-recaptcha" data-sitekey="6Lft9MoUAAAAAAMSE7XRWwlXMHfnpagmmPHbXhOV"></div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Perhatian</strong>
                      <br/>
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif             
              </div>
              <button class="btn btn-inverse col-md-12 wow flipInX" data-wow-delay="3s" type="submit">Submit</button>
            </form>
          </div>

          <div class="col-md-6">
              <br>
              <h4><strong>Contact Information:</strong></h4>
              <div class="row information ml-2 mb-1">

                  <div class="col-xs-4">
                    <i class="fa fa-phone"></i> Phone
                  </div>
                  <div class="col-xs-8">
                    : +628999999
                  </div>
              
              </div>
              <div class="row information ml-2 mb-1">

                  <div class="col-xs-4">
                    <i class="fa fa-envelope"></i> Email
                  </div>
                  <div class="col-xs-8">
                    : hrd@triwikrama.co.id
                  </div>

              </div>
              <div class="row information ml-2 mb-1">

                  <div class="col-xs-4">
                    <i class="fa fa-map-marker"></i> Address
                  </div>
                  <div class="col-xs-8">
                    : Jl Parakansaat
                  </div>
                  
              </div>
                  
                
              
              <hr>
              <h4><strong>Address location map:</strong></h4>
              <iframe src="https://maps.google.com/maps?q=Jalan Kavling Damri I, Cipadung Kidul, Bandung City, West Java&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
     </div>
</div>

@endsection

@section('js')

  <script>
     $(function(){
      $('#form-contact').submit(function(event){
        var verified = grecaptcha.getResponse();
        if(verified.length === 0){
          event.preventDefault();
        }
      });
    });
  </script>
@endsection