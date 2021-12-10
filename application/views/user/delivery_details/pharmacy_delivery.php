<?php
/**
 * @author Leo: Pharmacy Delivery Landing Page
*/
?>

<!-- Top -->
<section class="hero-section">
    <div class="layer">
        <div class="ttr_banner_slideshow"></div>
        <div class="ttr_slideshow">
           <div id="ttr_slideshow_inner">
                <ul>
                    <li id="Slide0" class="ttr_slide" data-slideEffect="Blind" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=TEMPLATE_THEME?>/banner1.jpg&quot;);">
                        <a href="#"></a>
                        <div class="ttr_slideshow_last">
                           <div class="ttr_slideshowshape01" data-effect="RadialBlur" data-begintime="0" data-duration="1" data-easing="linear" data-slide="bottom">
                              <div class="html_content">

                                <div class="home-content content">
                                    <div class="row">
                                        <div class="white--text">
                                            <h3>WE ARE TAZZER GROUP!</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="white--text">
                                            <h2>Affordable And Flexible Pricing</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-30">
                                        <div class="display-5 white--text">
                                            <p> At Tazzer Group, you will find all professional services at affordable and flexible rates. We believe in providing quality work at cheapest prices. Put your business on the map by joining us as Partners , Professionals , Companies and sell your services </p>
                                        </div>
                                    </div>
                                    <div data-v-60e7013d="" class="width60">
                                        <div data-v-60e7013d="" style="display: flex;">
                                            <div data-v-60e7013d="" class="book-section">
                                                <a href="<?php echo base_url(); ?>all-deliveries" class="v-btn first-image-button">
                                                    ORDER NOW
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-60e7013d="" class="row align-center justify-center"></div>
                                </div>

                              </div>
                           </div>
                        </div>
                    </li>

                    <li id="Slide1" class="ttr_slide" data-slideEffect="RadialBlur" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/banner.png&quot;);">
                        <a href="#"></a>
                        <div class="ttr_slideshow_last">
                           <div class="ttr_slideshowshape01" data-effect="Fade" data-begintime="0" data-duration="1" data-easing="linear" data-slide="bottom">
                              <div class="html_content">

                                <div class="home-content content">
                                    <div class="row">
                                        <div class="white--text">
                                            <!-- <h3>WE ARE TAZZER GROUP!</h3> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="white--text">
                                            <h2>Tazzer Pharmacy helps you find solutions for your health</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-30">
                                        <div class="display-5 white--text">
                                            <p> </p>
                                        </div>
                                    </div>
                                    <div data-v-60e7013d="" class="width60">
                                        <div data-v-60e7013d="" style="display: flex;">
                                            <div data-v-60e7013d="" class="book-section">
                                                <a href="<?php echo base_url(); ?>all-deliveries" class="v-btn first-image-button">
                                                    ORDER NOW
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-60e7013d="" class="row align-center justify-center"></div>
                                </div>

                              </div>
                           </div>
                        </div>
                    </li>

                </ul>
           </div>
           <div class="ttr_slideshow_in">
              <div class="ttr_slideshow_last">
                 <div id="nav"></div>
              </div>
           </div>
        </div>
        <div class="ttr_banner_slideshow"></div>
    </div>
</section>

<div class="container search-block">
    <div class="row">          
        <div class="col-lg-9 con">
            <div class="section-search">
                <div class="search-box">
                    <form action="<?php echo base_url(); ?>delivery-search" id="search_delivery" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <!-- <div class="search-input line">
                            <span class="document-img"></span>
                            <div class="form-group mb-0">
                                <input type="text" class="form-control common_search" name="common_search" id="search-blk" placeholder="Please type what you want here" >
                            </div>
                        </div> -->
                        <div class="search-input delivery-input">
                            <span class="document-send"></span>
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" value="" name="user_address" id="user_address" placeholder="Postcode / Zipcode">
                                <input type="hidden" value="" name="user_latitude" id="user_latitude">
                                <input type="hidden" value="" name="user_longitude" id="user_longitude">
                                <a class="current-loc-icon current_location" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                            </div>
                        </div>
                        <div class="search-btn">
                            <button class="btn search_delivery" name="search" value="search"  type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <div class="search-cat">
                    <i class="fa fa-circle"></i>
                    <span><?php echo (!empty($user_language[$user_selected]['lg_popular_search'])) ? $user_language[$user_selected]['lg_popular_search'] : $default_language['en']['lg_popular_search']; ?></span>
                    <?php foreach ($popularServices as $popular_service) { ?>
                        <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $popular_service['service_title']) . '?sid=' . md5($popular_service['id']); ?>">
                            <?php echo $popular_service['service_title'] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT Section -->
<section class="about-section section">
    <div class="about-block row">
        <div class="about-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div> -->
            <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/about.png">
        </div>
        <div class="about-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-text">
                <span class="highlight">WE ARE TAZZER GROUP</span>
            </div>
            <div class="header-2">
                <span>Surprise your body with <br><span class="highlight">extra care..</span></span>
            </div>
            <div class="header-desc">
                <!-- <span>Everything you need to build an amazing Pharmacy Delivery Services</span> -->
            </div>
            <div class="about-content">
                <p>We want you to save money and time as you order the best health and wellness products for you and your family from us because you deserve the best. For quick fulfillment of your order, shopping is done from the closet pharmacy chain to your address.</p>
                <a href="<?php echo base_url(); ?>all-deliveries" class="v-btn tazzer-button">
                    ORDER NOW
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Order Section -->
<section class="order-section section" style="background-image: url(/assets/img/<?=$page?>/order-banner.png);">
    <div class="order-section-mask"></div>
    <div class="order-block row">
        <div class="order-block-left col-12">
            <div class="order-text">  
                <span>
                    <h2 class="order-title">
                        We Deliver to your Door !
                    </h2>
                    <text class="order-desc">
                        We want you to save money and time as you order the best health and wellness products for you and your family from us because you deserve the best.
                    </text>
                </span>
            </div>
            <a type="button" class="order-button btn" href="<?=base_url()?>all-deliveries">
                Order Now
            </a>
        </div>
    </div>
</section>

<!-- ABOUT Section -->
<section class="about2-section section">
    <div class="about-block row">
        <div class="about-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div> -->
            <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/about2.png">
        </div>
        <div class="about-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-text">
                <span>We provide Best services to deliver customer success</span>
            </div>
            <div class="header-2">
                <span class="highlight">Tazzer Pharmacy Delivery</span>
            </div>
            <div class="header-desc">
            </div>
            <div class="about-content">
                <p>You can deliver any item from one point to another through the Tazzer Pharmacy Delivery "Express delivery service". All you have to do is enter the addresses and start placing orders.</p>
                <ul class="about-features">
                    <li><i class="fa fa-check" aria-hidden="true"></i> Provided Multi Vendor Platform</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Best Products and Services</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Provide Better Experience, In Pharmacy</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> 100% Satisfaction every service</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- mid banner Section -->
<section class="banner-section section" style="background-image: url(/assets/img/<?=$page?>/ad-banner.png);">
    <div class="banner-section-mask"></div>
    <div class="banner-block">
        <div class="header-1">
            Go Global with Fast Delivery with Tazzer Group
        </div>
    </div>
</section>

<!-- ABOUT Section -->
<section class="about3-section section">
    <div class="about-block row">
        <div class="about-block-left col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about3.png&quot;);">
            </div>
        </div>
        <div class="about-block-right col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="header-text">
            </div>
            <div class="header-2">
                GET OUR <strong>Pharmacy TRUCK</strong> FOR YOUR NEXT EVENT
            </div>
            <div class="header-desc">
            </div>
            <div class="about-content">
                <a href="<?php echo base_url(); ?>all-deliveries" class="v-btn order-button">
                    ORDER NOW
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section section" style="background-image: url(/assets/img/<?=$page?>/mission-banner.png);">
    <div class="mission-section-mask"></div>
    <div class="mission-block row">
        <div class="mission-panel">
            <h3 class="mission-title">
                Pharmacy delivery : a mission to deliver anything
            </h3>
            <div class="mission-content">
                <div class="mission-item">
                    <a href="<?php echo base_url(); ?>all-deliveries" class="btn order-button">
                        Order Now
                    </a>
                </div>
                <div class="mission-item">
                    <button class="mission-button">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/play.png">
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- App Section -->
<section class="app-section section">
    <div class="app-block row">
        <div class="app-block-left col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="app-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/apps.png&quot;);">
            </div>
        </div>
        <div class="app-block-right col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <!-- <h3>OUR APPS</h3> -->
            <h1 class="header-1">Download App</h1>
            <p class="header-desc">You can deliver any item from one point to another through the Tazzer Pharmacy Delivery "Express delivery service"</p>
            <div>
                <a target="_blank" href="https://apps.apple.com/bg/app/tazzerclean">
                    <img alt="" src="<?php echo base_url();?>assets/img/<?=$page?>/app_store.png" transition="scale-transition">
                </a>
                <a target="_blank" href="https://play.google.com/store/apps/details?id=tazzerclean.co.uk">
                    <img alt="" src="<?php echo base_url();?>assets/img/<?=$page?>/google_play.png" transition="scale-transition">
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    /* Slideshow Function Call */
    if(jQuery('#ttr_slideshow_inner').length){
        jQuery('#ttr_slideshow_inner').TTSlider({
            slideShowSpeed:5000, begintime:5000,cssPrefix: 'ttr_'
        });
    }
</script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/delivery_details/<?=$page?>.css?v1.0">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/delivery_details/<?=$page?>.js"></script>