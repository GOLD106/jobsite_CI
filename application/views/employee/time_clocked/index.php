<?php
$services_count = countServices();

?>

<style type="text/css">

.over-card {
  border-top-color: #8f8f8f8f;
  background-color: transparent;
  position: absolute;
  margin-top: -8%;
  width: 84.3%;
  border-top: 74%;
  border-radius: 0 0 8px 8px;
  border-top: solid 2px #cccccc;
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
.content {
  text-align: center;
  font-size: 65px;
}
.container {
  padding: 5%
}
.project-title {
  border-radius: 10px; 
  /* width: 8%;  */
  padding: 1%;
  text-align: center; 
  background-color: #6d2c7733 
}
.shift-attachment {
  border-radius: 10px; 
  /* width: 8%;  */
  text-align: center; 
  background-color: #6d2c77;
  color: white;
  padding: 1%;
  /* padding-top: 5%; */
  border-radius: 30px;
  width: 50%;
  height: 50px;

}
.req-time-btn {
  border: solid 1px black;
  outline: none;
  border-radius: 25px;
  color: #6d2c77;
  text-align: center;
  /* height: 35px; */
  border-color: #6d2c77;
  font-size: 18px;
  font-weight: 500;
  padding: 7px 20px;
}
@media (max-width: 768px) {
  .project-title {
    /* width: 30%;
     */
  }
  .attachment {
    padding-top: 25%;
  }
  .over-card {
    margin-top: -15%;
    width: 86%;
  }
}
</style>

<!-- Location Section -->
<section class="location-section section">
  <!-- <div class="location-block row">
      <div class="block-left col-xl-6 col-lg-6 col-md-6 col-sm-12" style="flex: 100%; max-width: 100% !important">
        <div class="location-map" id="our-location"></div>
      </div>
  </div> -->
  <div class="container">
    <div class="card blog-block-item">
      <div>
        <div style="display: flex; justify-content: space-between">
          <div style="width: 50%">
            <h3> Work time on </h3>
          </div>
          <div class="project-title"> <?php echo $job_title ?> </div>
        </div>
        <div class="content" id="stopwatch">00:00:00</div>

        <!-- <div id="buttons">
          <button id="start">start</button>
          <button id="pause" disabled>pause</button>
          <button id="stop" disabled>stop</button>
        </div> -->
      </div>
      <!-- <div class="card over-card" style="padding-bottom: 0% !important;"> -->
        <div style="display: flex">
          <div style="width: 42%">
            <h3 style="padding-bottom: 3%">Clocked in at: </h3>
          </div>
          <div style="width: 60%">
            <h3 style="padding-left: 2%" id="location"> <?php echo $location?></h3>
          </div>
        </div>
        <div style="display: flex; justify-content: space-between">
          <h3 style="padding-bottom: 3%" > Total Hours for <span id="today"></span> </h3>
          <h3 ><?php echo $total_hour ?></h3>
        </div>
      <!-- </div> -->
    </div>

  </div>
  <div class="container attachment">
    <div class="card blog-block-item" style="padding: 5%">
      <!-- <div class="shift-attachment"> <h3>Attachments </h3> </div>
      <hr></hr> -->
      <h3>Shift Attachments</h3>
      <div style="padding-top: 3%; display: -webkit-box;">
        <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
        <p style="color: #8f8f8f; padding-left: 0.5%"> Add a note </p>
      </div>
      <textarea id="add_note" style="border-color: #cccccc; border-radius: 15px; padding-top: 3%; background-color: #f0f0f06e; outline: none" placeholder="add a note" >
      </textarea>
      <div style="display: flex; padding-top: 3%; justify-content: space-around">
        <button onclick="location.href='../../employee/timesheet'" class="req-time-btn"><i class="fa fa-calendar" aria-hidden="true"></i> Timesheet </button>
        <button id="pause"  class="login-btn btn" style="border-radius: 25px;margin:0">
          <i class="far fa-alarm-clock"></i>End Shift</button>
      </div>
      <!-- <div style="padding-top: 3%; justify-content: center; text-align: center">
        <button class="req-time-btn" data-toggle="modal" data-target="#my-request"><i class="fa fa-user " aria-hidden="true"></i> My Request </button>
      </div> -->
    </div>
  </div>
</section>
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

                        <select required="true" id="absence_type" class="form-control">
                          <option selected value="0">Select</option>      
                          <option value="1">Vacation</option>      
                          <option value="2">Non Paid Absence</option>      
                          <option value="3">Sick leave</option>      
                        </select>
                      </div>
                    </div>
                    <div class="date-content">
                      <div class="from-to">
                        <h3 style="padding-right: 3%"> From </h3>
                        <input class="form-control" style="" type="date"></input>
                      </div>
                      <div class="from-to">
                        <h3 style="padding-right: 3%"> To </h3>
                        <input class="form-control" type="date"></input>
                      </div>
                    </div>
                    <div style="padding-top: 2%">
                      <h3 style="padding-right: 3%"> Attach a note your request </h3>
                      <textarea class="form-control " placeholder="Attach a note to your request">
                      </textarea>
                    </div>
                    <div style="color: #8f8f8f;padding: 3%">
                      <h4>All requests will be sent for manager approval</h4>
                    </div>
                    <div>
                      <!-- <button class="login-btn btn" data-dismiss="modal" aria-label="Close">Cancel</button> -->
                      <button class="login-btn btn" >Next</button>
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

<link rel="stylesheet" href="../../assets/css/tazzergroup/home.css?v1.13">
<script src="../../assets/js/tazzergroup/home.js?v1.09"></script>
<!-- <script src="../../assets/js/time_clock.js"></script> -->