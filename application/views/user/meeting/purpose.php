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
                <form id = "submit-meeting" action="<?php echo base_url('career/meeting/select_time'); ?> " method="post" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="hidden" name = "business_name" value = "<?= $business_name; ?>" >
                    <input type="hidden" name = "employee" value = "<?= $employee; ?>" >
                    <input type="hidden" name = "country" value = "<?= $country; ?>" >

                    <input type="hidden" name = "first_name" value = "<?= $first_name; ?>" >
                    <input type="hidden" name = "last_name" value = "<?= $last_name; ?>" >
                    <input type="hidden" name = "your_email" value = "<?= $your_email; ?>" >
                    

                    <h2 style = "text-align:center;">What is meeting purpose</h2>
                   
                    <div class="col-md-12 contact-info-group">
                              
                        <div class="col-md-12 ">
                        
                            <label>Meeting Purpose <span class="asterisk"></span></label>
                            <select  class="form-control " type="text" name="meeting_type" id="meeting_type">
                                <option value = "">Select Meeting Type</option>
                                <option value = "Interview">Interview</option>
                                <option value = "Demo Meeting">Demo Meeting</option>
                                <option value = "Welcome to a tazzer group">Welcome to a tazzer group</option>
                                <option value = "Supervision">Supervision</option>
                                <option value = "Training">Training</option>
                            </select>
                                
                        </div>
                        
                        <div class="col-md-12 mt-title">
                            <div class="form-group">
                                <label>Meeting Title  <span class="asterisk"></span></label>
                                <input class="form-control" type="text" name="meeting_title" id="your_email">
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







<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css">

<script>
    $(document).ready(function() {	
        // check form validation
        $('#submit-meeting').bootstrapValidator({
            fields: {
                              
               
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
               
                         
            
            
            }
        }).on('success.form.bv', function (e) {
            showLoader();
            return true;
        });
    });
</script>    