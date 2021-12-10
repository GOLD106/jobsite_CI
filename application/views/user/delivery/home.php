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
                                                    ORDER A DELIVERY
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
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

                    <li id="Slide1" class="ttr_slide" data-slideEffect="RadialBlur" style="background-image: url(&quot;<?=base_url();?>assets/img/delivery/banner.png?v1.0&quot;);">
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
                                            <h2>WE ARE PROVIDING <br>ON-DEMAND DELIVERY</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-30">
                                        <div class="display-5 white--text">
                                            <!-- <p> At Tazzer Group, you will find all professional services at affordable and flexible rates. We believe in providing quality work at cheapest prices. Put your business on the map by joining us as Partners, Professional, Companies and sell your services. </p> -->
                                            <p><i class="fa fa-check" aria-hidden="true"></i> Fast Delivery</p>
                                            <p><i class="fa fa-check" aria-hidden="true"></i> Cheap Delivery</p>
                                            <p><i class="fa fa-check" aria-hidden="true"></i> Convenient</p>
                                            <p><i class="fa fa-check" aria-hidden="true"></i> Transparent</p>
                                        </div>
                                    </div>
                                    <div data-v-60e7013d="" class="width60">
                                        <div data-v-60e7013d="" style="display: flex;">
                                            <div data-v-60e7013d="" class="book-section">
                                                <a href="<?php echo base_url(); ?>all-deliveries" class="v-btn first-image-button">
                                                    ORDER A DELIVERY
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
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

<!-- Service Block Section -->
<section class="service-section section">
    <div class="section-header">
        <div class="header-1">What We Do</div>
        <div class="header-desc">Tazzer Group provides high quality, professional and on-demand services that are highly trusted and convenient with a highly professional team.</div>
    </div>
    <div class="service-block row">
        <?php 
            foreach($categoryList as $category) {
                $id = $category["id"];
                $categoryName = $category["category_name"];
                ?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url().'delivery-details/'.$id.'/'.replace_specials(strtolower(trim($categoryName)));?>">
                    <img alt="Commercial" src="<?=base_url().$category["card_image"]?>" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title"><?=$category["category_name"]?></h3>
                </div>
            </div>
        </div>
                <?php
            }
        ?>
    </div>
</section>

<!-- ABOUT Section -->
<section class="about-section section">
    <div class="about-block row">
        <div class="about-block-left col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-2">
                <span>Major benefis of <span class="highlight">On-Demand Delivery</span></span>
            </div>
            <div class="header-desc">
                <!-- <p>Tazzer Group provides high quality, professional and on-demand services that are highly trusted and convenient with a highly professional team.</p> -->
                <!-- <p>Tazzer Group will find all professional Delivery services at affordable and flexible rates. We believe in providing quality for less. Also, you can put your business on the map by joining us as Partners, Professionals, Companies and sell your services.</p> -->
            </div>
            <div class="about-content">
                <div class="about-item">
                    <div class="title">FAST</div>
                    <div class="description">
                        An on-demand Delivery service provides with a great opportunity to place orders in a flash. <br>Searching, booking/scheduling, paying, and reviewing orders can be handled with Tazzer Group. 
                    </div>
                </div>
                <div class="about-item">
                    <div class="title">CHEAP</div>
                    <div class="description">
                        Each on-demand delivery service has different prices and timing, so both business owners and customers can choose the service that fits their budget.
                    </div>
                </div>
                <div class="about-item">
                    <div class="title">CONVENIENT</div>
                    <div class="description">
                        The convenience of on-demand delivery. Tazzer Group of this type are handy at every stage of service delivery , providing users with instant access to smart search, real-time tracking, suitable methods of payment, and convenient and quick delivery.
                    </div>
                </div>
                <div class="about-item">
                    <div class="title">TRANSPARENT</div>
                    <div class="description">
                        Being transparent with customers contributes to establishing trust. To ensure transparency and build trust, on-demand delivery Services are fitted with feedback systems.
                    </div>
                </div>
                <!-- <p>There are many variations of passages of Domestic, randomised domestic available, randomized word which don't look even slightly believable but the majority suffered in some.</p> -->
                <!-- <ul class="about-features">
                    <li><i class="fa fa-check" aria-hidden="true"></i> WE ARE MORE FASTER IN DELIVERY PROCESS.</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> OUR SERVICES ARE SECURE AND ALL YOUR INFORMATIONS ARE CONFIDENTIAL.</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> WE PROVIDE INSIDE OR OUTSIDE COUNTRY DELIVERY</li>
                </ul> -->
            </div>
        </div>
        <div class="about-block-right col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/delivery/about.png&quot;);">
            </div> -->
            <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/delivery/about.png?v1.0">
        </div>
    </div>
</section>

<!-- Join Us Section -->
<section class="join-us-section section" style="background-image: url(/assets/img/delivery/join-us2.png);">
    <div class="join-us-section-mask"></div>
    <div class="join-us-block row">
        <div class="join-us-block-left col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="join-us-text">  
                <span>
                    <h3 class="join-us-title">
                        Bringing Revolution to Your On-Demand Delivery Services
                    </h3>
                    <text class="join-us-desc">
                        grow your delivery services, optimize operational efficiency, and deliver exceptional customer experience
                    </text>
                </span>
            </div>
        </div>
        <div class="join-us-block-left col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <button type="button" class="join-us-button btn" href="javascript:void(0);" data-toggle="modal" data-target="#modal-wizard1">
                Join us
            </button>
        </div>
        <div class="join-us-block-right col-xl-5 col-lg-5 col-md-5 col-sm-12">
            
        </div>
    </div>
</section>

<!-- ABOUT Section -->
<section class="about2-section section">
    <div class="about-block row">
        <div class="about-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/delivery/about.png&quot;);">
            </div> -->
            <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/delivery/professional.png">
        </div>
        <div class="about-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-2">
                <span>We provide Best services <br>to deliver customer success <br><span class="highlight">Tazzer Group Delivery</span></span>
            </div>
            <div class="header-desc">
                <p>You can deliver any item from one point to another through the Bangopure "Express delivery service". All you have to do is enter the addresses and start placing orders.</p>
            </div>
            <div class="about-content">
                <!-- <p></p> -->
                <ul class="about-features">
                    <li><i class="fa fa-check" aria-hidden="true"></i> Provided Multi Vendor Platform</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Just Eco Friendly Products and Services</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Provide Better Experience, Convenience and Confidence to Buy Or Sell</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> 100% Satisfaction every service</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- mid banner Section -->
<section class="banner-section section" style="background-image: url(/assets/img/delivery/delivery-banner.png);">
    <div class="banner-section-mask"></div>
    <div class="banner-block">
        <div class="header-1">
            Go Global with Fast Delivery with Tazzer Group
        </div>
    </div>
</section>

<!-- Offer Section -->
<section class="offer-section section">
    <div class="offer-section-header">
        <div class="header-text">
            <span>TAZZER GROUP</span>
        </div>
        <div class="header-1">
            <span>TAZZER GROUP DELIVERY SERVICES</span>
        </div>
        <div class="header-2">
            <!-- <span>Experienced Expert & Professional Staff.</span> -->
        </div>
    </div>
    <div class="feature-box row">
        <div class="feature-block-left col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/delivery/groceries.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">MARKET</h4>
                            <text class="feature-desc">To order food online from the supermarket.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/delivery/logistics.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">TRANSPORTATION & LOGISTICS</h4>
                            <text class="feature-desc">Transformation, new market entrants, changing customer expectations, and new evolving business models.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/delivery/fast-food.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">FOOD</h4>
                            <text class="feature-desc">To order meals online from restaurants</text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-block-center col-xl-4 col-lg-4 col-md-4 col-sm-2">
            <img class="offer-block-image img-fluid" src="<?=base_url();?>assets/img/delivery/about-men.png">
        </div>
        <div class="feature-block-right col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/delivery/medicine.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">PHARMACY</h4>
                            <text class="feature-desc">To order medicine online from a pharmacy.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/delivery/delivery-truck2.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">DELIVERY SERVICE</h4>
                            <text class="feature-desc">Send your parcels to any part of the city and the world with a few touches</text>
                        </span>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section section" style="background-image: url(/assets/img/delivery/mission-banner.png);">
    <div class="mission-section-mask"></div>
    <div class="mission-block row">
        <div class="mission-block-left col-xl-5 col-lg-5 col-md-7 col-sm-12">
            <div class="mission-text">  
                <span>
                    <h3 class="mission-title">
                        Tazzer group Delivery : a mission to <br>deliver anything
                    </h3>
                    <text class="missions-desc">
                    </text>
                </span>
            </div>
            <button class="mission-button">
                <img src="<?=base_url()?>assets/img/delivery/play-button.png">
            </button>
        </div>
        <div class="join-us-block-right col-xl-5 col-lg-5 col-md-5 col-sm-12">
            
        </div>
    </div>
</section>

<!-- App Section -->
<section class="app-section section">
    <div class="app-block row">
        <div class="app-block-left col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <img alt="" src="<?php echo base_url();?>assets/img/delivery/deliverymen.png" transition="scale-transition">
        </div>
        <div class="app-block-right col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <!-- <h3>OUR APPS</h3> -->
            <h1 class="header-1">Download App</h1>
            <p class="header-desc">World fastest growing transport & Delivery Services by Tazzer Group Put your business on the map by joining us as Partners</p>
            <div>
                <a target="_blank" href="https://apps.apple.com/bg/app/tazzerclean">
                    <img alt="" src="<?php echo base_url();?>assets/img/delivery/apple-store.png" transition="scale-transition">
                </a>
                <a target="_blank" href="https://play.google.com/store/apps/details?id=tazzerclean.co.uk">
                    <img alt="" src="<?php echo base_url();?>assets/img/delivery/google-play.png" transition="scale-transition">
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

<link rel="stylesheet" href="<?=base_url()?>assets/css/delivery/home.css?v1.03">
<script src="<?=base_url()?>assets/js/delivery/home.js?v1.01"></script>