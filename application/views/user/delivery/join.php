<?php
    $login_type='';
    if (isset($settings['login_type'])) {
        $login_type = $settings['login_type'];
    }
    $country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>
<style type="text/css">
    .asterisk:after {
      content:"* ";
      color:red;
    }
    .form-control.required:after {
        content:"* ";
        color:red;
    }
</style>
<div data-v-9cf711f2="" class="login-box container container--fluid" style="">
    <div data-v-9cf711f2="" class="mx-auto my-12 logincard v-card v-sheet theme--light">
        <div data-v-9cf711f2="" class="card-left" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=TEMPLATE_THEME?>/logo.png&quot;),url(&quot;<?=base_url();?>assets/img/login/Path1.png&quot;);">
            <h3 data-v-9cf711f2="" style="margin-top: 35%;">Welcome To TazzerGroup</h3>
            <p data-v-9cf711f2="">We provide safe vehicles and professional experts, which means you can expect a first class, reliable service.Call TazzerGroup today</p>
            <!-- <img data-v-9cf711f2="" alt="" src="<?=base_url()?>assets/img/login/login5.47298d50.png" transition="scale-transition" style="width: 80%;"> -->
        </div>
        <div data-v-9cf711f2="" class="card-right" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=TEMPLATE_THEME?>/logo.png&quot;),url(&quot;<?=base_url();?>assets/img/login/Path1.png&quot;);">
            <div data-v-9cf711f2="" class="v-card__title">
                <div data-v-9cf711f2="" class="row align-left justify-left" style="padding: 10px 8%;">
                    <h2 data-v-9cf711f2="" class="">Join Us</h2></div>
            </div>
            <br data-v-9cf711f2="">
            <div class="error-box">
                <span id="error"></span>
                <span id="mailid_error"></span>
                <span for='otp_number' id='otp_error_msg_login'></span>
                <span id="err_respwd"></span>
            </div>
            <div class="login-card-container">
                <?php 
                    $registerInput = $this->session->userdata("register_input");
                ?>
                <form method='post' id="new_third_page_user">
                    <div class="row">
                        <h3 class="col-md-12 mt-3"><strong><span class="asterisk"></span>Personal Details</strong></h3>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>First Name</label> -->
                            <input type="text" class="form-control border-dark required" name="userName" id='user_name' minlength="3" value="<?=$registerInput['name']?>" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Last Name</label> -->
                            <input type="text" class="form-control border-dark" name="last_name" id='l_name' minlength="3" value="<?=$registerInput['l_name']?>" placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Email</label> -->
                            <input type="email" class="form-control border-dark" name="userEmail" id='user_email' value="<?=$registerInput['email']?>" placeholder="Email">
                            <input type="hidden" class="form-control user_logintype" name="userLogintype" value="<?=$login_type?>">
                        </div>
                            <?php 
                                if($login_type=='email'){
                            ?>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Password</label> -->
                            <input type="password" class="form-control border-dark" name="userPassword" id='user_password' value="<?=$registerInput['password']?>" placeholder="Password">
                        </div>
                            <?php } ?>

                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Postal Code/zipcode</label> -->
                            <input type="text" name="postal_code" id="p_code" class="form-control border-dark" Placeholder="Enter Postal Code" value="<?=$registerInput['postal_code']?>">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>You are Applying As</label> -->
                            <select required="true" class="form-control" name="you_are_appling_as" id="are_appling_as">
                                <option value="">Applying As</option>
                                <?php 
                                $applyingAs = C_DELIVERY_APPLINGAS;
                                asort($applyingAs, SORT_STRING);
                                foreach($applyingAs as $key=>$value) {
                                    $select = "";
                                    if (is_array($registerInput) && isset($registerInput['you_are_appling_as'])) {
                                        if ($key==$registerInput['you_are_appling_as']) {$select='selected';}
                                    }
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
                        <h3 class="col-md-12 mt-5"><strong><span class="asterisk"></span>Mailing Address</strong></h3>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>House name</label> -->
                            <input type="text" name="house_name" id="h_name" value="" class="form-control border-dark" value="<?=$registerInput['house_name']?>" placeholder="House name">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>House or flat number</label> -->
                            <input type="text" name="house_number" id="h_number" value="" class="form-control border-dark" value="<?=$registerInput['house_number']?>" placeholder="House or flat number">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Street Address</label> -->
                            <input type="text" name="street_address" id="st_address" value="" class="form-control border-dark" value="<?=$registerInput['street_address']?>" placeholder="Street Address">
                        </div>

                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>City</label> -->
                            <input type="text" name="city" id="c_city" value="" class="form-control border-dark" value="<?=$registerInput['city']?>" placeholder="City">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label> County/ Province</label> -->
                            <input type="text" name="province" id="p_province" value="" class="form-control border-dark" value="<?=$registerInput['province']?>" placeholder="Country/ Province">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Postal Code</label> -->
                            <input type="text" name="postal_code2" id="p_postal_code" value="" placeholder="Enter Postal Code" class="form-control border-dark" value="<?=$registerInput['postal_code2']?>">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Mobile Code</label> -->
                            <select name="countryCode" id="country_code" class="form-control countryCode final_country_code">
                                <?php
                                foreach ($country_list as $key => $country) {
                                    if (is_array($registerInput) && isset($registerInput['country_code'])) {
                                        if ($country['country_code']==$registerInput['country_code']) {$select='selected';}else{ $select='';}
                                    } 
                                    else if($country['country_code']==$main_code){$select='selected';}else{ $select='';} ?>
                                <option <?=$select;?> data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>">
                                    <?=$country['country_name'];?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <!-- <label>Mobile Number</label> -->
                            <input type="text" class="form-control user_final_no user_mobile border-dark" placeholder="Enter Mobile Number" name="userMobile" id='user_mobile' value="<?=$registerInput['mobileno']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-control-xs custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="agreeCheckboxUser" id="agree_checkbox_user" value="1">
                            <label class="custom-control-label" for="agree_checkbox_user"><span class="asterisk"></span>I agree to
                                <?=$this->website_name?>
                            </label> <a tabindex="-1" href="<?=base_url()?>privacy" target="_blank">Privacy Policy</a> &amp; <a tabindex="-1" href="<?=base_url()?>terms-conditions" target="_blank"> Terms.</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="registration_submit_user" type="submit" class="login-btn btn">Register</button>
                    </div>
                    <div class="account-footer text-center">
                        Already have an account? <a href="<?=base_url()?>login">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/delivery/join.css">
<script type="text/javascript">
</script>
<script src="<?=base_url()?>assets/js/delivery/join.js"></script>