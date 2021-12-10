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

<div class="container">
    <div class="row">
        <div class="meeting">
            <div class = "meeting-confirm-img">
                <img src="/assets/img/meeting/confirm_book_2.png" alt="">
            </div>
            <div class = "meeting-form">
                <form id = "submit-meeting" action="<?php echo base_url('career/meeting/purpose'); ?> " method="post" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="hidden" name = "business_name" value = "<?= $business_name; ?>" >
                    <input type="hidden" name = "employee" value = "<?= $employee; ?>" >
                    <input type="hidden" name = "country" value = "<?= $country; ?>" >
                    

                    <h2 style = "text-align:center;">What is Contact info</h2>

                    
                    <div class="col-md-12 contact-info-group">
                               
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>First Name<span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="first_name" id="first_name">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Last Name<span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Your email address <span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="your_email" id="your_email">
                            </div>
                        </div>
                    </div>


                    

                                                 

                    
                   
                    <div class="submit-btn-meeting">
                        
                        
                            
                            <button class="next-button" type="submit" id="form_submit" name = "form_submit">Next</button>
                        
                    </div>               
                        

                    
                    
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css?v1.0">

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
                your_email: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter email'
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