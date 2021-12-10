<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Create New Leads Plan</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="add_data_form" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							
							<div class="form-group">
								<label class="col-3 control-label">Duration</label>
								<div class="col-10">
									<input type="text" class="form-control" name="duration" id="duration" value="" required> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Leads Plan</label>
								<div class="col-10">
									<input type="text" class="form-control" name="commission" id="commission" value="" required> 
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