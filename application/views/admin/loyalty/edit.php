<?php 
	$id = $datalist['id'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Edit Loyalty Programmes</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="edit_data_form" action="<?php echo base_url($theme .'/loyalty/edit/'.$id); ?>"  method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>

							<div class="form-group">
								<label class="col-3 control-label">User Name</label>
								<select required="true" class="form-control col-10" name="user_name" id="user_name" value="<?=$datalist['user_name']?>>
									<option value="">Select UserName</option>
									<?php  
										$users = $this->db->get('users')->result_array();
										foreach($users as $user)
									    {
											$select = "";
											if ($user['id'] == $datalist['user_name'] ) {
												$select = "selected";
											}

																
									?>
										<option value="<?=$user['id'] ?>" <?= $select ?> >
											<?=$user['name'] ?>
										</option>
										<?php
										}
									?>
									   
								</select>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Loyalty Type</label>
								<select required="true" class="form-control col-10" name="loyalty_type" id="subscription" value="<?=$datalist['loyalty_type']?>>
									<option value="">Select Loyalty Type</option>
									<?php  
										$loyalty_types = $this->db->get('loyalty_type')->result_array();
										foreach($loyalty_types as $type)
									    {
											$select = "";
											if ($type['id'] == $datalist['loyalty_type'] ) {
												$select = "selected";
											}					
									?>
										<option value="<?=$type['id'] ?>" <?= $select ?> >
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
									<input type="text" class="form-control" name="discount" id="discount" value="<?=$datalist['discount'] ?>" > 
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

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/coupons/edit.css">
<script type="text/javascript">
    var datalist = <?=json_encode($datalist)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/admin/coupons/edit.js"></script>