<!-- <div class="breadcrumb-bar">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="breadcrumb-title">
					<h2> CONTACT <?php echo ($toFlag=='admin') ? 'ADMIN' : 'CUSTOMER';?> </h2>
				</div>
			</div>
			<div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href=" <?php echo base_url();?>"> <?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"> CONTACT  <?php echo ($toFlag=='admin') ? 'ADMIN' : 'CUSTOMER';?> </li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div> -->

<div class="content">
	<div class="container">
		<div class="row">
		 	<?php $this->load->view($theme.'/home/'.$theme.'_sidemenu');?>
		 	<div class="col-xl-9 col-md-8">
		 		<div class="row">
				 	<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
						<div class="contact-blk-content">
							<form method="post" enctype="multipart/form-data" id="contact_form" >
			          			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value=" <?php echo $this->security->get_csrf_hash(); ?>" />
								
								<?php #--> add by maksimU ?>
			    				<input type='hidden' id='contactto' name='to' value='<?php echo $toFlag ?>'>
								<?php if(!empty($toFlag) && $toFlag=='user' ) { ?>
								<div class="row" style='padding-bottom:1rem'>						
									<div class="col-lg-6">
										<label>Client</label>
										<select class="form-control" type="text" name="userId" id="userId" >
											<option value="0">select</option>
											<?php foreach($users as $user) {?>
												<option value='<?php echo $user['id'] ?>'><?php echo $user['name'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div >
								<?php } ?>
								<?php #<-- add end ?>

								<div class="row">
		                            <div class="col-lg-6">
		                                <div class="form-group">
		                                    <label>Name</label>
		                                    <input class="form-control" type="text" name="name" id="name">
		                                </div>
		                            </div>
		                            <div class="col-lg-6">
		                                <div class="form-group">
		                                    <label>Email</label>
		                                    <input class="form-control" type="text" name="email" id="email">
		                                </div>
		                            </div>

		                            <div class="col-lg-12">
		                                <div class="form-group">
		                                    <div class="text-center">
		                                        <div id="load_div"></div>
		                                    </div>
		                                    <label>Message</label>
		                                    <textarea class="form-control" name="message" id="message" rows="5"></textarea>
		                                </div>
		                            </div>

		                            <div class="col-lg-12">
		                                <div class="submit-section">
		                                    <button class="btn btn-primary submit-btn submit_service_book" type="submit" id="submit">Submit</button>
		                                </div>
		                            </div>
		                        </div>
							</form>					
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
		                <div class="contact-details">
		                    <div class="contact-info">
		                        <i class="fa fa-map-marker" aria-hidden="true"></i>
		                        <div class="contact-data">
		                            <h4>Address</h4>
		                            <p>South Yorkishre, S66 7AW</p>
		                        </div>
		                    </div>
		                    <hr>
		                    <div class="contact-info">
		                        <i class="fa fa-phone" aria-hidden="true"></i>
		                        <div class="contact-data">
		                            <h4>Phone</h4>
		                            <a href="tel:+44-079-6124-2587" class="contact-link">
		                                <p>(+44)079 6124 2587</p>
		                            </a>
		                        </div>
		                    </div>
		                    <hr>

		                    <div class="contact-info">
		                        <i class="fa fa-envelope"></i>
		                        <div class="contact-data">
		                            <h4>Email</h4>
		                            <a href="mailto:info@<?=str_replace("www.","",base_uri())?>" class="contact-link">
		                                <p>info@<?=str_replace("www.","",base_uri())?></p>
		                            </a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		 		</div>
		 	</div>
			
		</div>
	</div>
</div>

<?php 
	if (!empty($toFlag) && $toFlag=='user' ) {
		// code...
		if (count($users) == 0) {
			// code...
			?>

<script type="text/javascript">
	$(document).ready(function() {
		toaster_msg("info", "you do not have any customer yet!");
		swal({
            title: "Alert",
            text: "You don't have any customer yet!",
            icon: "info",
            button: "okay",
            closeOnEsc: false,
            closeOnClickOutside: false
        }).then(function() {
            window.history.back();
        });
	});
</script>

			<?php
		}
	}
?>