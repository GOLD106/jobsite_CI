<?php
/**
 * @author Leo: Computer Recycling Services Landing Page
*/
?>

<!-- Top -->
<section class="top-section">
    <div class="layer">
        <!-- <div class="top-banner" style="background-image: url(<?=base_url().$category['category_image']?>);"></div> -->
        <div class="top-banner" style="background-image: url(/assets/img/<?=$page?>/banner2.png);"></div>
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

<!-- ABOUT -->
<section class="about-section section" style="background-image: url(/assets/img/<?=$page?>/about_banner.png);">
    <div class="section-mask"></div>
    <div class="section-header">
        <div class="header-text">The Tazzer Group</div>
        <div class="header-1">
            <span>We are a Provider of secure computer recycling services.</span></span>
        </div>
        <div class="header-2">
            <p>Tazzer Group provides e-Waste recycling of various products including computers, laptops, computer accessories, TVs and printers. You will also get a free pick up of computer chairs, table /desk.</p>
        </div>
    </div>
    <div class="about-block row">
        <div class="about-block-left col-xl-8 col-lg-9 col-md-10 col-sm-12">
            <div class="about-content">
                <p class="about-desc">Recycling electronics is an eco-friendly process. We process used electronics to make the material for reuse. Our goal is to turn everything we collect into a reusable stream of devices. We support underprivileged children and help them by providing them with free laptops and computers from the products we collect from you. Given back to the community is what makes us tick as a company.</p>
                <div class="header-text">
                    WHAT WE COLLECT AND RECYCLE:
                </div>
                <ul class="about-features row">
                    <li class="col-md-4 col-sm-6 col-6"><i class="fa fa-check" aria-hidden="true"></i> Computers</li>
                    <li class="col-6"><i class="fa fa-check" aria-hidden="true"></i> SSD</li>
                    <li class="col-md-4 col-sm-6 col-6"><i class="fa fa-check" aria-hidden="true"></i> Laptops</li>
                    <li class="col-6"><i class="fa fa-check" aria-hidden="true"></i> Mobile Phone</li>
                    <li class="col-md-4 col-sm-6 col-6"><i class="fa fa-check" aria-hidden="true"></i> Hard Drives</li>
                    <li class="col-6"><i class="fa fa-check" aria-hidden="true"></i> Networking IT Hardware</li>
                    <li class="col-md-4 col-sm-6 col-6"><i class="fa fa-check" aria-hidden="true"></i> Printers</li>
                    <li class="col-6"><i class="fa fa-check" aria-hidden="true"></i> All IT related items</li>
                    <li class="col-md-4 col-sm-6 col-6"><i class="fa fa-check" aria-hidden="true"></i> Monitors</li>
                </ul>
            </div>
        </div>
        <div class="about-block-right col-xl-4 col-lg-3 col-md-2 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div> -->
            <!-- <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/about.png"> -->
        </div>
    </div>
</section>

<!-- Jon Us / Contact type Section -->
<section class="contact-us-section section">
    <div class="contact-us-block row">
        <div class="contact-us-block-left col-xl-9 col-lg-9 col-md-8 col-sm-12">
            <div class="contact-us-text">  
                <span>
                    <h3 class="contact-us-title">
                        Secure Computer and e-Waste Recycling by TazzerGroup
                    </h3>
                    <text class="contact-us-desc">
                        
                    </text>
                </span>
            </div>
        </div>
        <div class="contact-us-block-right col-xl-3 col-lg-3 col-md-4 col-sm-12">
            <a href="javascript:void(0);" class="contact-us-button btn" data-toggle="modal" data-target="#modal-wizard1">
                Join Now
            </a>
        </div>
    </div>
</section>

<!-- ABOUT 2 Section -->
<section class="about2-section section">
    <div class="section-header">
        <!-- <div class="header-text">The Tazzer Group</div> -->
        <div class="header-1">
            <span>Best & Secured Computer or e-Waste Recycling by <span class="highlight">Tazzer Group</span></span>
        </div>
        <!-- <div class="header-2">
            <span>Tazzer Group provides public and all type of businesses with free e-Waste recycling including Computer, Laptops, computer accessories, TVs and printers. You will also get free pick up of computer chairs, table /desk if we collect a large quantity of IT.</span>
        </div> -->
    </div>
    <div class="about-block row">
        <div class="about-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about3.png&quot;);">
            </div>
        </div>
        <div class="about-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="about-content">
                <p class="about-desc">We have advanced team of professionals with years of experience that made us a leading IT recycler or e-Waste Recycler. We cover domestic, commercial, industrial sector including schools, hospitals, colleges and universities. Our main aim is to provide hassle free experience related to any IT disposal and provide our customers with the best Computer Recycling Service. <!-- <br><br>TazzerGroup offers pick-up services for no cost to your business. At Tazzer Group, we are responsible for operating safe and secure recycling programs for any type of residents or businesses. --></p>
            </div>
        </div>
    </div>
</section>

<!-- Service Block Section -->
<section class="service-section section">
    <div class="service-block row">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Computers" src="<?=base_url()?>assets/img/<?=$page?>/computers1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Computers</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Laptops" src="<?=base_url()?>assets/img/<?=$page?>/laptops1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Laptops</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Hard Drivers" src="<?=base_url()?>assets/img/<?=$page?>/hard_driver.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Hard Drivers</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Printers" src="<?=base_url()?>assets/img/<?=$page?>/printers1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Printers</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Monitors" src="<?=base_url()?>assets/img/<?=$page?>/monitors1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Monitors</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="SSD" src="<?=base_url()?>assets/img/<?=$page?>/ssd1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">SSD</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Mobile Phone" src="<?=base_url()?>assets/img/<?=$page?>/mobile_phone1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Mobile Phone</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Networking IT Hardware" src="<?=base_url()?>assets/img/<?=$page?>/networking_it_hardware1.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <h3 class="title">Networking IT Hardware</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How it works -->
<section class="how-it-works-section section">
    <div class="row">
        <div class="col-12 how-it-works-header section-header">
            <h2 class="header-text text-uppercase">Our Process</h2>
            <p>Tazzer Group offers pick-up services for no cost to your business. At Tazzer Group, we are responsible for operating safe and secure recycling programs for any type of residents or businesses.</p>
        </div>
    </div>

    <div class="section-block row">
        <img src="<?=base_url()?>assets/img/<?=$page?>/how_it_works.png" class="img-fluid how-it-works-img">
        <div class="how-it-works-content row">
            <div class="how-it-works-box box1">
                <div class="box-title">
                    Contact Us
                </div>
                <div class="box-description">
                    You contact us and provide detailed information about computer equipment you have for disposal.
                </div>
            </div>
            <div class="how-it-works-box box2">
                <div class="box-title">
                    Info
                </div>
                <div class="box-description">
                    We collect info & provide a quotation, data destruction& required paperwork for Computer recycling.
                </div>
            </div>
            <div class="how-it-works-box box3">
                <div class="box-title">
                    Arrangement
                </div>
                <div class="box-description">
                    Our team arrange our own secured transportation to collect the equipment.
                </div>
            </div>
            <div class="how-it-works-box box4">
                <div class="box-title">
                    Recycling
                </div>
                <div class="box-description">
                    At our Recycling ware house, we completely recycle the equipment. Hard Drives are destroyed and the complete process is documented.
                </div>
            </div>
            <div class="how-it-works-box box5">
                <div class="box-title">
                    Certification
                </div>
                <div class="box-description">
                    Once all the processes are complete, we issue a recycling report and data destruction certificate.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Offer Section -->
<section class="offer-section section">
    <div class="offer-section-header">
        <div class="header-text">The TazzerGroup</div>
        <div class="header-1">
            <span>Why choose <span class="highlight">Tazzer Group</span></span>
        </div>
        <div class="header-desc">
            <p> With Tazzer Group, you need not to worry about your privacy as we remove all hard drives and storage devices and completely destroy the data. We test the equipment if it can be reused and if the equipment is too old, then we recycle it. We highly take care of recycling your equipment without the risk of any data breach. </p>
        </div>
    </div>
    <div class="feature-box row">
        <div class="feature-block-left col-xl-4 col-lg-4 col-md-5 col-sm-12">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/free-delivery.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">FREE SERVICE</h4>
                            <text class="feature-desc"><!-- 95% of our services are provided free of charge because we’re able to generate revenue from your redundant IT --></text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/encrypted.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">PROFESSIONAL AND SECURE</h4>
                            <text class="feature-desc"><!-- Our entire service is completed to the highest industry standards with our key principles being Customer Satisfaction, Data Security and Professionalism. --></text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/satisfied.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">GUARANTEED DATA DESTRUCTION</h4>
                            <text class="feature-desc"><!-- We operate industry leading data destruction machinery and technology ensuring irreversible destruction. --></text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-block-center col-xl-4 col-lg-4 col-md-2 col-sm-1">
            <img class="offer-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/hero-image.png?v1.01">
        </div>
        <div class="feature-block-right col-xl-4 col-lg-4 col-md-5 col-sm-12">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/report.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">FULL REPORTING</h4>
                            <text class="feature-desc"><!-- We provide various levels of reporting to meet your specific requirements. --></text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/accreditation.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">ACCREDITED</h4>
                            <text class="feature-desc"><!-- Tazzer Group are UKAS accredited to all international standards – Quality, Environmental, Data Security, Health and Safety, Business Continuity and Energy Efficiency. --></text>
                        </span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/certificate.png">
                    </div>
                    <div class="feature-content">
                        <span>
                            <h4 class="feature-title">EXPERTISE</h4>
                            <text class="feature-desc"><!-- We have years of specialist IT recycling experience and have handled 1000s of unique IT disposal projects. --></text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Choose Us Section -->
<!-- <section class="choose-section section">
    <div class="choose-block row">
        <div class="choose-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <img class="choose-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/choose-us.png">
        </div>
        <div class="choose-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-text">Why Choose Us</div>
            <div class="header-2">
                <span>We are Tazzer Group! <br><span class="highlight">Property and Facilities-Management</span></span>
            </div>
            <div class="header-2">
                <span>we providing Construction services</span>
            </div>
            <div class="choose-content">
                <p></p>
                <ul class="choose-features">
                    <li><i class="fa fa-check" aria-hidden="true"></i>FREE ESTIMATES</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>MODERN EQUIPMENT</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>BEST EXPERIENCE</li>
                </ul>
            </div>
        </div>
    </div>
</section> -->

<!-- Join Us Section -->
<!-- <section class="join-section section" style="background-image: url(/assets/img/<?=$page?>/join-us.png);">
    <div class="join-section-mask"></div>
    <div class="join-block">
        <div class="join-text">
            <div class="header-1">
                Property and Facilities-Management
            </div>
            <div class="header-2">
                <span class="highlight">Happy, Healthy and Safe!</span>
            </div>
            <div class="join-desc">You'll enjoy knowing our dedicated team will do whatever is needed to keep you happy.</div>
        </div>
        <div class="join-action">
            <button type="button" class="join-button btn" href="javascript:void(0);" data-toggle="modal" data-target="#modal-wizard1">
                JOIN US TODAY
            </button>
        </div>
    </div>
</section> -->

<!-- Exp Section -->
<!-- <section class="exp-section section">
    <div class="section-header">
        <div class="header-text">The TazzerGroup</div>
        <div class="header-2">
            <span>The Best <span class="highlight">Property and Facilities Management Services</span></span>
        </div>
    </div>
    <div class="exp-block row">
        <div class="exp-block-left col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
            <div class="exp-header">
                Get Satisfied with the services we provide Propert and Facilities Management
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
                        <img src="<?=base_url()?>assets/img/<?=$page?>/satisfied.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">100% SATISFIED CUSTOMERS</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/file.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">COMFORTABLE PRICE</h4>
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
</section> -->

<!-- Service State -->
<!-- <section class="service-stat-section section" style="background-image: url(/assets/img/<?=$page?>/stat-banner.png?v1.0);">
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
</section> -->

<!-- Frequent Questions Section -->
<?php 
     if (count($faqs) > 0) {
        ?>
<section class="question-section section">
    <div class="row">
        <div class="col-12 question-header section-header" >
            <h3 class="header-top">FAQ'S</h3>
            <h2 class="header-text text-uppercase">Frequently Asked Questions</h2>
            <p class="header-desc">We're different from your typical company. We're out to create magic</p>
        </div>
    </div>

    <div class="question-block">
        <div class="question-block-top row">
            <?php
                if (count($faqs) > 0) {
                    foreach ($faqs as $faq) {
                        ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style = "margin:auto;">
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
            </div>
                        <?php
                    }
                }
            ?>
        </div>
        <div class="question-block-bottom">
            <img class="question-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/hero-image.png">
        </div>
    </div>
</section> 
        <?php
     }
?>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_details/<?=$page?>.css?v1.02">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
    var popular_services = <?=json_encode($popular_services)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/service_details/<?=$page?>.js?v1.0"></script>