// (function ($) {
//   $.each(['show', 'hide'], function (i, ev) {
//     var el = $.fn[ev];
//     $.fn[ev] = function () {
//       this.trigger(ev);
//       return el.apply(this, arguments);
//     };
//   });
// })(jQuery);

$(document).ready(function() {
	// initialize_footer();

});

function initialize_footer() {
	// postal code
	var input = document.getElementById('p_code');
	var options = {
		// types: ['address']
		types: ['geocode']
	};
	autocomplete = new google.maps.places.Autocomplete(input, options);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		console.log(place);
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

}