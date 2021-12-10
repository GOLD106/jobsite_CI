$(document).ready(function() {
	initialize();
});

function initialize_1() {
    // Create the autocomplete object, restricting the search
    // to geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
    	/** @type {HTMLInputElement} */
    	(document.getElementById('p_code')), {
    		types: ['geocode']
    	});
    // console.log(autocomplete.getBounds());
    autocomplete.addListener('place_changed', get_latitude_longitude);
}

function initialize() {
	// postal code
	var input = document.getElementById('p_code');
	var options = {
		// types: ['address']
		types: ['geocode']
	};
	autocomplete = new google.maps.places.Autocomplete(input, options);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		// console.log(place);
		for (var i = 0; i < place.address_components.length; i++) {
		  for (var j = 0; j < place.address_components[i].types.length; j++) {
		    if (place.address_components[i].types[j] == "postal_code") {
		      // document.getElementById('p_code').innerHTML = place.address_components[i].long_name;
		      $('#p_code').val(place.address_components[i].long_name)
		    }
		  }
		}
	});

	// mail send postal code
	var input2 = document.getElementById('p_postal_code');
	autocomplete2 = new google.maps.places.Autocomplete(input2, options);
	google.maps.event.addListener(autocomplete2, 'place_changed', function() {
		var place = autocomplete2.getPlace();
		for (var i = 0; i < place.address_components.length; i++) {
		  for (var j = 0; j < place.address_components[i].types.length; j++) {
		    if (place.address_components[i].types[j] == "postal_code") {
		      // document.getElementById('p_code').innerHTML = place.address_components[i].long_name;
		      $('#p_postal_code').val(place.address_components[i].long_name)
		    }
		  }
		}
	});
	
	current_location();
}

function get_latitude_longitude() {
	// Get the place details from the autocomplete object.
	var place = autocomplete.getPlace();
	console.log(place);
	var formattedAddress = place.formatted_address;
	
	var key = $("#map_key").val();
	$.get('https://maps.googleapis.com/maps/api/geocode/json',{address:formattedAddress, key:key},function(data, status){
		var addressInfo = data.results[0].address_components;
		// console.log(addressInfo);
		$(data.results).each(function(key,value){
			console.log(key, value);
			 $('#p_code').val(place.formatted_address);
		});
	});
}

function current_location() {
	console.log("current_location");
	if (navigator.geolocation) {
		var options = {
		  enableHighAccuracy: true,
		  timeout: 5000,
		  maximumAge: 0
		};

		function success(pos) {
		  var crd = pos.coords;
		  console.log('Your current position is:');
		  console.log(`Latitude : ${crd.latitude}`);
		  console.log(`Longitude: ${crd.longitude}`);
		  console.log(`More or less ${crd.accuracy} meters.`);
		}

		function error(err) {
		  console.warn(`ERROR(${err.code}): ${err.message}`);
		}

		navigator.geolocation.getCurrentPosition(showPosition, error, options);
	}
	else {
		toaster_msg("Geolocation is not supported by this browser.");
	}

	function showPosition(position) {
		// console.log(position);
		var latitude = position.coords.latitude;
		var longitude = position.coords.longitude;
		var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'latLng': latlng }, function (results, status) {

			if (status == google.maps.GeocoderStatus.OK) {
				console.log(results);
				var place = results[0];

				for (var i = 0; i < place.address_components.length; i++) {
				  for (var j = 0; j < place.address_components[i].types.length; j++) {
				  	var address_type = place.address_components[i].types[j];

				  	switch(address_type) {
				  		case "route":
				  			$('#st_address').val(place.address_components[i].long_name);
				      		break;
				      	case "administrative_area_level_2":
				  			$('#st_address').val(place.address_components[i].long_name);
				      		break;
				      	case "administrative_area_level_1":
				  			$('#c_city').val(place.address_components[i].long_name);
				      		break;
				  		case "country":
				  			$('#p_province').val(place.address_components[i].long_name);
				      		break;
				  		case "postal_code":
				  			$('#p_postal_code').val(place.address_components[i].long_name);
				      		$('#p_code').val(place.address_components[i].long_name);
				      		break;
				  	}
				  }
				}
				
			}
		});
	}
}