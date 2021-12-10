<?php
    $login_type='';
    if (isset($settings['login_type'])) {
        $login_type = $settings['login_type'];
    }
    $country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>


<div class="breadcrumb-bar career_banner">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="career-title">
					<h2> Detergent & Cleaning </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class = "detail-info-title">
    <span class = "info-overview_1">info overview</span>
    <span class = "apply-job_1">Apply job</span>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 req-form ">
                
                <div class="career_apply_tite">
                    <h2 class = "h2-title"><u>Career with </u>Tazzer Group</h2>
                </div>
                <div style = "margin-left:20px;">    
                    We're looking for brilliant minds to join ou top-notch and make it even better. Are you ready?
                </div>    

                <div class="rfq-content">
                <form id = "insert_career"  action="<?php echo base_url('career/career/insert_career'); ?> " id="career_apply_job" method="post"     enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                        <input type = "hidden" name = "serviceId" value=" <?php echo $service_id; ?>" />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Name<span class="asterisk"></span></label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email address<span class="asterisk"></span></label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Mobile No<span class="asterisk"></span></label>
                                        <select name="countryCode" id="countryCode" class="form-control countryCode final_country_code">
                                            <?php
                                            foreach ($country_list as $key => $country) {
                                                if (is_array($registerInput) && isset($registerInput['country_code'])) {
                                                    if ($country['country_code']==$registerInput['country_code']) {$select='selected';}else{ $select='';}
                                                } 
                                                else if($country['country_code']==$main_code){$select='selected';}else{ $select='';} ?>
                                            <option <?=$select;?> data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>">
                                                <?=$country['country_name'];?>
                                            </option>
                                            <?php } ?>
                                        </select>                                
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="text" name="phone_number" id="phone_number">
                                </div>
                            </div>

                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>What is your Skills</label>
                                    <input class="form-control" type="text" name="skill_name" id="skill_name">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="user_address" id="user_address">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apply as</label>
                                    <select required="true" class="form-control" name="appling_as" id="appling_as">
                                        <option value="">Applying As</option>
                                        <?php 
                                        $applyingAs = C_APPLINGAS;
                                        asort($applyingAs, SORT_STRING);
                                        foreach($applyingAs as $key=>$value) {
                                            $select = "";
                                            if (is_array($registerInput) && isset($registerInput['you_are_appling_as'])) {
                                                if ($key==$registerInput['you_are_appling_as']) {$select='selected';}
                                            }
                                            ?>
                                            <option <?=$select?> value="<?=$value?>">
                                                    <?=$value?>
                                            </option>
                                            <?php
                                            }
                                        ?>
                                    </select>                             
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">                                    
                                    <label>Enter more about you</label>
                                    <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    
                                    <label>Upload file </label>
                                    <input type = "file" class="form-control" name="your_file" id="your_file" rows="5">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="submit-section-rfq" >
                                    <button class="login-btn" type="submit" id="form_submit" name = "form_submit">submit</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class = "apply_side_image" >
                </div>    
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

	
	
	$(document).ready(function() {	

        var base_url = $('#base_url').val();
        var BASE_URL = $('#base_url').val();
        var csrf_token = $('#csrf_token').val();
        var csrfName = $('#csrfName').val();
        var csrfHash = $('#csrfHash').val();
        var modules = $('#modules_page').val();
        var email_valid_chk = false;    // Vadim
        var checked = '';

	    // check form validation
	    $('#insert_career').bootstrapValidator({
	        fields: {
	        	name: {
	                validators: {
	                    notEmpty: {
	                        message: 'Please Enter Name'
	                    }
	                }
	            },
	            email: {
	                validators: {
                        remote: {
                            url: base_url + 'career/career/email_duplicate_check',
                            data: function(validator) {
                                return {
                                userEmail: validator.getFieldElements('email').val(),
                                csrf_token_name: csrf_token,
                                checked: checked

                                };
                            },
                            message: 'This email is already exist...',
                            type: 'POST'
                        },
	                    notEmpty: {
	                        message: 'Please Enter Your Email'
	                    }
	                }
	            },
	            countryCode: {
	                validators: {
	                    notEmpty: {
	                        message: 'Please Select Country Code'
	                    }
	                }
	            },
	            phone_number: {
	                validators: {
	                    notEmpty: {
	                        message: 'Please Enter Phone Number'
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