<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Create Loyalty Discount Programmes</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="add_data_form" method="POST" action="<?php echo base_url($theme .'/loyalty/create'); ?>" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>

							<div class="form-group">
								<label class="col-3 control-label">User Name</label>
								<select required="true" class="form-control col-10" name="user_name" id="user_name">
									<option value="">Select UserName</option>
									<?php  
										$users = $this->db->get('users')->result_array();
										foreach($users as $user)
									    {
																
									?>
										<option value="<?=$user['id'] ?>">
											<?=$user['name'] ?>
										</option>
										<?php
										}
									?>
									   
								</select>
							</div>

							<div class="form-group">
								<label class="col-3 control-label">User Name</label>
								<select required="true" class="form-control col-10" name="loyalty_type" id="subscription">
									<option value="">Select Loyalty Type</option>
									<?php  
										$loyalty_types = $this->db->get('loyalty_type')->result_array();
										foreach($loyalty_types as $type)
									    {
																
									?>
										<option value="<?=$type['id'] ?>">
											<?=$type['name'] ?>
										</option>
										<?php
										}
									?>
									   
								</select>
							</div>

							<div class="form-group">
								<label class="col-3 control-label"> Discount </label>
								<div class="col-10">
									<input type="text" class="form-control" name="discount" id="discount" value="" required> 
								</div>
							</div>

							
							<div class="m-t-30 text-center">
								<button name="form_submit" type="submit" class="btn btn-primary center-block" value="true">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/coupons/create.css">
<script type="text/javascript">
</script>
<script src="<?php echo base_url(); ?>assets/js/admin/coupons/create.js"></script>