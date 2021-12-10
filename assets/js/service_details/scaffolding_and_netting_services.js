$(document).ready(function() {

	projectDone = 159;
	happyClients = 2500;

	$("#project-done").text(projectDone+"+");
	$("#happy-clients").text(happyClients+"+");

	setInterval( function() {
		if (getRandomInt(100) % 6 === 0) {
			projectDone ++;
			$("#project-done").slideUp(500, function() {
				$("#project-done").text(projectDone+"+");
				$("#project-done").slideDown(500);
			});
		}
	}, 4000);

	setInterval( function() {
		if (getRandomInt(100) % 5 === 0) {
			happyClients ++;
			$("#happy-clients").slideUp(800, function() {
				$("#happy-clients").text(happyClients+"+");
				$("#happy-clients").slideDown(800);
			});
		}
	}, 3000);

	init();
	
	// var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
	// Array.prototype.slice.call(forms).forEach((form) => {
	// 	form.addEventListener('submit', (event) => {
	// 	  if (!form.checkValidity()) {
	// 		event.preventDefault();
	// 		event.stopPropagation();
	// 	  }
	// 	  form.classList.add('was-validated');
	// 	}, false);
	// });

	$("select[name='sub_category']").on('change', function() {
		// console.log($(this).val())
		var subCate = "subcate_"+$(this).val();
		$serviceObj = $("select[name='service']");
		$serviceObj.empty();
		$serviceObj.append("<option value=''>Select Service</option>");
		var services = serviceList[subCate];
		if(services) {
			for(var i in services) {
				$serviceObj.append("<option value='"+services[i].id+"'>"+services[i].service_title+"</option>");
			}
		}
	});

	$("form#get_service").on("submit", function(event) {
		var form = $(this).get(0);
		if (!form.checkValidity()) {
			event.preventDefault();
			event.stopPropagation();
		}
		else {
			// console.log(form.date.value);
			var booking_date = form.date.value;
			var parts = booking_date.split("-");
			var booking_date = new Date(parts[2], parts[1] - 1, parts[0]);
			var today = new Date();
			var tomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate()+1);
			// console.log(booking_date, tomorrow);
			if (booking_date < tomorrow) {
				event.preventDefault();
				event.stopPropagation();
				toaster_msg("error","Please enter valid booking date !");
				$(form.date).focus();
				return false;
			}
			var phone_number = form.phone_number.value;
			// console.log(phone_number);
			if (phone_number.length < 5) {
				event.preventDefault();
				event.stopPropagation();
				toaster_msg("error","Please enter valid phone number !");
				$(form.phone_number).focus();
				return false;
			}
		}
		
		form.classList.add('was-validated');
	});

	$(".get-price").on("click", function() {
		$("form#get_service").submit();
	});

	if ($('.customer-carousel').length > 0) {
      $('.customer-carousel').owlCarousel({
          loop: false,
          autoplay: true,
          center: true,
          // margin: 10,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          nav: false,
          dots: true,
          autoplayHoverPause: false,
          items: 1,
          navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
          responsiveClass: true,
          responsive:{
            0:{
            	items:1,
            	margin:30
            },
            620:{
              items:2
            },
            930:{
              items:3
            },
            1240:{
              items:4
            },
            1550:{
              items:5
            },
          }
      });
  }

  if ($('.why-choose-carousel').length > 0) {
      $('.why-choose-carousel').owlCarousel({
          loop: false,
          autoplay: true,
          // center: true,
          // margin: 10,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          nav: false,
          dots: true,
          autoplayHoverPause: false,
          items: 1
      });
  }

    $(".faq-item-title").on("click", function () {
    	$(this).find("i.fa").toggleClass("fa-angle-right");
    	$(this).find("i.fa").toggleClass("fa-angle-down");
    	// $(this).next(".faq-item-content").fadeToggle();
    	$(this).next(".faq-item-content").slideToggle();
    });

});

function init() {
	var subCate = "subcate_"+$("select[name='sub_category']").val();
	$serviceObj = $("select[name='service']");
	$serviceObj.empty();
	$serviceObj.append("<option value=''>Select Service</option>");
	var services = serviceList[subCate];
	if(services) {
		for(var i in services) {
			$serviceObj.append("<option value='"+services[i].id+"'>"+services[i].service_title+"</option>");
		}
	}

	var tomorrow = new Date();
	tomorrow.setDate(tomorrow.getDate()+1);
	// console.log(tomorrow)
	$('#booking_date').datepicker({
    dateFormat: 'dd-mm-yy',
    minDate: tomorrow,
    icons: {
      up: "fa fa-angle-up",
      down: "fa fa-angle-down",
      next: 'fa fa-angle-right',
      previous: 'fa fa-angle-left'
    },
    onSelect: function(dateText) {
      var date = dateText;
      var dataString = "date=" + date;
    }
  });
}

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}