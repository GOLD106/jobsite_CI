$(document).ready(function () {
	base_url=$('#base_url').val();
	BASE_URL=$('#base_url').val();
	csrf_token=$('#csrf_token').val();
	csrfName=$('#csrfName').val();
	csrfHash=$('#csrfHash').val();

	country_id=user_address.country_id;
	state_id=user_address.state_id;
	city_id=user_address.city_id;

	minimumAge = 15;

	$(".birthdaypicker").datepicker({
		dateFormat: 'dd-mm-yy',
		maxDate: new Date(),
		changeMonth: true,
		changeYear: true,
		yearRange: '1945:' + (new Date).getFullYear(),
		onSelect: function(dateText) {
      $(this).change();
      $('#update_user').bootstrapValidator('revalidateField', 'dob');
    }
	});

	country_changes(country_id, function() {
      $('#state_id option[value='+state_id+']').prop('selected', true);
      state_changes(state_id, function() {
          $('#city_id option[value='+city_id+']').prop('selected', true);
      });
  });

	$('.openfile').on('click',function(){
    openfile();
  }); 
  $('#country_id').on('change',function(){
   	var id=$(this).val();
    country_changes(id);
  });  
  $('#state_id').on('change',function(){
   	var id=$(this).val();
    state_changes(id);
  }); 

  $('#update_user').bootstrapValidator({
    fields: {
      dob: {
        validators: {
          notEmpty: {
            message: 'Please enter your date of birth'
          }
        }
      },
      address: {
        validators: {
          notEmpty: {
            message: 'Please enter your address'
          }
        }
      },
      country_id: {
        validators: {
          notEmpty: {
            message: 'Please select country'
          }
        }
      },
      state_id: {
        validators: {
          notEmpty: {
            message: 'Please select state'
          }
        }
      },
      city_id: {
        validators: {
          notEmpty: {
            message: 'Please select city'
          }
        }
      },
      pincode: {
        validators: {
          notEmpty: {
            message: 'Please enter postal code'
          }
        }
      },
    }
  }).on('success.form.bv', function(e) {
  	var today = new Date();
  	var thisYear = today.getFullYear();
  	var dob = $("[name='dob']").val();
  	var parts = dob.split("-");
		var dobDate = new Date(parts[2], parts[1] - 1, parts[0], 0, 0, 0);
		if (dobDate > today) {
			toaster_msg("error", "Please enter valid date of birth!");
			$("[name='dob']").focus();
			return false;
		}
		if (thisYear - dobDate.getFullYear() < minimumAge) {
			toaster_msg("error", "Minium Age is "+minimumAge+" !");
			setTimeout(function() {
				swal({
	        title: "Please Confirm",
	        text: "please confirm if you have the legal age to work in this country",
	        icon: "info",
	        button: "okay",
	        closeOnEsc: false,
	        closeOnClickOutside: false
	      }).then(function() {});
			}, 5000);
			$("[name='dob']").focus();
			return false;
		}
  	return true;
  });
});

function country_changes(id, func) {
	var country_id=$('#country_id_value').val();
	var state_id=$('#state_id_value').val();
	var city_id=$('#city_id_value').val();
	if(id!=''){
		$.ajax({
			type: "POST",
			url: base_url+"user/service/get_state_details",
			data:{id:id,csrf_token_name:csrf_token}, 
			dataType:'json',
			beforeSend :function(){
				$('#state_id').find("option:eq(0)").html("Please wait..");
			}, 
			success: function (data) {
				$('#state_id option').remove();
				if(data!=''){
					var add='';
					add +='<option value="">Select State</option>';
					$(data).each(function( index,value ) {
						add +='<option value='+value.id+'>'+value.name+'</option>';
					});
					$('#state_id').append(add);

					if(state_id!=''){
						$('#state_id option[value='+state_id+']').attr('selected','selected');
					}

					if (func !== undefined) {
              func();
          }

				}
			}
		});
	}
}

function state_changes(id, func) { 
	var country_id=$('#country_id_value').val();
	var state_id=$('#state_id_value').val();
	var city_id=$('#city_id_value').val();
	if(id!=''){
		$.ajax({
			type: "POST",
			url: base_url+"user/service/get_city_details",
			data:{id:id,csrf_token_name:csrf_token}, 
			dataType:'json',
			beforeSend :function(){
				$('#city_id').find("option:eq(0)").html("Please wait..");
			}, 
			success: function (data) {
				$('#city_id option').remove();
				if(data!=''){
					var add='';
					add +='<option value="">Select City</option>';
					$(data).each(function( index,value ) {
						add +='<option value='+value.id+'>'+value.name+'</option>';
					});
					$('#city_id').append(add);
					if(city_id!=''){
						$('#city_id option[value='+city_id+']').attr('selected','selected');
					}

					if (func !== undefined) {
              func();
          }

				}
			}
		});
	}
}