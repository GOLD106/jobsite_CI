<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"/>
<div class="breadcrumb-bar meeting_banner">
	<div class="banner_mask"></div>
    <div class="container">
		<div class="row">
			<div class="col">
				<div class="meeting-title">
					<h2> Book a meeting </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- <div class= "container" style = "text-align:center;" >
    
        <div class = "meet-start">
            <div class = "schedule-image">
            </div>
            <div class = "date-time-picker ">
            <form >
                <div class = "col-xl-6 col-sm-6 col-12 date-select"  >
                     
                    Date:<input type = "text" name = "date-calendar" id = "date-calendar" />
                </div>

                <div class = "col-xl-6 col-sm-6 col-12 time-select">
               
                        <span class = "meeting_title" >Meeting Duration</span>
                        <select class = "time_duration form-control" >
                            <option value="0">30 min</option>
                            <option value="1">1 hr</option>
                            <option value="2">1 hr 30min</option>
                            <option value="3">2hrs</option>
                            <option value="4">2 hrs 30 min</option>
                                
                        </select>
                        <span class = "time_zone_title" > What time works best ?</span>
                        <select class = "time_zone_select form-control"> 
                            <option value="0">India Delhi time zone </option>
                        </select>
                        <div class = "time-selector">
                            
                        </div>   
                   
                </div>
                 
                </form>
                
            </div>    
        </div>
         
</div>    -->
<div class="container">
    <div class="row">
        <div class="meeting">
            <div class="meeting-img">
                <img src="/assets/img/meeting/Schedule-pana.png" alt="">
            </div>
            <form action="<?php echo base_url('career/meeting/confirm_book'); ?> " method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">     
                <input type="hidden" name = "business_name" value = "<?= $business_name; ?>" >
                <input type="hidden" name = "employee" value = "<?= $employee; ?>" >
                <input type="hidden" name = "country" value = "<?= $country; ?>" >

                <input type="hidden" name = "first_name" value = "<?= $first_name; ?>" >
                <input type="hidden" name = "last_name" value = "<?= $last_name; ?>" >
                <input type="hidden" name = "your_email" value = "<?= $your_email; ?>" >

                <input type="hidden" name = "meeting_type" value = "<?= $meeting_type; ?>" >
                <input type="hidden" name = "meeting_title" value = "<?= $meeting_title; ?>" >

                <div class="meeting-time">
                    <div class="meeting-duration col-md-6 col-sm-6">
                        <div class="row">
                            <h3>Meeting Duration</h3>
                            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="meeting_duration">
                                <option value = "30 min">30 min</option>
                                <option value = "1hr">1hr</option>
                                <option value = "1hr 30min">1hr 30min</option>
                                <option value = "2hr">2hr</option>
                                <option value = "2hr 30min">2hr 30min</option>
                            </select>
                        </div>
                    </div>
                    <div class="meeting-timezone col-md-6 col-sm-6">
                        <div class="row">
                            <h3>What time works best?</h3>
                            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name= "time_zone">
                            <?php  foreach($time_zone_list as $timezone)  {?>    
                            
                                 <option value="<?=$timezone?>"><?= $timezone ?></option>
                            <?php   }  ?>     
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="meeting-calendar">
                        <div style="overflow:hidden;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="datetimepicker13"></div>
                                        <input type="hidden" name="meeting_time" id="my_hidden_input" value="">
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#my_hidden_input').datetimepicker({
                                        inline: true, 
                                        sideBySide: true,
                                        minDate: new Date()
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                
                <div class="submit-btn-meeting">
                    <div class="submit-section-rfq" >
                        <button class="login-btn" type="submit" id="form_submit" name = "form_submit">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css">


<!-- Mobiscroll JS and CSS Includes -->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/jquery.datetimepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/meeting/jquery.datetimepicker.full.min.js">  
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/meeting/jquery.js">