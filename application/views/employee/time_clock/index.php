<?php
$services_count = countServices();

?>

<style type="text/css">
.slider {
    width: calc(100% - 30px);
    margin: 30px auto;
}

.slick-slide {
  margin: 0px 20px;
}

.slick-slide img {
  width: 100%;
}

.slick-prev:before,
.slick-next:before { 
  color: black;
}

.date-content {
  padding-top: 2%; 
  text-align: left; 
  display: flex; 
  justify-content: space-between;
}
.from-to {
  width: 43%; 
  padding: 2%; 
  text-align: center; 
  display: flex; 
  justify-content: space-between; 
  align-items: center
}
@media (max-width: 768px) {
  .from-to {
    width: 100%; 
    padding: 2%; 
    text-align: center; 
    display: flex; 
    justify-content: space-between; 
    align-items: center
  }
  .date-content {
    padding-top: 2%; 
    text-align: left; 
    display: block; 
    justify-content: space-between;
  }
}
@media screen and (max-width: 600px) {

    a.navbar-brand.logo-small {
        display: none;
    }
}
.location-block {
  flex: 0 0 100% !important;
  max-width: 100% !important;
}
/* @media (min-width: 768px){
  .col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 0%;
    max-width: 0%;
  }
} */
.card {
  padding: 3% !important;
}
.radio {
	margin: 1rem;
}
.radio input[type="radio"] {
	position: absolute;
	opacity: 0;
}
.radio input[type="radio"] + .radio-label:before {
	background: #f4f4f4;
	border-radius: 100%;
	border: 1px solid green;
	display: inline-block;
	width: 150px;
	height: 150px;
	position: relative;
	top: -0.2em;
	margin-right: 1em;
	vertical-align: top;
	cursor: pointer;
	text-align: center;
	transition: all 250ms ease;
}
.radio input[type="radio"]:checked + .radio-label:before {
	background-color: green;
	box-shadow: inset 0 0 0 4px #f4f4f4;
}
.radio input[type="radio"]:focus + .radio-label:before {
	outline: none;
	border-color: green;
}
.radio input[type="radio"]:disabled + .radio-label:before {
	box-shadow: inset 0 0 0 4px #f4f4f4;
	border-color: green;
	background: green;
}
.radio input[type="radio"] + .radio-label:empty:before {
	margin-right: 0;
	
}
.checkbox-group {
	text-align: center;
	padding-top:20%;
}
.rounded-checkbox {
	width: 50px;
	height: 20px;
	cursor: pointer;
}
.container {
  padding: 5%;
}
.dropdown-toggle {
  display: none;
}
.form-control {
  padding: 1 !important;
}
</style>

<!-- Location Section -->
<section class="location-section section">
  <div class="location-block row">
    <div class="block-left col-xl-6 col-lg-6 col-md-6 col-sm-12" style="flex: 100%; max-width: 100% !important">
      <div class="location-map" id="our-location"></div>
    </div>
  </div>
  <div class="container">
    <div class="card blog-block-item">
      <div style="display: flex; justify-content: center; width: 100%; padding: 3%; ">
        <a href="#" class="btn-shift" data-toggle="modal" data-target="#select-job">
          <div style="color: white">
            <!-- <i class='fa fa-clock'>fa-lg</i><br/> -->
            Start Shift
          </div>
        </a>
      </div>
      <div style="display: flex; color: #6D2C77; justify-content: space-evenly; width: 100%;">
        <div class="card blog-block-item" style="align-items: center">
          <a href="#" class="btn-request" data-toggle="modal" data-target="#my-request">
            <i class="fa fa-user fa-3x" style="color: white" aria-hidden="true"></i>
          </a>
          <p style="padding-top: 40%"> My Requests </p>
        </div>
        <div class="card blog-block-item" style="align-items: center">
          <a href="timesheet" class="btn-calendar">
            <i class="fa fa-calendar fa-3x" style="color: white" aria-hidden="true"></i>
          </a>
          <p style="padding-top: 40%"> My Timesheet </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Select Job -->
<div class="modal account-modal fade multi-step" id="select-job" data-keyboard="false" data-backdrop="static">
	<div class=" modal-lg modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header p-0 border-0" style="justify-content: center; padding-top: 5% !important; border-bottom: solid 1px #cccccc !important; padding-bottom: 5% !important">
        <h2><strong>Select Job</strong></h2>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" data-step="1">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<!-- <h3>Join Us</h3> -->
								<!-- <p class="text-muted">Registration for Customer</p> -->
							</div> 
							  <div class="row" style="justify-content: center; display: block">
                  <div class="card blog-block-item">

                    <form method="post" enctype="multipart/form-data" autocomplete="off">
                      <input type="hidden" id="frm_csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <div style="text-align: left">
                        <h3>All Jobs</h3>
                      </div>
                      <div style="padding-top:3%;">
                        <div style="padding-top: 2%; border-bottom: solid 1px #cccccc;">
                          <?php if(!empty($lists)) {
                              foreach($lists as $list) {
                          ?>
                            <div style="display: flex">
                              <a href="javascript:void(0);" target="_blank" >
                                <input onclick="location.href='<?php echo base_url().'employee/time-clocked/'.$list['id']?>';" class="rounded-checkbox" name="lnk"  value="link"  type="radio" >
                                </input>
                              </a>
                              <p><?php echo $list['schedule_job'] ?></p>
                            </div>
                          <?php 
                              }
                            }
                          ?>
                        </div>
                      </div>
                      <!-- <div class="form-group" style="padding-top: 5%">
                        <label>Category <span class="text-danger">*</span></label>
                
                        <select class="form-control select" id="category" name="category" required>
                          <option value="">Select Category</option>
                          <?php 
                            if(!empty($lists)) {
                              foreach($lists as $category) {
                          ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                          <?php 
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group" style="padding-top: 5%">
                          <label>Services<span class="text-danger">*</span></label>
                          <select class="form-control select" title="Select Services" name="subcategory" id="subcategory"  required></select>
                      </div> -->
                      <div style="padding-top: 2%">
                        <button class="login-btn btn" data-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- My Request -->
<div class="modal account-modal fade multi-step" id="my-request" data-keyboard="false" data-backdrop="static">
	<div class=" modal-lg modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header p-0 border-0" style="justify-content: center; padding-top: 5% !important; border-bottom: solid 1px #cccccc !important; padding-bottom: 5% !important">
        <h2><strong>Absence Details</strong></h2>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" data-step="1">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<!-- <h3>Join Us</h3> -->
								<!-- <p class="text-muted">Registration for Customer</p> -->
							</div> 
							  <div class="row" style="justify-content: center; display: block">
                  <div class="card blog-block-item">
                    <div style="text-align: left; display: flex; ">
                      <div style="width: 50%; text-align: left;">
                        <i class="fa fa-umbrella-beach"></i>
                        <h3>Type</h3>
                      </div>
                      <div class="form-group col-md-6 mt-3">

                        <select id="absence_type" required="true" class="form-control">
                          <option selected value="0">Select</option>      
                          <option value="1" data-value="Vation">Vacation</option>      
                          <option value="2" data-value="Non Paid Absence">Non Paid Absence</option>      
                          <option value="3" data-value="Sick leave">Sick leave</option>      
                        </select>
                      </div>
                    </div>
                    <div class="date-content">
                      <div class="from-to" style="padding-left: 0">
                        <h3 style="padding-right: 3%"> From </h3>
                        <input class="form-control" style="" id="absence_from" type="date"></input>
                      </div>
                      <div class="from-to">
                        <h3 style="padding-right: 3%"> To </h3>
                        <input class="form-control" id="absence_to" type="date"></input>
                      </div>
                    </div>
                    <div style="padding-top: 2%">
                      <h3 style="padding-right: 3%"> Attach a note your request </h3>
                      <textarea class="form-control " id="absence_note" placeholder="Attach a note to your request">
                      </textarea>
                    </div>
                    <div style="color: #8f8f8f;padding: 3%">
                      <h4>All requests will be sent for manager approval</h4>
                    </div>
                    <div>
                      <!-- <button class="login-btn btn" data-dismiss="modal" aria-label="Close">Cancel</button> -->
                      <button onclick="absenceRequest()" data-dismiss="modal"  class="login-btn btn" >Next</button>
                    </div>
                  </div>
                </div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  
  function absenceRequest() {
    let csrf_token = $('#csrf_token').val();
    console.log(csrf_token);
    let absence_from = $('#absence_from').val()
    let absence_to = $('#absence_to').val()
    let absence_note = $('#absence_note').val()
    let absence_type = $('#absence_type').find(":selected").attr("data-value")
    $.ajax({
        type: "POST",
        url: "../../employee/time_clock/time_clock_add",
        data: {
          absence_from: absence_from,
          absence_to: absence_to,
          absence_note: absence_note,
          absence_type: absence_type,
          csrf_token_name: csrf_token
        },
        success: function(response) {
        }
    });
  }

  $(document).ready(function(){
    var csrf_token = $('#csrf_token').val();
    var key = $("#map_key").val();
    $.ajax({
      type: "POST",
      url: "../../employee/time_clock/get_address",
      data: {
        csrf_token_name: csrf_token
      },
      success: function(response) {
        let temp = [];
        temp = jQuery.parseJSON(response);
        var address = temp[0].postal_code;
        $.get('https://maps.googleapis.com/maps/api/geocode/json',{address:address,key:key},function(data, status){
          // console.log(data,status);
          var location = data.results[0].geometry.location;
          console.log(location)
          initMap(location);
        });
      
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
      }
    });
  });
</script>

<link rel="stylesheet" href="<?=base_url()?>assets/css/tazzergroup/home.css?v1.13">
<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
<!-- <script src="<?=base_url()?>assets/js/time_clock.js"></script> -->
<!-- <script src="<?=base_url()?>assets/js/tazzergroup/home.js?v1.09"></script> -->