<?php
/**
 * @author Leo: Home And Office Transfer Services Landing Page
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

<!-- ABOUT -->
<section class="about-section section">
    <div class="section-header">
        <div class="header-text">The Tazzer Group</div>
        <div class="header-1">
            <span>Client Side <span class="highlight">House And Office Shifting</span> Services</span>
        </div>
        <div class="header-desc">
            <span>We provide hassle-free professional quality loading services at a very cost-effective price. Proper official goods packing, loading and moving are also of great importance.</span>
        </div>
    </div>
    <div class="about-block row">
        <div class="about-block-left col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="about-content">
                <p class="about-desc">In Door to Door Relocation services, both origin Relocation services and destination services are handled by the same professionals. Such a service makes the moving and packing experience completely tension-free, timesaving and rewarding. Movers and packers perform the complete packing processes in-house, take care of the cargo aspect and finally unpack the utilities at the point of usage. Door to Door Relocation services offer the convenience of delivery at the doorstep no matter whether Relocation is local, domestic or international.</p>
                <ul class="about-features">
                    <li><i class="fa fa-check" aria-hidden="true"></i>TRAINED STAFF</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>100% SATIFACTION GUARANTEED</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>QUALITY PACKAGING AND TRANSPORT</li>
                </ul>
            </div>
        </div>
        <div class="about-block-right col-xl-6 col-lg-6 col-md-6 col-sm-4">
            <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div>
            <!-- <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/about.png"> -->
        </div>
    </div>
</section>



<!-- Service Block Section -->
<section class="service-section section">
    <div class="service-block row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Domestic" src="<?=base_url()?>assets/img/<?=$page?>/home.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <img src="<?=base_url()?>assets/img/<?=$page?>/home-icon.png">
                    <h3 class="title">Home Shifting</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="service-box">
                <div class="service-box-image" link="<?php echo base_url();?>">
                    <img alt="Industrial" src="<?=base_url()?>assets/img/<?=$page?>/office.png" transition="scale-transition">
                </div>
                <div class="title-mask"></div>
                <div class="service-box-title">
                    <img src="<?=base_url()?>assets/img/<?=$page?>/office-icon.png">
                    <h3 class="title">Office Shifting</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="about-section unique-in-market section">
    <div class="section-header">
        <div class="header-1">
            <span>We are <span class="highlight">unique in market</span></span>
        </div>
        <div class="header-desc">
            <span>"we make it easy and possible" Office and home packing services involve packing countless files, cabinets, desks, chairs, all sensitive computer equipment, high-tech machinery and other innumerable office belongings.</span>
        </div>
    </div>
    <div class="about-block row">
        <div class="about-block-left col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="about-content">
                <p class="about-desc">House and office relocation services are made-up to be most noteworthy. More and more people relocate to different cities due to many reasons like promotion, transfer etc. Household relocation is most difficult and involves a lot of risk in it. There are many types of household goods such as glassware, show pieces, kitchen crockery, furniture etc. It is not possilbe for a person to handle the entire home relocation process and definitely there is a need of professional support.</p>
                <ul class="about-features">
                    <li><i class="fa fa-square" aria-hidden="true"></i> 100% satisfaction guaranteed</li>
                    <li><i class="fa fa-square" aria-hidden="true"></i> Verified and Trusted Partners</li>
                    <li><i class="fa fa-square" aria-hidden="true"></i> Transparent and Competitive pricing</li>
                    <li><i class="fa fa-square" aria-hidden="true"></i> Quality Packaging and Transport</li>
                </ul>
            </div>
        </div>
        <div class="about-block-right col-xl-6 col-lg-6 col-md-6 col-sm-4">
            <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/happy-family.png&quot;);">
            </div>
            <!-- <img class="about-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/happy-family.png"> -->
        </div>
    </div>
</section>

<!-- Join Us Section -->
<section class="join-section section" style="background-image: url(/assets/img/<?=$page?>/join-us.png);">
    <div class="join-section-mask"></div>
    <div class="join-block">
        <div class="join-text">
            <div class="header-1">
                We are working hard to make it Easy
            </div>
            <div class="header-2">
                <!-- <span class="highlight">Happy, Healthy and Safe!</span> -->
            </div>
            <div class="join-desc">The clients are given the option to choose between door to door or door to terminal services.</div>
        </div>
        <div class="join-action">
            <button type="button" class="join-button btn" href="javascript:void(0);" data-toggle="modal" data-target="#modal-wizard1">
                JOIN US TODAY
            </button>
        </div>
    </div>
</section>

<!-- Choose Us Section -->
<section class="choose-section section">
    <div class="choose-block row">
        <div class="choose-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <!-- <div class="about-block-image" style="background-image: url(&quot;<?=base_url();?>assets/img/<?=$page?>/about.png&quot;);">
            </div> -->
            <img class="choose-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/choose-us.png">
        </div>
        <div class="choose-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-text">Why Choose Us</div>
            <div class="header-2">
                <span>We are Tazzer Group! <br><span class="highlight">Transfer and Shifting Services</span></span>
            </div>
            <div class="header-2">
                <!-- <span>we providing Construction services</span> -->
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
</section>

<!-- Contact Us Section -->
<!-- <section class="contact-us-section section">
    <div class="contact-us-block row">
        <div class="contact-us-block-left col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="contact-us-text">  
                <span>
                    <h3 class="contact-us-title">
                        The move necessities and imperatives for office & Home Moving.
                    </h3>
                    <text class="contact-us-desc">
                        
                    </text>
                </span>
            </div>
        </div>
        <div class="contact-us-block-right col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <a href="<?=base_url()?>contact" class="contact-us-button btn">
                Contact us
            </a>
        </div>
    </div>
</section> -->

<!-- Exp Section -->
<section class="exp-section section">
    <div class="section-header">
        <div class="header-text">The TazzerGroup</div>
        <div class="header-2">
            <span>Book Best Packers and Movers at <span class="highlight">Lowest Price</span></span>
        </div>
    </div>
    <div class="exp-block row" style="background-image:url(/assets/img/<?=$page?>/solution.png?v1.0)">
        <div class="exp-block-left col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
            <div class="exp-header">
                Get Satisfied with the services we provide <span class="highlight">Office & Home Moving Services</span>
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
            <!-- <img class="exp-block-image img-fluid" src="/assets/img/<?=$page?>/solution.png" alt=""> -->
        </div>
    </div>
</section>

<!-- Service State -->
<section class="service-stat-section section" style="background-image: url(/assets/img/<?=$page?>/stat-banner.png?v1.0);">
    <div class="section-mask"></div>
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

    <div class="question-block">
        <div class="question-block-top row">
            <?php
                if (count($faqs) > 0) {
                    foreach ($faqs as $faq) {
                        ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style = "margin:auto">
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
    // }
?>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_details/<?=$page?>.css?v1.03">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
    var popular_services = <?=json_encode($popular_services)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/service_details/<?=$page?>.js?v1.0"></script>