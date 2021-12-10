<?php 
	$id = $datalist['id'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Edit User Permission</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="edit_data_form" action="<?php echo base_url('admin/'.$model.'/edit/'.$id); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							<div class="form-group">
								<label class="col-3 control-label" >Name</label>
								<div class="col-10">
									<input type="text" class="form-control" name="title" id="title" value="<?=$datalist['name']?>" disabled> 
								</div>
							</div>
							
                            <div class="form-group">
								<label class="col-3 control-label">Email</label>
								<div class="col-10">
									<input type="text" class="form-control" name="email" id="email" value="<?=$datalist['email']?>" disabled> 
								</div>
							</div>
                            
                            <div class="form-group">
								<label class="col-3 control-label">User Permission</label>
								<div class="col-10">
									<!-- <input type="text" class="form-control" name="author" id="author" value="<?=$datalist['author']?>">  -->
									<select class="form-control" name="permission" id="permission" value="<?=$datalist['permission']?>" required>
										<option value="">Select Permission</option>
										<?php 
											foreach($permissions as $permission) {
												?>
										<option value="<?=$permission['id']?>"><?=$permission['name']?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							

							
							<div class="form-group">
								<label class="col-3 control-label">Status</label>
								<div class="col-10">
									<div class="radio radio-primary radio-inline">
										<input type="radio" id="academy_status1" value="1" name="status" <?=$datalist['status']==1?"checked=\"checked\"":""?> disabled>
										<label for="academy_status1">Active</label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" id="academy_status2" value="0" name="status" <?=$datalist['status']==0?"checked=\"checked\"":""?>disabled>
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

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/<?=$model?>/edit.css">
<script type="text/javascript">
    var categories = <?=json_encode($categories)?>;
    var datalist = <?=json_encode($datalist)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/admin/<?=$model?>/edit.js?v1.0"></script>