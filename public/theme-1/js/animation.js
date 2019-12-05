function aniAbout() {
  var tl = new TimelineLite();
  var section = $('#about-us'),
      ttl1 = section.find(".ttl1"),
      txt2 = section.find(".txt2"),
      ttl2 = section.find(".ttl2"),
      left = section.find(".left-con")
      right = section.find(".right-con")
      ;

  tl
  .from(left,1,{x:"-100%"})
  .from(ttl1,1,{autoAlpha: 0,x:"-100%"})
  .from(ttl2,.5,{autoAlpha: 0})
  .from(txt2,.5,{autoAlpha: 0})
  ;
}

function aniPortfolio() {
  var tl = new TimelineLite();
  var section = $('#portfolio'),
      ttl1 = section.find(".ttl1"),
      txt2 = section.find(".txt2"),
      ttl2 = section.find(".ttl2"),
      left = section.find(".left-con")
      right = section.find(".right-con")
      ;

  tl
  .from(left,1,{x:"-100%"})
  .from(ttl1,1,{autoAlpha: 0,x:"-100%"})
  .from(right,.5,{autoAlpha: 0})
  ;
}
function aniModalPortfolio() {
  var tl = new TimelineLite();
  var section = $('#pModal'),
      slide1 = section.find('.portfolio-slide'),
      mobile = section.find('#resImg'),
      slide2 = section.find('#port2'),
      con2 = section.find('.col-last')
      ;

  tl
  .from(slide1,.4,{x:"-100%",autoAlpha: 0},.5)
  .from(mobile,.4,{autoAlpha: 0,x:"-100%"})
  .from(slide2,.4,{autoAlpha: 0})
  .from(con2,.4,{autoAlpha: 0})
  ;
}
function aniMobilePortfolio() {
  var tl = new TimelineLite();
  var section = $('#pMobile'),
      slide1 = section.find('.portfolio-slide'),
      mobile = section.find('#resImg'),
      slide2 = section.find('#port2'),
      con2 = section.find('.col-last')
      ;

  tl
  .from(slide1,.4,{x:"-100%",autoAlpha: 0},.5)
  .from(con2,.4,{autoAlpha: 0})
  ;
}
var service = $("#service .owl-carousel");
service.owlCarousel({
  items: 1,
  nav: false,
  dots: false,
  loop: true,
  autoplay: true,
  autoplaySpeed: 400,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,

});
service.trigger("refresh.owl.carousel");
function aniFirst(){
  var tl = new TimelineLite();
  var section = $('#web-custom'),
  img1 = section.find('.img1'),
  ttl1 = section.find('.ttl1'),
  txt1 = section.find('.txt1'),
  icons = section.find('.webcos-logo').find('.list-inline-item');

  tl
  .fromTo(ttl1,.5,{y:"-100%", autoAlpha: 0}, {y:"0%", autoAlpha:1})
  .fromTo(txt1,.5,{y:"-100%", autoAlpha: 0}, {y:"0%", autoAlpha:1})
  .fromTo(img1,.5,{x:"100%", autoAlpha: 0}, {x:"0%", autoAlpha:1})
  .staggerFromTo(icons,.5,{x:"100%", autoAlpha: 0},{x:"0%", autoAlpha: 1}, 0.2)
  ;

}

function aniSecond(){
  var tl = new TimelineLite();
  var section = $('#web-app'),
  img1 = $('#web-app .img1'),
  ttl1 = $('#web-app .ttl1'),
  txt1 = $('#web-app .txt1');

  tl
  .from(img1,1,{y:"100%"})
  .fromTo(ttl1,0.5,{y:"-100%", autoAlpha: 0}, {y:"0%", autoAlpha:1})
  .fromTo(txt1,0.5,{y:"-100%", autoAlpha: 0}, {y:"0%", autoAlpha:1})
  ;
}

function aniThird(){
  var tl = new TimelineLite();
  var section = $('#mobile-app'),
  img1 = $('#mobile-app .img1'),
  ttl1 = $('#mobile-app .ttl1'),
  txt1 = $('#mobile-app .txt1');

  tl
  .from(img1,1,{y:"100%"})
  .fromTo(ttl1,0.5,{y:"-100%", autoAlpha: 0}, {y:"0%", autoAlpha:1})
  .fromTo(txt1,0.5,{y:"-100%", autoAlpha: 0}, {y:"0%", autoAlpha:1})
  ;
}

function aniClients(){
  var tl = new TimelineLite();
  var section = $('#client .myclient > li');

  tl
  .staggerFromTo(section,.5,{autoAlpha: 0},{autoAlpha: 1}, 0.2);

}
$(document).ready(function(){

  aniFirst();
  aniClients();
  var page = window.location.pathname;
  if(page == '/?page=clients'){
  }
  service.on('changed.owl.carousel', function(event) {
    var currentItem = event.item.index;

    if(currentItem === 2) {
      aniFirst();
      //alert(currentItem);
      //
      $("#section-icon > li").not("[href=#webcustom]").removeClass("active");
      $("a[href=#webcustom]").parent().addClass("active");
    }
    else if(currentItem === 3) {
      aniSecond();
      //alert(currentItem);
      //
      $("#section-icon > li").not("[href=#webapp]").removeClass("active");
      $("a[href=#webapp]").parent().addClass("active");
    }
    else if(currentItem === 4 || currentItem === 1) {
      aniThird();
      //alert(currentItem);
      //
      $("#section-icon > li").not("[href=#mobileapp]").removeClass("active");
      $("a[href=#mobileapp]").parent().addClass("active");
    }

    

  });

  $('.sr-button').on('click',function(e){
    $('#menunav').toggleClass("sr-toggle");
  });



});
