$(document).ready(function(){

  init();

  $(window).resize(function() {
    resize();
  });

});

function resize() {
  $(".tazzer-second-header .nav-info-item").show();
  var second_header_navbar_width = $(".tazzer-second-header .navbar").width();
  var header_navbar_rht_width = $(".tazzer-second-header .header-navbar-rht").width();
  var navbar_header_width = $(".tazzer-second-header .navbar-header").width();
  if (second_header_navbar_width - navbar_header_width < header_navbar_rht_width + 30 ) {
    $(".tazzer-second-header .nav-info-item").hide();
  }
  else {
    $(".tazzer-second-header .nav-info-item").show();
  }
}

resize();

function init() {

}



