@extends('triwikrama-sites.sites-layout.sites_master')

@section('content')

<section class="section" id="portfolio">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 left-con">
        <div class="col-left">
          <div class="fl-left">
            <h2 class="ttl1">PORTFOLIO <br><small>THE PROJECT WE'VE DONE</small></h2>
            <div class="fselect">
              <select name="pfilter" id="pfilter" class="form-control btn-filter" onchange="pFilter($(this))">
                <option value="*" disabled selected>-- Filter --</option>
                <option value="*">All</option>
                <option value=".corporate">Corporate</option>
                <option value=".e-commerce">E-Commerce</option>
                <option value=".web-app">Web App</option>
                <option value=".mobile-app">Mobile App</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 right-con">
        <div class="col-right">
          <div class="row">

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con web-app">
	              <a href="#pModal" class="p-col" data-toggle="modal" data-target="#pModal" role="button">
	                <img src="http://triwikrama.co.id/images/project.png" alt="">
	              </a>
	              <span>Web App</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con corporate">
	              <a href="#pModal" class="p-col" data-toggle="modal" data-target="#pModal" role="button">
	                <img src="http://triwikrama.co.id/images/project.png" alt="">
	              </a>
	              <span>Corporate</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con e-commerce">
	              <a href="#pModal" class="p-col" data-toggle="modal" data-target="#pModal" role="button">
	                <img src="http://triwikrama.co.id/images/project.png" alt="">
	              </a>
	              <span>E-Commerce</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con mobile-app">
	              <a href="#pMobile" class="p-col" data-toggle="modal" role="button">
	                <img src="http://triwikrama.co.id/images/mobile.png" alt="">
	              </a>
	              <span>Mobile App</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con web-app">
	              <a href="#pModal" class="p-col" data-toggle="modal" data-target="#pModal" role="button">
	                <img src="http://triwikrama.co.id/images/project.png" alt="">
	              </a>
	              <span>Web App</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con corporate">
	              <a href="#pModal" class="p-col" data-toggle="modal" data-target="#pModal" role="button">
	                <img src="http://triwikrama.co.id/images/project.png" alt="">
	              </a>
	              <span>Corporate</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con e-commerce">
	              <a href="#pModal" class="p-col" data-toggle="modal" data-target="#pModal" role="button">
	                <img src="http://triwikrama.co.id/images/project.png" alt="">
	              </a>
	              <span>E-Commerce</span>
	            </div>

	          	<div class="col-md-3 col-sm-4 col-xs-12 p-con mobile-app">
	              <a href="#pMobile" class="p-col" data-toggle="modal" role="button">
	                <img src="http://triwikrama.co.id/images/mobile.png" alt="">
	              </a>
	              <span>Mobile App</span>
	            </div>


          </div>
          <center class="c-div">
            <button class="btn btn-default btn-loadmore">
              More Project
            </button>
          </center>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade modal-portfolio" id="pModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 col-first">
              <div class="portfolio-slide">
                <div id="port1" class="owl-carousel owl-theme port1">
                  <div class="item">
                    <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                  </div>
                  <div class="item">
                    <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                  </div>
                  <div class="item">
                    <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                  </div>
                  <div class="item">
                    <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                  </div>

                </div>

                <div class="responsive-slide" id="resImg">
                  <img src="//via.placeholder.com/412x679/dddddd/333333" alt="">
                </div>
              </div>

              <div id="port2" class="owl-carousel owl-theme hidden port2">
                <div class="item">
                  <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                </div>
                <div class="item">
                  <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                </div>
                <div class="item">
                  <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                </div>
                <div class="item">
                  <img src="http://triwikrama.co.id/images/senpom.jpg" alt="">
                </div>

              </div>


            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 col-last">
              <h5 class="top">WEBSITE</h5>
              <h4 class="top">SENTRALPOMPA</h4>
              <br>
              <div class="attribut clearfix">
              </div>
              <h6>Company Information</h6>
              <div class="row">
                <div class="col-4">Website Type</div>
                <div class="col-8">: E-Commerce</div>
                <div class="col-4">Domain</div>
                <div class="col-8">: www.sentralpompa.com</div>
                <div class="col-4">Project Created</div>
                <div class="col-8">: 20 April 2009</div>

              </div>
              <br>
              <h6>Description</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

              <a href="#" class="btn btn-danger">Visit Website</a>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="modal fade modal-portfolio" id="pMobile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 col-first">
              <div class="portfolio-slide">
                <div class="owl-carousel owl-theme port1">
                  <div class="item">
                    <img src="//via.placeholder.com/412x679/666666/dddddd" alt="">
                  </div>
                  <div class="item">
                    <img src="//via.placeholder.com/412x679/666666/dddddd" alt="">
                  </div>
                  <div class="item">
                    <img src="//via.placeholder.com/412x679/666666/dddddd" alt="">
                  </div>
                  <div class="item">
                    <img src="//via.placeholder.com/412x679/666666/dddddd" alt="">
                  </div>

                </div>


              </div>




            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 col-last">
              <h5 class="top">MOBILE APP</h5>
              <h4 class="top">INDISCUB</h4>
              <br>
              <div class="attribut clearfix">
              </div>
              <h6>Company Information</h6>
              <div class="row">
                <div class="col-4">Mobile App Type</div>
                <div class="col-8">: E-Commerce</div>
                <div class="col-4">Domain</div>
                <div class="col-8">: www.indiscub.com</div>
                <div class="col-4">Project Created</div>
                <div class="col-8">: 20 April 2017</div>

              </div>
              <br>
              <h6>Description</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

              <a href="#" class="btn btn-danger">Visit Website</a>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@section('js')

<script type="text/javascript">
        $(document).ready(function() {
        aniPortfolio();
      });
  
  </script>
@endsection