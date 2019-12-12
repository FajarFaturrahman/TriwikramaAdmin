var $grid = $('#portfolio .right-con .row').isotope({
  itemSelector: '.p-con',
  layoutMode: 'fitRows'
});
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};
function pFilter(that) {
	
   	
 	
  // get filter value from option value
  var filterValue = that.val();
  
  
  
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  console.log($grid);
  $grid.isotope({ filter: filterValue });

}





var prodOwl = $('#products .product-slide .owl-carousel');

prodOwl.owlCarousel({
	center: true,
	items: 3,
	// loop: true,
	
});


$(".btn-close").on("click",function () {
  $("#products .product-slide").toggleClass("ciut");
  $("#products .product-slide-content").toggleClass("show");
});

$("#prodModal").on("hide.bs.modal",function () {
  $("#products .product-slide").removeClass("ciut");  
});
$(".owl-prev").on("click",function () {
  prodOwl.trigger('prev.owl.carousel');
  // alert("1");
});
$(".owl-next").on("click",function () {
  prodOwl.trigger('next.owl.carousel');
  // alert("2");
});

prodOwl.on('changed.owl.carousel', function (property) {
  var current = property.item.index;
  var data = $(property.target).find(".owl-item").eq(current).find(".item").data('detail');
  // var str_sub = src.substr(src.lastIndexOf(".jpg"));
  // var res = src.replace(str_sub, "-r.jpg");
  // var image = $("#resImg img");
  $(".owl-toggle").attr("data-detail",data);
  console.log(data);
});




$("#pMobile").on('shown.bs.modal',function(){
  var mobile = $("#pMobile .owl-carousel");
  mobile.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: false,
    autoplay: true,
    loop: true,
    dots: false,
    responsiveRefreshRate : 200
  });

});
$("#pModal").on('shown.bs.modal',function(){
  var port1 = $("#port1");
  var port2 = $("#port2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

  port1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: false,
    autoplay: true,
    loop: true,
    dots: false,
    responsiveRefreshRate : 200
  }).on('changed.owl.carousel', syncPosition);

  port2
  .on('initialized.owl.carousel', function () {
    port2.find(".owl-item").eq(0).addClass("current");
  })
  .owlCarousel({
    items : slidesPerPage,
    dots: false,
    autoplay: false,
    nav: true,
    margin: 10,
    smartSpeed: 200,
    slideSpeed : 2000,
    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    responsiveRefreshRate : 100
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;

    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);

    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }

    //end block

    port2
    .find(".owl-item")
    .removeClass("current")
    .eq(current)
    .addClass("current");
    var onscreen = port2.find('.owl-item.active').length - 1;
    var start = port2.find('.owl-item.active').first().index();
    var end = port2.find('.owl-item.active').last().index();

    if (current > end) {
      port2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      port2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      port1.data('owl.carousel').to(number, 100, true);
    }
  }

  port2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    port1.data('owl.carousel').to(number, 300, true);
  });
  port1.on('changed.owl.carousel',function(property){
    var current = property.item.index;
    var src = $(property.target).find(".owl-item").eq(current).find("img").attr('src');
    // var str_sub = src.substr(src.lastIndexOf(".jpg"));
    // var res = src.replace(str_sub, "-r.jpg");
    var image = $("#resImg img");
    // alert(res);
    image.fadeOut('fast', function () {
      image.attr('src', res);
      image.fadeIn('fast');
    });
  });
});
$("#pModal").on('show.bs.modal',function(){
	
  aniModalPortfolio();
});
$("#pMobile").on('show.bs.modal',function(){
  aniMobilePortfolio();
});

$("#prodModal").on("shown.bs.modal",function(){
  $(this).attr("class","modal fadeIn animated")
});
$("#prodModal").on("hidden.bs.modal",function(){
  $(this).attr("class", "modal fadeOut animated")

});

// pFilter($("#pfilter"));
$(document).ready(function() {
  
});
