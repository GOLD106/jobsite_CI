<?php 
	$id = $datalist['id'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Edit Affiliation</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="edit_data_form" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Name</label>
								<div class="col-10">
									<input type="text" class="form-control" name="name" id="name" value="<?=$datalist['name']?>" required> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-3 control-label">Referral Code</label>
								<div class="col-10">
									<input type="text" class="form-control" name="share_code" id="share_code" value="<?=$datalist['share_code']?>" required> 
								</div>
							</div>

							<!-- <div class="form-group">
								<label class="col-3 control-label">Start Date</label>
								<div class="col-10">
									<input type="date" class="form-control" name="start_date" id="start_date" value="<?=$datalist['start_date']?>" required> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">End Date</label>
								<div class="col-10">
									<input type="date" class="form-control" name="end_date" id="end_date" value="<?=$datalist['end_date']?>" required> 
								</div>
							</div> -->
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

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/affiliation?>/edit.css">
<script type="text/javascript">
    var datalist = <?=json_encode($datalist)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/admin/affiliation/edit.js"></script>