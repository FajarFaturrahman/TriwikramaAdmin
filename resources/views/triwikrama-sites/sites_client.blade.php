@extends('triwikrama-sites.sites-layout.sites-master')

@section('content')

<section class="section" id="client">
  <div class="container">
    <h2 class="client-title text-center">Our Clients</h2>
    <ul class="list-inline myclient row">
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/beacukai.png">
        </a>
        <h4>DJ bea dan cukai</h4>
        <h5>KPPBC TMP A Bandung</h5>
        <h5>KPPBC TMP C Amamapare</h5>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/telkom.png">
        </a>
        <h4>Telkom Indonesia</h4>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/jungleland.png">
        </a>
        <h4>Jungleland Adventure Park Theme Sentul</h4>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/dpmtsp.png">
        </a>
        <h4>DPMPTSP</h4>
        <h5>Pemerintahan Kota Bandung</h5>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/indonesia-tourism-investment.png">
        </a>
        <h4>Indonesia Tourism Investment</h4>
        <h5>Kementerian Pariwisata RI</h5>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/bplhd.png">
        </a>
        <h4>BPLHD</h4>
        <h5>DKI Jakarta</h5>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/walls.png">
        </a>
        <h4>Wall's</h4>
        <h5>PT. Prima Rasa Abadi </h5>
        <h5>PT. Prima Rasa Utama </h5>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/giz.png">
        </a>
        <h4>Deutsche Gesellschaff fur Internationale Zusammenarbeit</h4>

      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/klhk.png">
        </a>
        <h4>Kementerian Lingkungan Hidup dan Kehutanan</h4>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/bpjs-ketenagakerjaan.png">
        </a>
        <h4>BPJS Ketenagakerjaan</h4>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/sentralpompa.png">
        </a>
        <h4>Sentralpompa</h4>
      </li>
      <li>
        <a href="#/">
          <img src="<?php echo$assets;?>img/logo/amira-tour.png">
        </a>
        <h4>Amira Tour</h4>
      </li>





    </ul>
    <center class="c-div">
      <button class="btn btn-default btn-loadmore">
        More Client
      </button>
    </center>
  </div>
</section>


@endsection
