<?php 
	$id = $datalist['id'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Edit Commission</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="edit_data_form" action="<?php echo base_url($theme .'/commission/edit/'.$id); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							
							<div class="form-group">
								<label class="col-3 control-label">User type</label>
								<select required="true" class="form-control col-10" name="user_type" id="are_appling_as" value="<?=$datalist['user_type']?>" >
									<option value="">Select User type</option>
									<?php 
									$applyingAs = C_APPLINGAS;
									asort($applyingAs, SORT_STRING);
																									
									foreach($applyingAs as $key=>$value) {
										$select = "";
										
										if ( $key == (int)$datalist['user_type'])  {$select='selected';}
										
										?>
										<option <?=$select?> value="
											<?=$key?>">
												<?=$value?>
										</option>
										<?php
										}
									?>
								</select>
							</div>

							<div class="form-group">
								<label class="col-3 control-label">Subscription</label>
								<select required="true" class="form-control col-10" name="subscription" id="subscription" value="<?=$datalist['subscription']?>" >
									<option value="">Select subscription</option>
									<?php  
										$subscriptions = $this->db->get('subscription_fee')->result_array();
										foreach($subscriptions as $subscription)
									    {
											$select = "";
											if ($subscription['id'] == $datalist['subscription'] ) {
												$select = "selected";
											}

									?>
										<option value="<?=$subscription['id'] ?>"  <?=$select ?>>
											<?=$subscription['subscription_name'] ?>
										</option>
										<?php
										}
									?>
									   <option value="7">Priorty Service</option>
								</select>
							</div>

							<div class="form-group">
								<label class="col-3 control-label">Commission Fee</label>
							
									<input type="text" class="form-control col-10" name="commission_fee" id="commission_fee" value="<?=$datalist['commission_fee']?>" required> 
							
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