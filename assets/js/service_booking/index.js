var payment_method = "wallet";

$(document).ready(function() {
    base_url = $('#base_url').val();
    csrf_token = $('#csrf_token').val();

    $(".promo-code-apply").on("click", function() {
        var promoCode = $("input[name='promo_code']").val();
        if (promoCode.trim() == "") {
            toastrAlert("Please input promotion code!");
            $("input[name='promo_code']").focus();
            return;
        }
        var postData = {csrf_token_name:csrf_token,code:promoCode};
        $.post(base_url+"promo-code-check", postData, function(response) {
            var response = JSON.parse(response);
            switch(response.result) {
                case "NONE":
                    toastrAlert("This Promotion Code doesn't exist!");
                    $("input[name='promo_code']").focus();
                    break;
                case "OK":
                    var promotionData = response.data;
                    
                    break;
            }
        });
    });

    // for (var i = 0; i < countryList.length; i++) {
    //     var option = "<option value='"+countryList[i].code+"'>"+countryList[i].name+"</option>";
    //     $("select[name='country_region']").append(option);
    // }
    $('[name="country_region"]').on('change',function(){
        var id=$(this).val();
        country_changes(id);
    });  
    $('[name="state"]').on('change',function(){
        var id=$(this).val();
        state_changes(id);
    });

    $("[name='payment_method'][value='"+payment_method+"']").attr("checked", true);

    $("#paypal-button-container").hide();

    $(".service-mode").on('click', function() {
        $(".service-mode.active").removeClass("active");
        $(".service-mode input[checked]").attr("checked", false);
        $(this).addClass("active");
        $(this).find("input[type='checkbox']").attr("checked", true);
    });

    $(".duration-box").on('click', function() {
        $(".duration-box.active").removeClass("active");
        $(this).addClass("active");
    });

    $("#address-form").on("submit", function(event) {
        var form = $(this).get(0);
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    $("#booking-complete").on("click", function() {
        // $("#address-form").submit();
        var addressForm = $("#address-form").get(0);
        if (!addressForm.checkValidity()) {
            // addressForm.classList.add("was-validated");
            $(addressForm).addClass("was-validated");
            return;
        }
        // var bookingDate = bookingData['booking_date'];
        // var bookingTime = bookingData['booking_time'];
        // console.log(payment_method);
        // return;
        if (payment_method == "paypal") {
            $("#paypal-button-container").fadeToggle();
            return;
        }

        var params = {
            service_id: service.id,
            provider_id: service.user_id,
            service_date: bookingData['booking_date'],
            service_time: bookingData['booking_time'],
            amount: serviceAmount,
            currency_code: userCurrencyCode,
            location: bookingData['booking_user_address'],
            latitude: bookingData['booking_user_latitude'],
            longitude: bookingData['booking_user_longitude'],
            notes: bookingData['booking_description'],
            first_name: bookingData['booking_first_name'],
            last_name: bookingData['booking_last_name'],
            country: $("[name='country_region']").val(),
            town: $("[name='town_city']").val(),
            street_addr_1: $("[name='street_address_1']").val(),
            street_addr_2: $("[name='street_address_2']").val(),
            phone: $("[name='phone']").val(),
            email: $("[name='email']").val(),
            csrf_token_name: csrf_token
        }

        $.ajax({
            url: base_url + 'user/booking/booking_complete',
            data: params,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                booking_button_loading();
            },
            success: function(response) {
            	// console.log("success");
            	booking_button_unloading();
            	if (response.success) {
	                swal({
	                  title: "Booking Confirmation...",
	                  text: "Your booking was booked Successfully ...!",
	                  icon: "success",
	                  button: "okay",
	                  closeOnEsc: false,
	                  closeOnClickOutside: false
	                }).then(function() {
	                  window.location.href = base_url + 'user-bookings';
	                });
            	}
                else {
                	switch(response.result) {
                		case "ADD_WALLET":
                            toaster_msg("error", response.msg);
                            // swal({
                            //   title: "Alert",
                            //   text: response.msg,
                            //   icon: "info",
                            //   button: "okay",
                            //   closeOnEsc: false,
                            //   closeOnClickOutside: false
                            // }).then(function() {
                            //     window.location.href = base_url+"user-wallet"; 
                            // });
                			/*setTimeout(function () {
					           window.location.href = base_url+"user-wallet";  
					        }, 1000);*/
                		break;
                        default:
                            toaster_msg("error", response.msg);
                        break;
                	}
                }
            },
            error: function(error) {
            	booking_button_unloading();
                swal({
                  title: "Booking Confirmation...",
                  text: "Somethings went to wrong so try later ...!",
                  icon: "error",
                  button: "okay",
                  closeOnEsc: false,
                  closeOnClickOutside: false
                }).then(function() {
                  window.location.reload();
                });
            }
        });
    });

    $("#booking-continue").on("click", function() {

        var addressForm = $("#address-form").get(0);
        if (!addressForm.checkValidity()) {
            // addressForm.classList.add("was-validated");
            $(addressForm).addClass("was-validated");
            return;
        }

        var params = {
            service_id: service.id,
            provider_id: service.user_id,
            first_name: $("[name='first_name']").val(),
            last_name: $("[name='last_name']").val(),
            country: $("[name='country_region']").val(),
            state: $("[name='state']").val(),
            city: $("[name='town_city']").val(),
            street_addr_1: $("[name='street_address_1']").val(),
            street_addr_2: $("[name='street_address_2']").val(),
            phone: $("[name='phone']").val(),
            email: $("[name='email']").val(),
            csrf_token_name: csrf_token
        }

        $.ajax({
            url: base_url + 'home/save_booking_session',
            data: params,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                booking_button_loading("#booking-continue");
            },
            success: function(response) {
                // console.log("success");
                if (response.success) {
                    var bookingData = response.booking_data;
                    registerService(bookingData.subcate_id, bookingData.service_id);
                    window.location.href = base_url + 'service-checkout';
                }
                else {
                    booking_button_unloading("#booking-continue");
                    toaster_msg("error", response.msg);
                }
            },
            error: function(error) {
                booking_button_unloading("#booking-continue");
                swal({
                  title: "Booking Confirmation...",
                  text: "Somethings went to wrong so try later ...!",
                  icon: "error",
                  button: "okay",
                  closeOnEsc: false,
                  closeOnClickOutside: false
                }).then(function() {
                  window.location.reload();
                });
            }
        });
    });

    $("[name='payment_method']").on('change', function() {
        // console.log($(this).val());
        payment_method = $(this).val();
        if (payment_method == "wallet") {
            $("#paypal-button-container").hide();
        }
    });

    // paypal button
    paypal.Buttons({
      createOrder: function(data, actions) {
          showLoader();
          var data = new URLSearchParams();   // not FormData()
          data.append("csrf_token_name", csrf_token);
          data.append("service_id", service.id);
          data.append("provider_id", service.user_id);
          data.append("amount", serviceAmount);
          data.append("currency_code", userCurrencyCode);
          return fetch(base_url+'user/booking/create_paypal_booking', {
              method: 'post',
              headers: {
                'content-type': 'application/x-www-form-urlencoded'
              },
              body: data
          }).then(function(res) {
              return res.json();
          }).then(function(data) {
              // console.log(data.id) // Use the key sent by your server's response, ex. 'id' or 'token'
              hideLoader();
              return data.id;
          })
          .catch(function(error) {
            console.log("Error getting document:", error);
            hideLoader();
          });
      },
      onApprove: function(data, actions) {
        showLoader();
        var params = new URLSearchParams();   // not FormData()
        params.append("csrf_token_name", csrf_token);
        params.append('order_id', data.orderID);
        return fetch(base_url+'user/booking/capture_paypal_booking', {
          method: "post",
          headers: {
            'content-type': 'application/x-www-form-urlencoded'
          },
          body: params
        }).then(function(res) {
          return res.json();
        }).then(function(details) {
          hideLoader();
          // console.log(details.payer.name.given_name);
          // alert('Transaction funds captured from ' + details.payer.name.given_name);
          // check for INSTRUMENT_DECLINED and restart OnApprove if true
          if (details.error === 'INSTRUMENT_DECLINED') {
            return actions.restart();
          }
          // window.location.href = base_url+'user/booking/paypal_booking_success/'+details.id;
            var params = {
                service_id: service.id,
                provider_id: service.user_id,
                service_date: bookingData['booking_date'],
                service_time: bookingData['booking_time'],
                amount: serviceAmount,
                currency_code: userCurrencyCode,
                location: bookingData['booking_user_address'],
                latitude: bookingData['booking_user_latitude'],
                longitude: bookingData['booking_user_longitude'],
                notes: bookingData['booking_description'],
                first_name: bookingData['booking_first_name'],
                last_name: bookingData['booking_last_name'],
                country: $("[name='country_region']").val(),
                town: $("[name='town_city']").val(),
                street_addr_1: $("[name='street_address_1']").val(),
                street_addr_2: $("[name='street_address_2']").val(),
                phone: $("[name='phone']").val(),
                email: $("[name='email']").val(),
                csrf_token_name: csrf_token
            }

            $.ajax({
                url: base_url + 'user/booking/booking_complete_by_paypal/' + details.id,
                data: params,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function() {
                    booking_button_loading();
                    $("#paypal-button-container").hide();
                },
                success: function(response) {
                    // console.log("success");
                    booking_button_unloading();
                    if (response.success) {
                        swal({
                          title: "Booking Confirmation...",
                          text: "Your booking was booked Successfully ...!",
                          icon: "success",
                          button: "okay",
                          closeOnEsc: false,
                          closeOnClickOutside: false
                        }).then(function() {
                          window.location.href = base_url + 'user-bookings';
                        });
                    }
                    else {
                        switch(response.result) {
                            default:
                                toaster_msg("error", response.msg);
                            break;
                        }
                    }
                },
                error: function(error) {
                    // console.log("error")
                    booking_button_unloading();
                    swal({
                      title: "Booking Confirmation...",
                      text: "Somethings went to wrong so try later ...!",
                      icon: "error",
                      button: "okay",
                      closeOnEsc: false,
                      closeOnClickOutside: false
                    }).then(function() {
                      window.location.reload();
                    });
                }
            });
        })
        .catch(function(error) {
          console.log("Error getting document:", error);
          hideLoader();
        });
      }
    }).render('#paypal-button-container'); // Display payment options on your web page

    initialize(); // Geo
});

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
		
		for (var i = 0; i < place.address_components.length; i++) {
		  for (var j = 0; j < place.address_components[i].types.length; j++) {
		    if (place.address_components[i].types[j] == "postal_code") {
		      // document.getElementById('p_code').innerHTML = place.address_components[i].long_name;
		      $('#p_code').val(place.address_components[i].long_name)
			  
		    }
		  }
		}
	});	
	
	current_location();
}

function get_latitude_longitude() {
	// Get the place details from the autocomplete object.
	var place = autocomplete.getPlace();
	
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
    //	console.log("current_location");
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
                //	console.log(results);
                    var place = results[0];
    
                    var str = JSON.stringify(place);
    
                    console.log("place  " + str);
    
                    for (var i = 0; i < place.address_components.length; i++) {
                      for (var j = 0; j < place.address_components[i].types.length; j++) {
                          var address_type = place.address_components[i].types[j];
    
                          switch(address_type) {
                              case "route":
                                  $('#st_address').val(place.address_components[i].long_name);
                                  break;
                              case "administrative_area_level_2":
                                  $('#c_town').val(place.address_components[i].long_name);
                                  break;
                              case "administrative_area_level_1":
                                  $('#c_city').val(place.address_components[i].long_name);
                                  break;
                              case "country":
                                  $('#c_country').val(place.address_components[i].long_name);
                                  break;
                              case "postal_code":
                                  $('#p_postal_code').val(place.address_components[i].long_name);
                                  $('#p_code').val(place.address_components[i].long_name);
                                  break;
                          }
                      }
                    }
                    $('#c_st_address1').val(place.formatted_address);
                    
                }
            });
        }
    }



function registerService(subCateId, serviceId) {
    var checkoutServices = registeredServices();
    checkoutServices.push({"subcate_id":subCateId, "service_id": serviceId});
    // console.log(checkoutServices);
    localStorage.setItem("checkout_services", JSON.stringify(checkoutServices));
}

function registeredServices() {
    var checkoutServices = [];
    if (localStorage.getItem("checkout_services") !== null) {
        try {
            checkoutServices = JSON.parse(localStorage.getItem("checkout_services"));
        } catch {
            localStorage.removeItem("checkout_services");
        }
    }
    return checkoutServices;
}

function booking_button_loading(id) {
    var $this = $('#booking-complete');
    if (id !== undefined) {
        $this = $(id);   
    }
    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
    if ($this.html() !== loadingText) {
        $this.data('original-text', $this.html());
        $this.html(loadingText).prop('disabled', true).bind('click', false);
    }
}

function booking_button_unloading(id) {
    var $this = $('#booking-complete');
    if (id !== undefined) {
        $this = $(id);
    }
    $this.html($this.data('original-text')).prop('disabled', false);
    // $this.prop("disabled", false);
}

function toastrAlert(msg) {
    setTimeout(function () {
        Command: toastr['error'](msg);
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-left",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "2000",
          "hideDuration": "3000",
          "timeOut": "3000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }   
    }, 100);
}

function country_changes(id) {
    var country_id=$('[name="country_region"]').val();
    var state_id=$('[name="state"]').val();
    var city_id=$('[name="town_city"]').val();
    if(id!=''){
        $.ajax({
            type: "POST",
            url: base_url+"user/service/get_state_details",
            data:{id:id,csrf_token_name:csrf_token}, 
            dataType:'json',
            beforeSend :function(){
                $('[name="state"]').find("option:eq(0)").html("Please wait..");
            }, 
            success: function (data) {
                $('[name="state"] option').remove();
                if(data!=''){
                    var add='';
                    add +='<option value="">Select State</option>';
                    $(data).each(function( index,value ) {
                        add +='<option value='+value.id+'>'+value.name+'</option>';
                    });
                    $('[name="state"]').append(add);

                    if(state_id!=''){
                        $('[name="state"] option[value='+state_id+']').attr('selected','selected');
                    }

                }
            }
        });
    }
}

function state_changes(id) { 
    var country_id=$('[name="country_region"]').val();
    var state_id=$('[name="state"]').val();
    var city_id=$('[name="town_city"]').val();
    if(id!=''){
        $.ajax({
            type: "POST",
            url: base_url+"user/service/get_city_details",
            data:{id:id,csrf_token_name:csrf_token}, 
            dataType:'json',
            beforeSend :function(){
                $('[name="town_city"]').find("option:eq(0)").html("Please wait..");
            }, 
            success: function (data) {
                $('[name="town_city"] option').remove();
                if(data!=''){
                    var add='';
                    add +='<option value="">Select City</option>';
                    $(data).each(function( index,value ) {
                        add +='<option value='+value.id+'>'+value.name+'</option>';
                    });
                    $('[name="town_city"]').append(add);
                    if(city_id!=''){
                        $('[name="town_city"] option[value='+city_id+']').attr('selected','selected');
                    }
                }
            }
        });
    }
}