<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Stripe Gateway</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <ul class="nav nav-tabs menu-tabs">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . 'admin/settings'; ?>">General Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . 'admin/emailsettings'; ?>">Email Settings</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() . 'admin/stripe_payment_gateway'; ?>">Payment Gateway</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . 'admin/sms-settings'; ?>">SMS Gateway</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . 'admin/theme-color'; ?>">Theme Color Change</a>
            </li> -->
        </ul>



        <div class="row">
            <div class="col-lg-12">
                <div class="card">
				
                    <div class="card-body">
					
							<ul class="nav nav-tabs menu-tabs">
								<li class="nav-item active">
									<a class="nav-link" href="<?php echo base_url() . 'admin/stripe_payment_gateway'; ?>">Stripe</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() . 'admin/razorpay_payment_gateway'; ?>">Razorpay </a>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="<?php echo base_url() . 'admin/paypal_payment_gateway'; ?>">PayPal</a>
								</li>
								<!--<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() . 'admin/paytabs_payment_gateway'; ?>">PayTabs</a>
								</li>-->
							</ul>
							
							
                        <form action="<?php echo base_url() . 'admin/settings/edit/' . $list['id']; ?>" method="post">
                            <h4 class="text-primary">Stripe</h4>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label>Stripe Option</label>

                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input stripe_payment" id="test" name="gateway_type" value="test" type="radio" <?= ($list['gateway_type'] == "test") ? 'checked' : '' ?> >
                                        <label class="custom-control-label" for="test">Test</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input stripe_payment" id="live" name="gateway_type" value="live" type="radio"  <?= ($list['gateway_type'] == "live") ? 'checked' : '' ?> >
                                        <label class="custom-control-label" for="live">Live</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gateway Name</label>
                                <input  type="text" id="gateway_name" name="gateway_name"  value="<?php if (!empty($list['gateway_name'])) {
    echo $list['gateway_name'];
} ?>" required class="form-control" placeholder="Gateway Name">
                            </div>
                            <div class="form-group">
                                <label>API Key</label>
                                <input type="text" id="api_key" name="api_key" value="<?php if (!empty($list['api_key'])) {
    echo $list['api_key'];
} ?>" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Secret Key</label>
                                <input type="text" id="secret_key" name="secret_key" value="<?php if (!empty($list['secret_key'])) {
    echo $list['secret_key'];
} ?>" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Rest Key</label>
                                <input type="text" id="rest_key" name="rest_key" value="<?php if (!empty($list['rest_key'])) {
    echo $list['rest_key'];
} ?>" required class="form-control">
                            </div>
                            <div class="mt-4">
<?php if ($user_role == 1) { ?>
                                    <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Submit</button>
<?php } ?>

                                <a href="<?php echo base_url() . 'admin/stripe_payment_gateway' ?>" class="btn btn-link m-l-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
