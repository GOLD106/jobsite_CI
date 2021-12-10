<?php
/**
 * @author Leo: Dog Walking And Pet Service Landing Page
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
    <div class="about-block row">
        <div class="about-block-left col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-1">
                <span>Best Agency For <span class="highlight">You Pet</span></span>
            </div>
            <div class="header-2">
                <span>We are dedicated to providing the highest level of pet care and veterinary services.</span>
            </div>
            <div class="about-content">
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p> -->
                <ul class="about-features row">
                    <li class="col-md-6"><i class="fa fa-check" aria-hidden="true"></i>EXPERIENCED TEAM</li>
                    <li class="col-md-6"><i class="fa fa-check" aria-hidden="true"></i>DOG WALKING</li>
                    <li class="col-md-6"><i class="fa fa-check" aria-hidden="true"></i>DOG HEALTHCARE</li>
                    <li class="col-md-6"><i class="fa fa-check" aria-hidden="true"></i>DOGS THAT REQUIRE MEDICATION</li>
                    <li class="col-md-6"><i class="fa fa-check" aria-hidden="true"></i>PUPPY TRAINING</li> 
                    <li class="col-md-6"><i class="fa fa-check" aria-hidden="true"></i>DISABLED DOGS</li> 
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

<!-- Join Us Section -->
<section class="join-section section" style="background-image: url(/assets/img/<?=$page?>/join-us.png);">
    <div class="join-block">
        <div class="join-text">
            <div class="header-1">
                Keeping Your Pets
            </div>
            <div class="header-2">
                <span class="highlight">Happy, Healthy and Safe!</span>
            </div>
            <div class="join-desc">You'll enjoy knowing our dedicated team will do whatever is needed to keep your pets happy, healthy and safe when you're away from home.</div>
        </div>
        <div class="join-action">
            <button type="button" class="join-button btn" href="javascript:void(0);" data-toggle="modal" data-target="#modal-wizard1">
                JOIN US TODAY
            </button>
        </div>
    </div>
</section>

<!-- Offer -->
<section class="offer-section section">
    <div class="offer-section-header">
        <div class="header-1">
            <span>Our Services</span>
        </div>
        <div class="header-2">
            <span>Experienced Expert & Professional Staff.</span>
        </div>
    </div>
    <div class="offer-block row">
        <div class="offer-block-left col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="offer-list">
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/labrador-retriever.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Dog Breeds</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/dog-in-front-of-a-man.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Dog Activities</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/dog.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Dog Health</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/dog1.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Dog Training</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/cat.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Cat setting</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/dog2.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Disabled dogs</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-block-right col-xl-6 col-lg-6 col-md-6 col-sm-4">
            <img class="offer-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/vet-min.png">
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

<!-- Our Goal Section -->
<!-- <section class="our-goal-section section">
    <div class="our-goal-block row">
        <div class="our-goal-block-left col-xl-5 col-lg-5 col-md-4 col-sm-4">
            <img class="our-goal-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/our-goal.png">
        </div>
        <div class="our-goal-block-right col-xl-7 col-lg-7 col-md-8 col-sm-12">
            <div class="header-1">
                <span>Our Goal is To Wow With Every Clean</span>
            </div>
            <div class="header-2">
                <span>Experienced Expert & Professional Staff.</span>
            </div>
            <div class="offer-list">
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/blood-donation.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Blood decontamination</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/criminology.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Crime scene cleaning</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
                <div class="offer-item">
                    <div class="offer-img">
                        <img src="<?=base_url()?>assets/img/<?=$page?>/wall.png">
                    </div>
                    <div class="offer-content">
                        <span>
                            <h4 class="offer-title">Brick and render cleaning</h4>
                            <text class="offer-desc"></text>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- bottom Section -->
<!-- <section class="bottom-section">
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
</section> -->

<!-- Reasons to choose tazzer -->
<!-- <section class="reason-tazzer-section section">
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
</section> -->

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
        <div class="question-block-left col-xl-5 col-lg-5 col-md-7 col-sm-12">
            <img class="question-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/hero-image.png">
        </div>
        <div class="question-block-right col-xl-7 col-lg-7 col-md-7 col-sm-12">
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
    </div>
</section>
        <?php
    // }
?>

<!-- book Section -->
<section class="book-section section">
    <div class="book-block row">
        <div class="book-block-left col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="book-text">  
                <h3 class="book-title">
                    We Keep Them Happy Anytime.
                </h3>
                <text class="book-desc">
                    We will treat every pet with a similar sympathy that we would expect for our own pets.
                </text>
            </div>
            <a href="<?php echo base_url(); ?>all-services/<?=replace_specials($category['category_name'])?>" class="book-button btn">Book Service</a>
        </div>
        <div class="book-block-right col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <img class="book-block-image img-fluid" src="<?=base_url();?>assets/img/<?=$page?>/svh4.png">
        </div>
    </div>
</section>

<!-- Why Choose Tazzer -->
<!-- <section class="why-choose-tazzer-section section">
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
    
</section> -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_details/<?=$page?>.css?v1.03">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
    var popular_services = <?=json_encode($popular_services)?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/service_details/<?=$page?>.js?v1.0"></script>