<?php
/**
 * @author Leo: Service Checkout Page
*/

$avg_rating = round($service['rating'], 2);
$userId = $this->session->userdata('id');
$user_currency = get_user_currency();
$user_currency_code = $user_currency['user_currency_code'];

$user_currency_symbol = currency_conversion($user_currency_code);
$service_currency_symbol = currency_conversion($service['currency_code']);
$coupon = 0;

$showPrice = show_price();

?>

<!-- Top -->
<section class="top-section">
    <div class="layer">
        <div class="top-banner" style="background-image: url(<?=base_url()?>assets/img/checkout/banner.jpg);"></div>  
        <div class="top-mask"></div>  
        <div class="top-content">
            <div class="row">
                <div class="col-12">
                    <h2 class="top-title">Checkout</h2>
                </div>
            </div>
            <div class="row align-center justify-center"></div>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="content-header">
                    <h2 class="content-title">Book Your Service in 60 seconds</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <!-- booking options -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Contact Information</div>
                        <div class="card-description">This information will be used to contact you about your service.</div>
                    </div>
                    <div class="card-body">
                        <div class="service-address">
                            <form action="#" id="address-form" method="post"  class="needs-validation" novalidate>
                                <div class="form-row">
                                    <?php
                                        $name = $booking_data["booking_first_name"].(isset($booking_data["booking_last_name"])?" ".$booking_data["booking_last_name"]:"");
                                        $email = $booking_data["booking_email"];
                                        $phone = $booking_data["booking_phonenumber"];
                                        $user_address = $booking_data["booking_user_address"];
                                        $user_latitude = $booking_data["booking_user_latitude"];
                                        $user_longitude = $booking_data["booking_user_longitude"];
                                        $address = $booking_data["booking_street_address_1"];
                                        $country_id = $booking_data["booking_country"];
                                        $state_id = $booking_data["booking_state"];
                                        $city_id = $booking_data["booking_city"];
                                        $description = $booking_data["booking_description"];
                                    ?>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="name" placeholder="Enter your Name *" value="<?=$name?>" required>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="email" placeholder="Enter your Email id *" value="<?=$email?>" required>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?=$user_address?>" name="user_address" id="user_address" placeholder="Zipcode *" required>
                                            <input type="hidden" value="<?=$user_latitude?>" name="user_latitude" id="user_latitude">
                                            <input type="hidden" value="<?=$user_longitude?>" name="user_longitude" id="user_longitude">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <a class="current-loc-icon current_location" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="phone" placeholder="Enter your Phone no *" value="<?=$phone?>" required minlength='5'>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="address" placeholder="Enter your Address *" value="<?=$address?>" required>
                                    </div>

                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="country_region" placeholder="Enter your Address *" value="<?=$country_id?>" required>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="state" placeholder="Enter your Address *" value="<?=$state_id?>" required>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <input class="form-control" type="text" name="town_city" placeholder="Enter your Address *" value="<?=$city_id?>" required>
                                    </div>


                                    
                                    <!--
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <select class="form-control" name="country_region" required>
                                            <option value="">Select Country *</option>
                                            <?php 
                                                foreach($country as $row){
                                                    $selected = ($row['id'] == $country_id)?"selected":"";
                                                    ?>
                                            <option <?=$selected?> value='<?php echo $row['id'];?>'><?php echo $row['country_name'];?></option> 
                                                    <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <select class="form-control" name="state" required>
                                            <option value="">Select State *</option>
                                        </select>
                                    </div>
                                    <div class="form-group col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <select class="form-control" name="town_city" required>
                                            <option value="">Select City *</option>
                                        </select>
                                    </div>
                                    -->

                                    <div class="form-group col-12">
                                        <textarea class="form-control" name="description" placeholder="Description"><?=$description?></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Your Services</div>
                    </div>
                    <div class="card-body">
                        <div class="card-item">
                            <div class="service-list-block">
                                <div class="service-list">
                                    <!-- <div class="service-item active">
                                        <img class="service-img" src="<?=base_url()?>assets\img\services\icon1.png">
                                        <div class="service-title-box">
                                            <div class="service-title">
                                                <span>Cleaning Service</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-item">
                                        <img class="service-img" src="<?=base_url()?>assets\img\services\icon2.png">
                                        <div class="service-title-box">
                                            <div class="service-title">
                                                <span>Clearance and Rubbish Removal</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="service-add">
                                    <a href="javascript:void(0)" class="service-add-btn"  data-toggle="modal" data-target="#service-add-modal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <div class="">
                                        Add more Services
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-item">
                            <div class="service-detail-box">
                                <div class="detail-header">Service Requested</div>
                                <div class="detail-description">When would you like us to come?</div>
                                <div class="detail-content">
                                    <div class="form-row">
                                        <?php 
                                            $bookingDate = date("m/d/Y", strtotime($booking_data["booking_date"]));
                                            $bookingTime = $booking_data["booking_time"];
                                        ?>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group input-bookdate">
                                                <input type="text" class="form-control" name="date" placeholder="Select Date" id="booking_date" value="<?=$bookingDate?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group input-booktime">
                                                <input type="time" class="form-control" name="time" placeholder="Select Time" id="booking_time" value="<?=$bookingTime?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-detail-box">
                                <div class="detail-header">How Often?</div>
                                <div class="detail-description">It's all about matching you with the perfect cleaner for your home. Scheduling is flexible. Cancel or reschedule anytime.</div>
                                <div class="detail-content">
                                    <div class="duration-item active">
                                        <div class="duration-title-box">
                                            <div class="duration-title">
                                                <div class="title-header">One time Service</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="duration-item">
                                        <div class="duration-title-box">
                                            <div class="duration-title">
                                                <div class="title-header">Weekly</div>
                                                <div class="title-descripion">15.00% discount</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="duration-item">
                                        <div class="duration-title-box">
                                            <div class="duration-title">
                                                <div class="title-header">Every 2 Weeks</div>
                                                <div class="title-descripion">10.00% discount</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="duration-item">
                                        <div class="duration-title-box">
                                            <div class="duration-title">
                                                <div class="title-header">Every 4 Weeks</div>
                                                <div class="title-descripion">5.00% discount</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-detail-box">
                                <div class="detail-header">Extra Services</div>
                                <div class="detail-description">We've made all the hardwork for making it simple for you. Here's how it works.</div>
                                <div class="detail-content">
                                    <div class="extra-service-item">
                                        <img class="extra-service-img" src="<?=base_url()?>assets\img\checkout\wardrobe.png">
                                        <div class="extra-service-title-box">
                                            <div class="extra-service-title">
                                                Inside cabinets
                                            </div>
                                        </div>
                                    </div>
                                    <div class="extra-service-item active">
                                        <img class="extra-service-img" src="<?=base_url()?>assets\img\checkout\fridge.png">
                                        <div class="extra-service-title-box">
                                            <div class="extra-service-title">
                                                Inside fridge
                                            </div>
                                        </div>
                                    </div>
                                    <div class="extra-service-item">
                                        <img class="extra-service-img" src="<?=base_url()?>assets\img\checkout\oven.png">
                                        <div class="extra-service-title-box">
                                            <div class="extra-service-title">
                                                Inside oven
                                            </div>
                                        </div>
                                    </div>
                                    <div class="extra-service-item">
                                        <img class="extra-service-img" src="<?=base_url()?>assets\img\checkout\washing-machine.png">
                                        <div class="extra-service-title-box">
                                            <div class="extra-service-title">
                                                Laundry wash & dry
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 theiaStickySidebar">
                <div class="card order-summary">
                    <div class="card-header">
                        <div class="card-title">Order Summary</div>
                    </div>
                    <div class="card-body">
                        <div class="card-item">
                            <div class="order-list">
                                <!-- <div class="order-item">
                                    <div class="order-item-close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                    <img class="order-img" src="<?=base_url()?>assets\img\services\icon1.png">
                                    <div class="order-title-box">
                                        <div class="order-title">
                                            <span>Cleaning Service</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-item">
                                    <div class="order-item-close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                    <img class="order-img" src="<?=base_url()?>assets\img\services\icon2.png">
                                    <div class="order-title-box">
                                        <div class="order-title">
                                            <span>Clearance and Rubbish Removal</span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <hr>
                        <div class="card-item">
                            <h3 class="card-header-text">Minimum 6 Months</h3>
                        </div>
                        <?php 
                            $date = "---";
                            $time = "---";
                            if (isset($booking_data['booking_date'])) {
                                $date = date("j F, Y",strtotime($booking_data['booking_date']));
                            }
                            if (isset($booking_data['booking_time'])) {
                                $time = date("g:i a",strtotime($booking_data['booking_time']));
                            }
                        ?>
                        <div class="card-item">
                            <span class="item-title">Date of Booking</span>
                            <span class="item-value" id="booking-date"><?=$date?></span>
                        </div>
                        <div class="card-item">
                            <span class="item-title">Time</span>
                            <span class="item-value" id="booking-time"><?=$time?></span>
                        </div>
                        <hr>
                        <div class="card-item total-payable">
                            <span class="item-title">Total Payable</span>
                            <span class="item-value" id="total_price">$ 0</span>
                        </div>
                    </div>
                    <!-- <div class="card-footer">Footer</div> -->
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Payment Information</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="agree_checkbox_user" id="agree_checkbox_user1" value="1" required>
                                <label class="custom-control-label" for="agree_checkbox_user1">I have read and accept the <a href="<?=base_url()?>terms-conditions" target="_blank">Terms & Conditions</a>
                                </label>
                            </div>
                        </div>
                        <?php 
                            if ($this->session->userdata('id')) {
                                ?>
                        <div class="form-group">
                            <div class="custom-control custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" id="payment_method1" value="wallet" required>
                                <label class="custom-control-label" for="payment_method1">Pay From Your Wallet</label>
                            </div>
                        </div>
                                <?php
                            }
                        ?>
                        <div class="form-group">
                            <div class="custom-control custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" id="payment_method2" value="paypal" required>
                                <label class="custom-control-label" for="payment_method2">Pay By Other Payment Method</label>
                            </div>
                        </div>
                        <button id="booking-complete" type="button" class="btn tazzergroup-btn btn-block">Complete Booking</button>
                        <div id="paypal-button-container"></div>                        
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</section>

<!-- Add Service Modal -->
<!-- Using Bootstrap Modal -->
<div class="modal fade" id="service-add-modal" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form method='post' id="add_service_form">
                    <div class="row">
                        <div class="form-group col-12">
                            <select class="form-control" name="category" required>
                                <option value="">Select Category *</option>
                                <?php
                                    foreach ($categoryList as $key => $value) {
                                        ?>
                                <option value="<?=$value['id']?>"><?=$value['category_name']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <select class="form-control" name="subcategory" required>
                                <option value="">Select Service Type *</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <select class="form-control" name="service" required>
                                <option value="">Select Service *</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <button id="submit_add_service" type="submit" class="tazzergroup-btn btn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add</button>
            </div> -->
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_checkout/index.css?v1.04">
<script type="text/javascript">
    var userId = <?=json_encode($userId)?>;
    var userCurrencyCode = <?=json_encode($user_currency_code)?>;
    var categoryList = <?=json_encode($categoryList)?>;
    var subCategoryList = <?=json_encode($subCategoryList)?>;
    var serviceList = <?=json_encode($serviceList)?>;
    var bookingData = <?=json_encode($booking_data)?>;
    // console.log(bookingData);
</script>
<script src="<?php echo base_url(); ?>assets/js/country_list.js"></script>
<script src="<?php echo base_url(); ?>assets/js/service_checkout/index.js?v1.04"></script>

<script src="https://www.paypal.com/sdk/js?client-id=<?=$paypal_client_id;?>&components=buttons,marks,messages,funding-eligibility&currency=<?=$user_currency_code;?>&enable-funding=venmo"> // Replace YOUR_CLIENT_ID with your sandbox client ID
</script>