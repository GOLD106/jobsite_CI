<?php
    $this->website_name = '';
    // $website_logo_front ='assets/img/logo.png';
    $website_logo_front = 'assets/img/'.TEMPLATE_THEME.'/logo.png';
    
    $result = settingValue();
    if (isset($result['website_name'])) {
    	$this->website_name = $result['website_name'];
    }
    $this->website_name = 'tazzerGroup';

?>

<div class="login-page">
	<div class="login-body container">
		<div class="loginbox">
			<div class="login-right-wrap">
				<div class="account-header">
					<div class="account-logo text-center mb-4">
						<a href="<?php echo $base_url."admin"; ?>">
							<img src="<?php echo $base_url; ?><?=$website_logo_front?>" alt="" class="img-fluid">
						</a>
					</div>
				</div>
				<div class="login-header">
					<h3>Forget Password <span><?php echo $this->website_name;?></span></h3>
					<p class="text-muted">Access to our dashboard</p>
				</div>

				<?php if($this->session->flashdata('error_message')) {  ?>
				<div class="alert alert-danger text-center " id="flash_error_message"><?php echo $this->session->flashdata('error_message');?></div>
				<?php $this->session->unset_userdata('error_message');
				} ?>
				<?php if($this->session->flashdata('success_message')) {  ?>
				<div class="alert alert-success text-center" id="flash_succ_message"><?php echo $this->session->flashdata('success_message');?></div>
				<?php $this->session->unset_userdata('success_message');
				} ?>
				<form id="forgotpwdadmin" action="<?php echo $base_url; ?>/forgot_password" method="POST">
                   <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>">
					<div class="form-group">
						<label class="control-label">Email ID</label>
						<input class="form-control" type="text" name="email" id="email" placeholder="Enter your Email ID">
						
						<span id="err_frpwd" ></span>
					</div>
					<div class="text-center">
						<button class="btn btn-primary btn-block account-btn" id="forgetpwdSubmit" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>