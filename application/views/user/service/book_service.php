<?php
/**
 * @modifier Vadim: modified book service process
*/

$service_details = $this->service->get_service_id($this->uri->segment('2'));

$user_currency_code = '';
$userId = $this->session->userdata('id');
$user_name = $this->session->userdata('name');
$email = $this->session->userdata('email');
$phone_number = $this->session->userdata('mobileno');

If (!empty($userId)) {
    $service_amount = $service_details['service_amount'];
    $get_currency = get_currency();
    $user_currency = get_user_currency();
    $user_currency_code = $user_currency['user_currency_code'];

    $service_amount = get_gigs_currency($service_details['service_amount'], $service_details['currency_code'], $user_currency_code);
} else {
    $user_currency_code = settings('currency');
    $service_amount = $service_details['service_amount'];
}    
?>
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="section-header text-center">
                    <h2>Book Service</h2>
                </div>

                <form action="<?php echo base_url(); ?>home/book_continue" method="post" enctype="multipart/form-data" autocomplete="off" id="book_services" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="currency_code" value="<?php echo $user_currency_code; ?>">
                    <input type="hidden" name="service" value="<?php echo md5($service_details['id']); ?>">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required  value = "<?php echo $full_name;  ?>" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required value = "<?= $email ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
						    <div class="form-group">
                                <label>Service Location <span class="text-danger">*</span></label>
                                <input type="text" id = "p_code" class="form-control" value="" name="user_address" id="user_address" placeholder="Zipcode">
                                <input type="hidden" value="" name="user_latitude" id="user_latitude">
                                <input type="hidden" value="" name="user_longitude" id="user_longitude">
                            </div>                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone number" value = "<?= $phone_number ?>">
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Service amount</label>
                                <input class="form-control" type="text" name="service_amount" id="service_amount" value="<?php echo currency_conversion($user_currency_code) . $service_amount; ?>" readonly="">
                            </div>
                        </div> -->
                        <div class="col-lg-6">
                           <div class="form-group">
                                <label>Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="date" id="booking_date" required>

                                <input type="hidden" name="provider_id" id="provider_id" value="<?php echo $service_details['user_id'] ?>">
                                <input type="hidden" name="service_id" id="service_id" value="<?php echo $service_details['id'] ?>">
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Time slot <span class="text-danger">*</span></label>
                                <select class="form-control from_time" name="time_slot" id="from_time" required>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="time" placeholder="Time" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <div id="load_div"></div>
                                </div>
                                <label>Notes</label>
                                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order" data-id="<?php echo $service_details['id']; ?>" data-provider="<?php echo $service_details['user_id'] ?>" data-amount="<?php echo $service_details['service_amount']; ?>" type="submit" id="book-continue">Continue to Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/book_service.js?v1.04"></script>