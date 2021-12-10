<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Create New Promo Code</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="add_data_form" action="<?php echo base_url('admin/'.$model.'/create'); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Promo Code</label>
								<div style="display: flex" class="col-10">
									<input type="text" class="form-control col-10" name="code" id="code" value="" required>
									<button class="btn btn-primary center-block col-2"onclick="generatePromo()" >Generate Code</button>
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Users</label>
								<div class="col-10">
									<select class="form-control" name="users" id="users" value="" required> 
									<?php 
										foreach($users as $user) {
									?>
									<option value="<?php echo $user['name']?>"><?php echo $user['name']?></option>
									<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-3 control-label">Promo Type</label>
								<div class="col-10">
									<select class="form-control" name="type" id="type" value="<?=$datalist['type']?>" required>
										<option value="">Select Promo Type</option>
										<?php 
											foreach(COUPON_TYPES as $key => $value) {
												?>
										<option value="<?=$key?>"><?=$value?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Amount</label>
								<div class="col-10">
									<input type="number" class="form-control" name="price" id="price" value="" required> 
								</div>
							</div>
							<!-- <div class="form-group">
								<label class="col-3 control-label">Image</label>
								<div class="col-10">
									<input class="form-control" type="file" name="image" id="image"> 
								</div>
							</div> -->
							<div class="form-group">
								<label class="col-3 control-label">Start Date</label>
								<div class="col-10">
									<input type="date" class="form-control" name="start_date" id="start_date" value="" required> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">End Date</label>
								<div class="col-10">
									<input type="date" class="form-control" name="end_date" id="end_date" value="" required> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Status</label>
								<div class="col-10">
									<div class="radio radio-primary radio-inline">
										<input type="radio" id="academy_status1" value="1" name="status" checked="">
										<label for="academy_status1">Active</label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" id="academy_status2" value="0" name="status">
										<label for="academy_status2">Inactive</label>
									</div>
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
<script>
	function generatePromo() {
		let alphanumeric = Math.random().toString(36).slice(2);
		console.log(alphanumeric, '---alphanumeric');
		$('#code').val(alphanumeric)
	}
</script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/<?=$model?>/create.css">
<script type="text/javascript">
</script>
<script src="<?php echo base_url(); ?>assets/js/admin/<?=$model?>/create.js"></script>