
<div class="content">
	<div class="container">
		<div class="row">
		 	<?php
			if(!empty($_GET['tbs'])){
				$val=$_GET['tbs'];
			}else{
				$val=1;
			}
			?>
			<input type="hidden" name="tab_ctrl" id="tab_ctrl" value="<?=$val;?>">
			<?php $this->load->view('user/home/user_sidemenu');?>
		 
            <div class="col-xl-9 col-md-8">
				<div class="tab-content pt-0">
					<div class="tab-pane show active" id="user_security_settings" >
						<div class="widget">
							<h4 class="widget-title">Security Settings</h4>
							<form id="update_user" action="<?php echo base_url()?>user-security" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
   
								<div class="row">
									
									<div class="col-xl-12">
										<h5 class="form-title">Two Factor Authentication</h5>
									</div>
									<div class="form-group col-xl-6">
										<div class="custom-control custom-checkbox checkbox-xl">
											<input type="checkbox" name="two_factor_auth" class="custom-control-input" id="two_factor_auth" <?php if ($user_details['two_factor_auth'] == 1) {
											  echo 'checked="checked"';
											} ?>>
											<label class="custom-control-label" for="two_factor_auth">Enable</label>
										</div>
									</div>

									<div class="form-group col-xl-12">
										<button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="submit">Update</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/user_security_settings.js"></script>