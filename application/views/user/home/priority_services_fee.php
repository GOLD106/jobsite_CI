<style>

.transaction {
	width: 100%;
	background: #fff;
	border-radius: 10px;
	padding: 20px;
	display: table;
	box-shadow: 0 0 7px 0 #a3a3a3;
}
.container {
	padding-top: 5%;
}
.letter {
	font: normal normal normal 16px/27px Poppins;
	letter-spacing: 0px;
	color: #2A2A2A;
	opacity: 1;
	padding-left: 20%;
	padding-right: 20%;
	padding-top: 2%;
}
.service-container {
	text-align: center;
	padding: 3%;
	padding-left: 10%;
	padding-right: 10%;
	font-size: 15px;
}
.service-button {
	width: 63%;
	height: 65px;
	align-items: center;
	/* background: transparent url('img/Rectangle 981.png') 0% 0% no-repeat padding-box; */
	border: 1px solid #707070;
	border-radius: 13px;
	opacity: 1;
	color: white;
	font-size: 28px;
	background-color: #6D2C77;
	display: inline-block;
	padding: 1%;
}
.priority {
	text-align: center; 
	color: white; 
	padding-top: 10%
}

@media (max-width: 768px) {

	.transaction {
		display: block;
		padding: 0;
		padding-top: 3%;
	}
	.service-container {
		display: block;
	}

	.priority {
		padding-top: 50%;
	}
	.service-button {
		padding: 3% !important
	}
}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="priority-service-banner"></div>
				<div class="Rectangle-banner"></div>

        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con priority">
                  <h1>Priority Services Fees</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="transaction">
		<div style="text-align:center; padding-top: 3%">
			<h2> Priority services fee </h2>
			<p class="letter">on this plan, they get notification for any search or job post orders that comes that is within their services or products. This will cost than 5£ per Month</p>
		</div>
		<div class="service-container">
			<img style="width: 60%" src="<?php echo base_url().'assets/img/priority-service/service-fee.png'?>" alt="" />
			<div class="service-button" >
				<button class="login-btn" type="button" id="pay_submit" name = "form_submit">12 &#163/ Month Pay </button>
			</div>
		</div>
		
	</div>
</div>


<script>
 $("#pay_submit").on("click", function() {
		
	var csrf_token = $('#csrf_token').val();
	
	var params = {
        csrf_token_name: csrf_token
    } 

	

	$.ajax({
            url: base_url + 'user/booking/priority_pay_complete',
            data: params,
            type: 'POST',
            dataType: 'JSON',
            
            success: function(response) {
                // console.log("success");
                if (response.success) {
                  
                    swal({
                      title: "Pay confirm...",
                      text: "You paid 12 pound Successfully ...!",
                      icon: "success",
                      button: "okay",
                      closeOnEsc: false,
                      closeOnClickOutside: false
                    }).then(function() {
                      window.location.href = base_url + 'insertion-services-fee';
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
               
                swal({
                  title: "Paying Confirmation...",
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


 });
</script>
