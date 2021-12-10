<div class="breadcrumb-bar meeting_banner">
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

<div class="container">
    <div class="row">
        <div class="meeting">
            <div class = "meeting-confirm-img">
                <img src="/assets/img/meeting/confirm_book_2.png" alt="">
            </div>
            <div class = "meeting-form">
                <form id = "submit-meeting" action="<?php echo base_url('career/meeting/confirm_book'); ?> " method="post" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="hidden" name = "book_email" value = "<?= $email; ?>" >
                    <div class = "meeting-time-confirm">
                        <h5 >Confirm meeting</h5>
                        <input type = "text" class = "meeting-time-value" name= "meeting_time" value= "<?php echo $meeting_time; ?>"/>
                    </div>

                    <div class= "meeting-duration-text">
                        <span>Meeting Duration: </span>
                        <input type = "text" class = "meeting-time-value" name = "meeting_duration" value= "<?php echo $meeting_duration; ?>"/>
                    </div>
                    
                    <div class= "time-zone-text">
                        <span>Time Zone: </span>
                        <input type = "text" class = "meeting-time-value" name = "time_zone"  value= "<?php echo $time_zone; ?>"/>
                    </div>

                    <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Meeting Type <span class="asterisk"></span></label>
                                    <select  class="form-control" type="text" name="meeting_type" id="meeting_type">
                                        <option value = "">Select Meeting Type</option>
                                        <option value = "Interview">Interview</option>
                                        <option value = "Demo Meeting">Demo Meeting</option>
                                        <option value = "Welcome to a tazzer group">Welcome to a tazzer group</option>
                                        <option value = "Supervision">Supervision</option>
                                        <option value = "Training">Training</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Meeting Title<span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="meeting_title" id="meeting_title">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Description<span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="meeting_description" id="web_url">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Meeting Location <span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="meeting_location" id="meeting_location">
                            </div>
                        </div>


                    <div class = "name-confirm row">

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name<span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="first_name" id="first_name">
                            </div>
                        
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name<span class="asterisk"></span></label>
                                    <input class="form-control" type="text" name="last_name" id="last_name">
                                </div>
                        </div>
                    </div>

                    <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Your email address<span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="email" id="email" >
                            </div>
                    </div>                                

                    
                   
                    <div class="submit-btn-meeting">
                        
                        
                            <a href="<?php echo base_url('career/meeting/start_book'); ?>"><input  class="back-button " type="button" id="form_submit" name = "form_submit" value ="Back" /> </a>
                            <button class="next-button" type="submit" id="form_submit" name = "form_submit">Next</button>
                        
                    </div>               
                        

                    
                    
                </form>
            </div>
        </div>
    </div>
</div>







<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css">

<script>
    $(document).ready(function() {	
        // check form validation
        $('#submit-meeting').bootstrapValidator({
            fields: {
                first_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Name'
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Last Name'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter email'
                        }
                    }
                },
                meeting_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Meeting Type'
                        }
                    }
                },
                meeting_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Meeting Title'
                        }
                    }
                },
                meeting_description: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Meeting Description'
                        }
                    }
                },
                meeting_location: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Meeting Location'
                        }
                    }
                },            
            
            
            }
        }).on('success.form.bv', function (e) {
            showLoader();
            return true;
        });
    });
</script>    