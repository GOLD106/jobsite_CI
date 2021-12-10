$(document).ready(function(){
	init();
});

function init() {

    $(".service-box-image").on("click", function() {
      // console.log($(this).attr('link'));
      var link = $(this).attr('link');
      // window.open(link);
      window.location.href = link;
    });

    var key = $("#map_key").val();
    // console.log(key);
    var formattedAddress = "35high street, Briathwell Rotherham, 566 7AW";
    $.get('https://maps.googleapis.com/maps/api/geocode/json',{address:formattedAddress,key:key},function(data, status){
      // console.log(data,status);
      var location = data.results[0].geometry.location;
      // console.log(location)
      initMap(location);
    });

}

function initMap(location) {
    location = location===undefined?{lat:0,lng:0}:location;
    const map = new google.maps.Map(document.getElementById("our-location"), {
        zoom: 10,
        center: location,
    });
    // The marker
    const marker = new google.maps.Marker({
        position: location,
        map: map,
    });
}