<?php
/**
 * @author Leo: Service Category Landing Page
*/
?>

<!-- Top -->
<section class="top-section">
    <div class="layer">
        <div class="top-banner" style="background-image: url(<?=base_url().$category['category_image']?>);"></div>
        <div class="top-mask"></div>  
        <!-- <div class="top-content">
            <div class="row">
                <div class="col-12">
                    <h2>Book <?=$category['category_name']?> in sec.</h2>
                </div>
            </div>
            <div class="row align-center justify-center"></div>
        </div> -->
        <!-- Search Block -->
        <div class="section-search">
            <div class="search-box">
                <div class="row">
                    <div class="col-12 search-box-header">
                        <h2 class="header-text">Book <?=$category['category_name']?> in sec.</h2>
                    </div>
                </div>
                <form action="<?php echo base_url(); ?>get-service-price" id="get_service" method="post"  class="needs-validation" novalidate>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group input-name">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                                <!-- <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Please fill out this field.</div> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group input-email">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                <!-- <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Please fill out correct email</div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group input-zipcode">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="" name="user_address" id="user_address" placeholder="Zipcode" required>
                                    <input type="hidden" value="" name="user_latitude" id="user_latitude">
                                    <input type="hidden" value="" name="user_longitude" id="user_longitude">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <a class="current-loc-icon current_location" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                                        </span>
                                        <!-- <span class="input-group-text">
                                            <a id="browse_map" class="current-loc-icon" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                                        </span> -->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group input-phone">
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone number" required minlength='5'>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group select-service-type">
                                <select class="form-control" name="sub_category" placeholder="Service Type" required>
                                    <option value="">Select Service Type</option>
                                    <?php
                                        foreach ($subCategory as $key => $value) {
                                            ?>
                                    <option value="<?=$value['id']?>"><?=$value['subcategory_name']?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group select-service">
                                <select class="form-control" name="service" placeholder="Service Type" required data-bv-callback="true" data-bv-callback-message="please select service" data-bv-callback-callback="selectValidation">
                                    <option value="">Select Service</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group input-bookdate">
                                <input type="text" class="form-control" name="date" placeholder="Date" id="booking_date" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group input-booktime">
                                <input type="time" class="form-control" name="time" placeholder="Time" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group textarea-desc">
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10 con">
                            <button type="button" class="btn get-price">Get Price</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- How it works -->
<section class="how-it-works-section section">
    <div class="row">
        <div class="col-12 how-it-works-header section-header">
            <h2 class="header-text">How it works</h2>
            <p>We've made all the hardwork for making it simple for you. Here's how it works</p>
        </div>
    </div>

    <div class="section-block row">

        <?php 
            if (count($how_to_work) > 0) {
                foreach($how_to_work as $value) {
                    ?>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="<?=$value["title"]?>" src="<?php echo base_url().$value['image'];?>" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3><?=$value["title"]?></h3>
            </div>
            <div class="service-description">
                <span><?=$value["content"]?></span>
            </div>
        </div>
                    <?php
                }
            }
            else {  // default
                ?>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="Book A Service" src="<?php echo base_url();?>assets/img/services/book.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Book A Service</h3>
            </div>
            <div class="service-description">
                <span>Click the book now button to make a booking on our preffered date and time</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="Confirm Booking" src="<?php echo base_url();?>assets/img/services/confirm.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Confirm Booking</h3>
            </div>
            <div class="service-description">
                <span>We will confirm your booking along with your instructions via secure transaction</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="We'll Clean it" src="<?php echo base_url();?>assets/img/services/clean.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>We'll Clean it</h3>
            </div>
            <div class="service-description">
                <span>Our trusted and experienced maid will come to your door-step on the time for a cleaning</span>
            </div>
        </div>
                <?php
            }
        ?>

    </div>
</section>
<!-- Don't take our words -->
<!-- <section class="donot-take-ourword-section section">
    <div class="row">
        <div class="col-12 section-header">
            <h2 class="header-text">Don't take our word</h2>
            <p>Read what our past customers said about our cleaning and services.</p>
        </div>
    </div>

    <div class="section-block row">
        <div class="customer-carousel owl-carousel">
            <?php 
                if (count($custom_compliments) > 0) {
                    foreach($custom_compliments as $value) {
                        $word = $value['content'];
                        ?>
            <div class="item">
                <div link="<?php echo base_url();?>" class="customer-box">
                    <div>
                        <img class="customer-photo" src="<?php echo base_url().$value['customer_image'];?>" transition="scale-transition">
                    </div>
                    <div>
                        <img class="quoto-mark" src="<?php echo base_url();?>assets/img/services/Quotemarks-right.png" transition="scale-transition">
                    </div>
                    
                    <div class="customer-description">
                        <span><?=substr($word, 0, 80).(strlen($word)>80?"...":"")?></span>
                    </div>
                    <div class="customer-name">
                        <span><?=$value['customer_name']?></span>
                    </div>
                </div>
            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</section> -->
<!-- bottom -->
<section class="bottom-section">
    <div class="layer">
        <div class="bottom-banner"></div>  
        <div class="bottom-mask"></div>  
        <div class="bottom-content">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h3>Over 200+ companies are already using Tazzer</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="<?php echo base_url(); ?>all-services/<?=replace_specials($category['category_name'])?>" class="bottom-button">Book Now</a>
                </div>
            </div>
            <div class="row align-center justify-center"></div>
        </div>
    </div>
</section>
<!-- Reasons to choose tazzer -->
<section class="reason-tazzer-section section">
    <div class="row">
        <div class="col-12 reason-tazzer-header section-header">
            <h2 class="header-text">Reasons to love Tazzer</h2>
            <p>We're different from your typical company. We are out to create magic</p>
        </div>
    </div>

    <div class="section-block row">
        
        <?php 
            if (count($reason_to_love) > 0) {
                foreach($reason_to_love as $value) {
                    ?>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="<?=$value["title"]?>" src="<?php echo base_url().$value['image'];?>" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3><?=$value["title"]?></h3>
            </div>
            <div class="service-description">
                <span><?=$value["content"]?></span>
            </div>
        </div>
                    <?php
                }
            }
            else {      // default
                ?>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="Trusted and Vetted Cleaners" src="<?php echo base_url();?>assets/img/services/trust.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Trusted and Vetted Cleaners</h3>
            </div>
            <div class="service-description">
                <span></span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="Customer Recommended" src="<?php echo base_url();?>assets/img/services/recommend.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Customer Recommended</h3>
            </div>
            <div class="service-description">
                <span></span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="notice-box">
            <div>
                <img alt="Commitment To Trust and Safety" src="<?php echo base_url();?>assets/img/services/commitment.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Commitment To Trust and Safety</h3>
            </div>
            <div class="service-description">
                <span></span>
            </div>
        </div>
                <?php
            }
        ?>

    </div>
</section>
<!-- Frequent Questions -->
<?php 
    if (count($faqs) > 0) {
        ?>
<section class="question-section section">
    <div class="row">
        <div class="col-12 question-header section-header">
            <h2 class="header-text">Frequently Asked Questions</h2>
            <p class="header-desc">We're different from your typical company. We're out to create magic</p>
        </div>
    </div>

    <div class="section-block row">
        <?php
            foreach ($faqs as $faq) {
                ?>
        <div class="question-item">
            <div class="faq-item-title">
                <span><?=$faq['question']?></span>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <div class="faq-item-content" style="display: none;">
                <hr>
                <?=$faq['answer']?>
            </div>
        </div>
                <?php
            }
        ?>
        
    </div>
</section>
        <?php
    }
?>

<!-- Why Choose Tazzer -->
<section class="why-choose-tazzer-section section">
    <div class="why-choose-carousel owl-carousel">
        <?php 
            if (count($why_choose) > 0) {
                foreach($why_choose as $value) {
                    ?>
        <div class="item">
            <div class="section-block">
                <div class="service-type-box row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 service-list-col">
                        <div class="choose-description-div">
                            <h2 class="header"><?=$value['title']?></h2>
                            <p class="description">
                                <?=$value['content']?>
                            </p>
                            <a href="<?=base_url()."search/".replace_specials($category['category_name'])?>" class="btn btn-primary book-btn">
                                <span>Book Now</span>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 service-image-col">
                        <div class="welcome-div">
                            <img class="welcome-image" src="<?=base_url().$value['image']?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <?php
                }
            }
        ?>
    </div>
    
</section>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_details/index.css?v1.0">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
    var popular_services = <?=json_encode($popular_services)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/service_details/index.js"></script>