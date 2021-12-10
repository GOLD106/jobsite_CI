<?php
/**
 * @author Leo: Security Services Landing Page
*/
?>

<!-- Top -->
<section class="top-section">
    <div class="layer">
        <!-- <div class="top-banner" style="background-image: url(<?=base_url().$category['category_image']?>);"></div> -->
        <div class="top-banner" style="background-image: url(/assets/img/<?=$page?>/banner.png);"></div>
        <div class="top-mask"></div>
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

<!-- Success Section -->
<section class="success-section section" style="background-image: url(/assets/img/<?=$page?>/about-banner.png);">
    <div class="section-header">
        <div class="header-1">
            <span>The Most Successful <span class="highlight">Security services</span></span>
        </div>
        <div class="header-2">
            <!-- <span>We are dedicated to providing Top Level Of Protection Security services.</span> -->
            <span>Tazzer Group provides a variety of high-quality security services with one goal in mind: to protect your business or personal interests.</span>
        </div>
    </div>
    <div class="success-list row">
        <div class="success-item col-lg-3 col-md-6 col-sm-12">
            <div class="success-img">
                <img src="<?=base_url()?>assets/img/<?=$page?>/image1.png">
            </div>
            <div class="success-content">
                <span>
                    <h4 class="success-title">Professional Agents</h4>
                    <text class="success-desc"></text>
                </span>
            </div>
        </div>
        <div class="success-item col-lg-3 col-md-6 col-sm-12">
            <div class="success-img">
                <img src="<?=base_url()?>assets/img/<?=$page?>/image2.png">
            </div>
            <div class="success-content">
                <span>
                    <h4 class="success-title">The best equipment</h4>
                    <text class="success-desc"></text>
                </span>
            </div>
        </div>
        <div class="success-item col-lg-3 col-md-6 col-sm-12">
            <div class="success-img">
                <img src="<?=base_url()?>assets/img/<?=$page?>/image3.png">
            </div>
            <div class="success-content">
                <span>
                    <h4 class="success-title">Prepared Agents</h4>
                    <text class="success-desc"></text>
                </span>
            </div>
        </div>
        <div class="success-item col-lg-3 col-md-6 col-sm-12">
            <div class="success-img">
                <img src="<?=base_url()?>assets/img/<?=$page?>/image4.png">
            </div>
            <div class="success-content">
                <span>
                    <h4 class="success-title">Enhanced Defense</h4>
                    <text class="success-desc"></text>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Service Block Section -->
<section class="service-section section">
    <div class="service-block row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Commercial" src="<?=base_url()?>assets/img/<?=$page?>/commercial.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <img src="<?=base_url()?>assets/img/<?=$page?>/commercial-icon.png">
                    <h3 class="title">Commercial</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Domestic" src="<?=base_url()?>assets/img/<?=$page?>/domestic.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <img src="<?=base_url()?>assets/img/<?=$page?>/domestic-icon.png">
                    <h3 class="title">Domestic</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Industrial" src="<?=base_url()?>assets/img/<?=$page?>/industrial.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <img src="<?=base_url()?>assets/img/<?=$page?>/industrial-icon.png">
                    <h3 class="title">Industrial</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="about-section section">
    <div class="about-block row">
        <div class="about-block-left col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-text">
                <span>- TazzerGroup</span>
            </div>
            <div class="header-1">
                <!-- <span>Private Security And Authorized By <br>The Police To Take Care Of Your <br>Security </span> -->
                <span>Tazzer Group provides a variety of security services centered on high quality and top standards; our code of conduct applies to all security provisions.</span>
            </div>
            <div class="header-2">
                <!-- <span>We are dedicated to providing the highest Security services.</span> -->
            </div>
            <div class="about-content">
                <!-- <p>There are many variations of passages of Domestic, randomised domestic available, randomized word which don't look even slightly believable but the majority suffered in some.</p> -->
                <ul class="about-features row">
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> Experienced guards</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> Customer service focus</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> We offer modern monitoring systems</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> We are available 24/7</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> State-of-the-art equipment</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> Safe Contractor Approved</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> UK and word wide Services</li>
                    <li class="col-md-6 col-sm-12"><i class="fa fa-check" aria-hidden="true"></i> Professional & Reliable</li>
                </ul>
            </div>
        </div>
        <div class="about-block-right col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div> -->
            <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/about.png">
        </div>
    </div>
</section>

<!-- Offer Section -->
<section class="offer-section section">
    <div class="offer-section-header">
        <div class="header-1">
            <span>Our Professional Services</span>
        </div>
        <div class="header-2">
            <!-- <span>Experienced Expert & Professional Staff.</span> -->
        </div>
    </div>
    <div class="feature-box row">
        <div class="feature-block-left col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/policeman1.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">24 HOURS SECURITY</h4>
                            <text class="feature-desc">We provide professionally trained and experienced security guards who can be deployed on-site anywhere in the UK within hours.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/cctv.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">CCTV</h4>
                            <text class="feature-desc">Our dedicated CCTV Monitoring station is available to monitor CCTV for your business or home 24/7.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/alarm-system.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">Home Security Services</h4>
                            <text class="feature-desc">We can remotely or physically give you security for you and your family. Our guards are very professional and respect your privacy.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/gate.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">Automated Gates & Bollards</h4>
                            <text class="feature-desc">We have extensive experience designing, installing, and maintaining automation solutions. We are an enriched organization because we are an affiliate of great technology partners all over the world.</text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-block-center col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <img class="offer-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/professional.png?v1.0">
        </div>
        <div class="feature-block-right col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/fire-extinguisher.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">Fire Extinguisher Inspection</h4>
                            <text class="feature-desc">We offer full-service fire and safety alarm and monitoring services, as well as licensed portable fire extinguisher inspections.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/fence.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">Security Fence Installation</h4>
                            <text class="feature-desc">Our security fence contractors can work quickly to ensure that your perimeter is not jeopardized.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/locksmith.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">Key-holding Services</h4>
                            <text class="feature-desc">Client keys are coded, security sealed, and stored in our Control Centre Safes. Our rapid response teams only have access to your keys when the alarms sound.</text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/fire-alarm.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">Fire Alarm System Installation</h4>
                            <text class="feature-desc">We provide comprehensive fire alarm installations to all types of properties, keeping you safe and in compliance with all fire safety legislation.</text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Join Us Now Section -->


<!-- Choose Us Section -->
<section class="choose-section section">
    <div class="choose-block row">
        <div class="choose-block-left col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <!-- <div class="header-text">Why Choose TazzerGroup</div> -->
            <div class="header-text">Why Tazzer group guards are the best </div>
            <div class="header-1">
                <span>We provide <span class="highlight">Top Level</span></span> <br><span class="highlight">Of Protection Service</span></span>
            </div>
            <div class="header-2">
                <!-- <span>we providing Construction services</span> -->
            </div>
            <div class="choose-content">
                <p></p>
                <!-- <ul class="choose-features">
                    <li><i class="fa fa-check" aria-hidden="true"></i>FREE ESTIMATES</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>MODERN EQUIPMENT</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>BEST EXPERIENCE</li>
                </ul> -->
                <div class="choose-list">
                    <div class="feature-item">
                        <div class="feature-img">
                            <img src="<?=base_url()?>assets/img/<?=$page?>/security.png">
                        </div>
                        <div class="feature-content">
                            <span>
                                <!-- <h4 class="feature-title">WALL SECURITY</h4> -->
                                <h4 class="feature-title">They are Honest  with integrity</h4>
                                <text class="feature-desc"></text>
                            </span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-img">
                            <img src="<?=base_url()?>assets/img/<?=$page?>/policeman2.png">
                        </div>
                        <div class="feature-content">
                            <span>
                                <!-- <h4 class="feature-title">25 YEARS OF EXPERIENCES</h4> -->
                                <h4 class="feature-title">Well trained</h4>
                                <text class="feature-desc"></text>
                            </span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-img">
                            <img src="<?=base_url()?>assets/img/<?=$page?>/policeman2.png">
                        </div>
                        <div class="feature-content">
                            <span>
                                <h4 class="feature-title">They have experience</h4>
                                <text class="feature-desc"></text>
                            </span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-img">
                            <img src="<?=base_url()?>assets/img/<?=$page?>/c-02.png">
                        </div>
                        <div class="feature-content">
                            <span>
                                <!-- <h4 class="feature-title">24/7 SERVICES</h4> -->
                                <h4 class="feature-title">Good in Communication</h4>
                                <text class="feature-desc"></text>
                            </span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-img">
                            <img src="<?=base_url()?>assets/img/<?=$page?>/security-guard.png">
                        </div>
                        <div class="feature-content">
                            <span>
                                <!-- <h4 class="feature-title">SELF MOTIVATED GUARDS</h4> -->
                                <h4 class="feature-title">Physical fitness</h4>
                                <text class="feature-desc"></text>
                            </span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-img">
                            <img src="<?=base_url()?>assets/img/<?=$page?>/security-guard.png">
                        </div>
                        <div class="feature-content">
                            <span>
                                <h4 class="feature-title">Alert and prepared</h4>
                                <text class="feature-desc"></text>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-block-right col-xl-4 col-lg-4 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div> -->
            <!-- <img class="choose-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/choose-us.png"> -->
        </div>
    </div>
</section>

<!-- Join Us Section -->
<section class="join-section section" style="background-image: url(/assets/img/<?=$page?>/join-us.png);">
    <div class="join-section-mask"></div>
    <div class="join-block">
        <div class="join-text">
            <div class="header-1">
                PREMIUM SECURITY SOLUTIONS <br>AT BEST PRICE
            </div>
            <div class="header-2">
                <!-- <span class="highlight">Happy, Healthy and Safe!</span> -->
            </div>
            <div class="join-desc">You'll enjoy knowing our dedicated team will do whatever is needed to keep your Family happy, healthy and safe when you're away from home.</div>
        </div>
        <div class="join-action">
            <button type="button" class="join-button btn" href="javascript:void(0);" data-toggle="modal" data-target="#modal-wizard1">
                JOIN US TODAY
            </button>
        </div>
    </div>
</section>

<!-- Exp Section -->
<section class="exp-section section">
    <div class="section-header">
        <div class="header-text">The TazzerGroup</div>
        <div class="header-2">
            <span>We Offer <span class="highlight">Different Service</span></span>
        </div>
    </div>
    <div class="exp-block row">
        <div class="exp-block-left col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
            <div class="exp-header">
                WE ARE READY TO PROVIDE SECURITY IN REASONABLE PRICE AND GUARANTEE YOUR SAFETY IN ANY SITUATION IN YOUR LIFE
            </div>
            <div class="exp-description">
                
            </div>
            <div class="exp-list">
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/certificate.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">CERTIFIRD COMPANY</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/trust.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">TRUSTED ORGANIZATIONS</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/protection.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">BEST EXPERIENCE</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="exp-block-right col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <img class="exp-block-image img-fluid" src="/assets/img/<?=$page?>/solution.png" alt="">
        </div>
    </div>
</section>

<!-- Service State -->
<section class="service-stat-section section" style="background-image: url(/assets/img/<?=$page?>/stat-banner.png?v1.0);">
    <div class="row" style="justify-content: flex-end">
        <div class="stat-panel">
            <h3 class="stat-header">All of our Specialists are Fully Trained</h3>
            <div class="stat-content">
                <div class="stat-item">
                    <div class="stat-num" style="background-image: url(/assets/img/<?=$page?>/like.png);"><span id="project-done">159</span></div>
                    <div class="stat-title">Project Done</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num" style="background-image: url(/assets/img/<?=$page?>/happy.png);"><span id="happy-clients">2500</span></div>
                    <div class="stat-title">Happy Clients</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Frequent Questions Section -->
<?php 
    // if (count($faqs) > 0) {
        ?>
<section class="question-section section">
    <div class="row">
        <div class="col-12 question-header section-header">
            <h3 class="header-top">FAQ'S</h3>
            <h2 class="header-text text-uppercase">Frequently Asked Questions</h2>
            <p class="header-desc">We're different from your typical company. We're out to create magic</p>
        </div>
    </div>

    <div class="question-block row">
        <div class="question-block-left col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <?php
                if (count($faqs) > 0) {
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
                }
            ?>
        </div>
        <div class="question-block-right col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <img class="question-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/hero-image.png">
        </div>
    </div>
</section>
        <?php
    // }
?>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_details/<?=$page?>.css?v1.05">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
    var popular_services = <?=json_encode($popular_services)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/service_details/<?=$page?>.js?v1.0"></script>