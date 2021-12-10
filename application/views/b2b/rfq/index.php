<style type="text/css">
	/*.submit-section {
		text-align: center;
	}*/
</style>

<?php
    $login_type='';
    if (isset($settings['login_type'])) {
        $login_type = $settings['login_type'];
    }
    $country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>

<div class="breadcrumb-bar rfq">
    <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="career-title">
					<h2> Request for Quoto </h2>
				</div>
			</div>
			
		</div>
	</div>

</div>    


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 req-form ">                
                <div class="breadcrumb-title">
                    <h2 style = "color:#6D2C77; margin: 20px 0px 10px 20px;">Request for Quoto</h2>
                </div>
                <div style = "margin-left:20px;">    
                    Fill This Form for Request for quote
                </div>    

                <div class="rfq-content">
                <form action="<?php echo base_url(); ?>b2b/Reqforquote/get_service_price" id="get_service_price" method="post" >
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                            </div>

                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" name="phone_number" id="phone_number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="category" placeholder="Service Type" required>
                                        <option value="">Select Service Type</option>
                                        <?php
                                            foreach ($category as $key => $value) {
                                                ?>
                                        <option value="<?=$value['id']?>"><?=$value['category_name']?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>                                
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
                                    <label>Sub Category</label>
                                    <div class="form-group select-subcategroy">
                                        <select class="form-control " name="subcategory" placeholder="Sub Category" required data-bv-callback="true" data-bv-callback-message="please select sub category" data-bv-callback-callback="selectValidation">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>                                
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div id="load_div"></div>
                                    </div>
                                    <label>Additional comment or question</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="submit-section-rfq" >
                                    <button class="login-btn" type="submit" id="submit">Request Estimate</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class = "side_image" >
                    <img src="/assets/img/b2b/side_image.png" alt="" style = "width:100%">
                </div>    
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var subcategoryList = <?=json_encode($subcategoryList)?>; 
      
</script>
<script src="<?php echo base_url(); ?>assets/js/rfq/rfq.js?v1.0"></script>