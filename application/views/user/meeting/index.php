
<?php
    $country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>

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

<div class = "start_content">
    <div class="container" style = "text-align:center">
		<div class="meet-start ">
            <div class = "start-banner" >
            </div>
            <h2 class = "let-title">Let's get started</h2>
            <form id = "start-form" action="<?php echo base_url('career/meeting/contact_info'); ?> " method="post"  class = "form-start">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">    
                <div class="email-address-input ">
                        <label>Enter Business Email</label>
                        <input class="form-control" type="email" name="business_name" id="business_name" required>
                </div>

                <div class = "employee">
                    <h3>Number of employees,including you</h3>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="employee_num" value = "Just you">Just you
                        </label>                        
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="employee_num" value = "2-9">2-9
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="employee_num" value = "10-99">10-99
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="employee_num" value = "100-299">100-299
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="employee_num" value = "300 +">300 +
                        </label>
                    </div>
                </div>

                <div class = "select-country">
                    <h3>Select Country</h3>
                    <select class="form-control" id="exampleFormControlSelect1" name= "country">
                        <?php  foreach($country_list as $country)  {?>    
                        
                                <option value="<?= $country['country_code']?>"><?= $country['country_name'] ?></option>
                        <?php   }  ?>   
                        
                    </select>
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

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css?v1.0">

<script>

</script>    




