var payment_method = "wallet";

$(document).ready(function() {
    base_url = $('#base_url').val();
    csrf_token = $('#csrf_token').val();
    if (!userId) {
        payment_method = "paypal";
    }

    $('#address-form').bootstrapValidator({
        excluded: ':disabled',
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter First Name ...'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Last Name ...'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Email Id ...'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'Invalid Email Id ...'
                    },
                }
            },
            user_address: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Zipcode ...'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Phone Number ...'
                    },
                   
                    regexp: {
                      //  regexp: /^[1-9][0-9]{5,15}$/,
                        regexp:/^[+]*[0-9]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/,
                        message: "Invalid Phone Number ..."
                    },

                    
                 
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Address ...'
                    }
                }
            },
            country_region: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Country ...'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Please Select State ...'
                    }
                }
            },
            town_city: {
                validators: {
                    notEmpty: {
                        message: 'Please Select City ...'
                    }
                }
            },
        }
    }).on('success.form.bv', function(e) {

        var serviceIds = registeredServiceIds();
        // get total service price
        if (serviceIds.length == 0) {
            toaster_msg("error", "Please add service to book !");
            $('#service-add-modal').modal('show');
            return false;
        }

        var booking_date = $("#booking_date").val();
        var booking_time = $("#booking_time").val();
        if (booking_date == "") {
            toaster_msg("error", "Please enter booking date !");
            $("#booking_date").focus();
            return false;
        }
        if (booking_time == "") {
            toaster_msg("error", "Please enter booking time !");
            $("booking_time").focus();
            return false;
        }
        var parts = booking_date.split("/");
        var bookingDate = new Date(parts[2], parts[0] - 1, parts[1]);
        var today = new Date();
        var tomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate()+1);
        if (bookingDate < tomorrow) {
            toaster_msg("error","Please enter valid booking date !");
            $("#booking_date").focus();
            return false;
        }

        if ($("#agree_checkbox_user1:checked").val() == undefined) {
            toaster_msg("error","Please read and check our terms & conditions !");
            $("#agree_checkbox_user1").parent().css("color", "#fb081f");
            return false;
        }

        if (payment_method == "paypal") {
            $("#paypal-button-container").fadeToggle();
            return false;
        }

        var form = $("#address-form").get(0);

        var params = {
            service_ids: JSON.stringify(serviceIds),
            service_date: moment(booking_date).format('YYYY-MM-DD'),
            service_time: booking_time,
            location: form.user_address.value,
            latitude: form.user_latitude.value,
            longitude: form.user_longitude.value,
            notes: form.description.value,
            name: form.name.value,
            country: $("[name='country_region']").val(),
            town: $("[name='town_city']").val(),
            street_addr_1: $("[name='address']").val(),
            phone: $("[name='phone']").val(),
            email: $("[name='email']").val(),
            csrf_token_name: csrf_token
        }

        $.ajax({
            url: base_url + 'user/booking/booking_checkout_complete',
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
                    localStorage.removeItem("checkout_services");
                    swal({
                      title: "Booking Confirmation...",
                      text: "Your booking was booked Successfully ...!",
                      icon: "success",
                      button: "okay",
                      closeOnEsc: false,
                      closeOnClickOutside: false
                    }).then(function() {
                        window.location.href = base_url + 'user-bookings';
                       // window.location.href = base_url + 'generate_invoice';//redirect invoice page
                    });
                }
                else {
                    switch(response.result) {
                        case "ADD_WALLET":
                            toaster_msg("error", response.msg);
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
                  // window.location.reload();
                });
            }
        });

        return false;
    });

    if (bookingData) {

        country_changes(bookingData.booking_country, function() {
            var stateId = bookingData.booking_state;
            $('[name="state"] option[value='+stateId+']').prop('selected', true);
            state_changes(stateId, function() {
                var cityId = bookingData.booking_city;
                $('[name="town_city"] option[value='+cityId+']').prop('selected', true);
            });
        });

    }
    
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate()+1);
        // console.log(tomorrow)
    $('#booking_date').datepicker({
        dateFormat: 'mm/dd/yy',
        minDate: tomorrow,
        icons: {
          up: "fa fa-angle-up",
          down: "fa fa-angle-down",
          next: 'fa fa-angle-right',
          previous: 'fa fa-angle-left'
        },
        onSelect: function(dateText) {
            // console.log(dateText);
            var date = moment(dateText).format('DD MMMM YYYY');
            $("#booking-date").html(date);
        }
    });

    $("#booking-complete").on("click", function() {
        $("#address-form").submit();
        return;
    });

    $("#booking_date").on("change", function() {
        var dateText = $(this).val();
        // console.log(dateText)
        var date = moment(dateText).format('DD MMMM YYYY');
        $("#booking-date").html(date);
    });

    $("#booking_time").on("change", function() {
        // console.log($(this).val());
        var timeText = $(this).val();
        var time = moment("01/01/1900 ".timeText).format("h:mm a");
        $("#booking-time").html(time);
    });

    $("[name='payment_method']").on('change', function() {
        // console.log($(this).val());
        payment_method = $(this).val();
        if (payment_method == "wallet") {
            $("#paypal-button-container").hide();
        }
    });

    var csrf_token = $('#csrf_token').val();
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

    $("select[name='category']").on('change', function() {
        var cate = "cate_"+$(this).val();
        $serviceObj = $("select[name='service']");
        $serviceObj.empty();
        $serviceObj.append("<option value=''>Select Service *</option>");
        $serviceObj.children('option[value=""]').prop("selected", true);
        $('#add_service_form').bootstrapValidator('enableFieldValidators', 'service', 'notEmpty');
        $subCateObj = $("select[name='subcategory']");
        $subCateObj.empty();
        $subCateObj.append("<option value=''>Select Service Type *</option>");
        $subCateObj.children('option[value=""]').prop("selected", true);
        $('#add_service_form').bootstrapValidator('enableFieldValidators', 'subcategory', 'notEmpty');
        var subCategories = subCategoryList[cate];
        if(subCategories) {
            for(var i in subCategories) {
                $subCateObj.append("<option value='"+subCategories[i].id+"'>"+subCategories[i].subcategory_name+"</option>");
            }
        }
    });

    $("select[name='subcategory']").on('change', function() {
        var subCate = "subcate_"+$(this).val();
        $serviceObj = $("select[name='service']");
        $serviceObj.empty();
        $serviceObj.append("<option value=''>Select Service *</option>");
        $serviceObj.children('option[value=""]').prop("selected", true);
        $('#add_service_form').bootstrapValidator('enableFieldValidators', 'service', 'notEmpty');
        var services = serviceList[subCate];
        if(services) {
            for(var i in services) {
                $serviceObj.append("<option value='"+services[i].id+"'>"+services[i].service_title+"</option>");
            }
        }
    });

    $('#add_service_form').bootstrapValidator({
        excluded: ':disabled',
        fields: {
            category: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Service Category ...'
                    }
                }
            },
            subcategory: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Service Type ...'
                    }
                }
            },
            service: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Service ...'
                    }
                }
            },
        }
    }).on('success.form.bv', function(e) {
        
        // console.log($("[name='subcategory']").val());
        var subCateId = $("[name='subcategory']").val();
        if (subCateId == "") {
            toaster_msg("error", "Please Select Service Type ...");
            $("[name='subcategory']").focus().click();
            return false;
        }
        // console.log($("[name='service']").val());
        var serviceId = $("[name='service']").val();
        if (serviceId == "") {
            toaster_msg("error", "Please Select Service ...");
            $("[name='service']").focus().click();
            return false;
        }
        if (addService(subCateId, serviceId)) {
            registerService(subCateId, serviceId);
            calculatePrice();
        }
        $("#service-add-modal .close").click();

        // initialize
        $cateObj = $("select[name='category']");
        $cateObj.children('option[value=""]').prop("selected", true);
        $serviceObj = $("select[name='service']");
        $serviceObj.empty();
        $serviceObj.append("<option value=''>Select Service *</option>");
        $serviceObj.children('option[value=""]').prop("selected", true);
        $subCateObj = $("select[name='subcategory']");
        $subCateObj.empty();
        $subCateObj.append("<option value=''>Select Service Type *</option>");
        $subCateObj.children('option[value=""]').prop("selected", true);
        
        return false;
    });

    $(".duration-item").on("click", function() {
        $(".duration-item.active").removeClass("active");
        $(this).addClass("active");
    });

    $(".extra-service-item").on("click", function() {
        $(".extra-service-item.active").removeClass("active");
        $(this).addClass("active");
    });

    var checkoutServices = registeredServices();
    for (var i = 0; i < checkoutServices.length; i++) {
        addService(checkoutServices[i].subcate_id, checkoutServices[i].service_id);
    }

    calculatePrice();

    // paypal button
    paypal.Buttons({
        createOrder: function(data, actions) {
            showLoader();
            var data = new URLSearchParams();   // not FormData()
            data.append("csrf_token_name", csrf_token);
            var serviceIds = registeredServiceIds();
            data.append("service_ids", JSON.stringify(serviceIds));
            return fetch(base_url+'user/booking/create_paypal_checkout_booking', {
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

                var serviceIds = registeredServiceIds();
                var booking_date = $("#booking_date").val();
                var booking_time = $("#booking_time").val();
                var form = $("#address-form").get(0);
                var params = {
                    service_ids: JSON.stringify(serviceIds),
                    service_date: moment(booking_date).format('YYYY-MM-DD'),
                    service_time: booking_time,
                    location: form.user_address.value,
                    latitude: form.user_latitude.value,
                    longitude: form.user_longitude.value,
                    notes: form.description.value,
                    name: form.name.value,
                    country: $("[name='country_region']").val(),
                    town: $("[name='town_city']").val(),
                    street_addr_1: $("[name='address']").val(),
                    phone: $("[name='phone']").val(),
                    email: $("[name='email']").val(),
                    csrf_token_name: csrf_token
                };

                $.ajax({
                    url: base_url + 'user/booking/booking_checkout_complete_by_paypal/' + details.id,
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
                            localStorage.removeItem("checkout_services");
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
                        booking_button_unloading();
                        swal({
                          title: "Booking Confirmation...",
                          text: "Somethings went to wrong so try later ...!",
                          icon: "error",
                          button: "okay",
                          closeOnEsc: false,
                          closeOnClickOutside: false
                        }).then(function() {
                          // window.location.reload();
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
});

function addService(subCateId, serviceId) {

    var services = serviceList["subcate_"+subCateId];
    if (!services) {
        return false;
    }
    // console.log(services);
    var service = services.find((o, i) => {
        if (o.id === serviceId) {
            return true; // stop searching
        }
    });
    // console.log(service);
    if (!service) {
        return false;
    }
    var html = "";
    html += '<div class="service-item" data-service-id="'+service.id+'" onClick="selectServiceItem(\''+service.id+'\')">';
        html += '<img class="service-img" src="'+base_url+service.thumb_image+'">';
        html += '<div class="service-title-box">';
            html += '<div class="service-title">';
                html += '<span>'+service.service_title+'</span>';
            html += '</div>';
        html += '</div>';
    html += '</div>';
    $(".service-list").append(html);

    html = '<div class="order-item" data-service-id="'+service.id+'">';
        html += '<div class="order-item-close" onClick="removeService(\''+service.id+'\')"><i class="fa fa-times" aria-hidden="true"></i></div>';
        html += '<img class="order-img" src="'+base_url+service.thumb_image+'">';
        html += '<div class="order-title-box">';
            html += '<div class="order-title">';
                html += '<span>'+service.service_title+'</span>';
            html += '</div>';
        html += '</div>';
    html += '</div>';
    $(".order-list").append(html);

    return true;
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

function registeredServiceIds() {
    var checkoutServices = registeredServices();
    var serviceIds = [];
    for (var i = 0; i < checkoutServices.length; i++) {
        var subCateId = checkoutServices[i].subcate_id;
        var serviceId = checkoutServices[i].service_id;
        // var service = getService(subCateId, serviceId);
        // if (service) {
        //     console.log(service);
        // }
        serviceIds.push(serviceId);
    }
    return serviceIds;
}

function calculatePrice() {
    var serviceIds = registeredServiceIds();
    // get total service price
    if (serviceIds.length == 0) {
        return false;
    }
    var csrf_token = $('#csrf_token').val();

    var user_id = "<?php echo $this->session->userdata('id'); ?>";

    var params = {
            service_ids: JSON.stringify(serviceIds),
            csrf_token_name: csrf_token,
           
        };
    $.ajax({
        url: base_url + 'home/get_total_price',
        data: params,
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
            
        },
        success: function(response) {
            // console.log(response);
            var totalPrice = response.user_currency.user_currency_sign+" "+ response.total_price;
            $("#total_price").html(totalPrice);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getService(subCateId, serviceId) {
    var services = serviceList["subcate_"+subCateId];
    // console.log(services);
    var service = services.find((o, i) => {
        if (o.id === serviceId) {
            return true; // stop searching
        }
    });
    return service;
}

function selectServiceItem(serviceId) {
    $(".service-item.active").removeClass("active");
    $(".service-item[data-service-id='"+serviceId+"']").addClass("active");
}

function removeService(serviceId) {
    $(".service-item[data-service-id='"+serviceId+"']").remove();
    $(".order-item[data-service-id='"+serviceId+"']").remove();
    var checkoutServices = registeredServices();
    var removeIndex = checkoutServices.findIndex((service) => {
        if (service.service_id === serviceId) {
            return true; // stop searching
        }
        return false;
    });
    if (removeIndex > -1) {
        checkoutServices.splice(removeIndex, 1);
    }
    // checkoutServices.push({"subcate_id":subCateId, "service_id": serviceId});
    // console.log(checkoutServices);
    localStorage.setItem("checkout_services", JSON.stringify(checkoutServices));

    calculatePrice();
}

function booking_button_loading() {
    var $this = $('#booking-complete');
    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
    if ($this.html() !== loadingText) {
        $this.data('original-text', $this.html());
        $this.html(loadingText).prop('disabled', true).bind('click', false);
    }
}

function booking_button_unloading() {
    var $this = $('#booking-complete');
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

function country_changes(id, func) {
    var country_id=$('[name="country_region"]').val();
    var state_id=$('[name="state"]').val();
    var city_id=$('[name="town_city"]').val();
    var csrf_token = $("#csrf_token").val();
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
                    add +='<option value="">Select State *</option>';
                    $(data).each(function( index,value ) {
                        add +='<option value='+value.id+'>'+value.name+'</option>';
                    });
                    $('[name="state"]').append(add);

                    if(state_id!=''){
                        $('[name="state"] option[value='+state_id+']').attr('selected','selected');
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
    var country_id=$('[name="country_region"]').val();
    var state_id=$('[name="state"]').val();
    var city_id=$('[name="town_city"]').val();
    var csrf_token = $("#csrf_token").val();
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
                    add +='<option value="">Select City *</option>';
                    $(data).each(function( index,value ) {
                        add +='<option value='+value.id+'>'+value.name+'</option>';
                    });
                    $('[name="town_city"]').append(add);
                    if(city_id!=''){
                        $('[name="town_city"] option[value='+city_id+']').attr('selected','selected');
                    }

                    if (func !== undefined) {
                        func();
                    }

                }
            }
        });
    }
}