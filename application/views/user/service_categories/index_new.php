<?php
    // print_r($category);
?>

<section class="top-section">
    <div class="layer">
        <div class="top-banner"></div>  
        <div class="top-mask"></div>  
        <div class="top-content">
            <div class="row">
                <div class="col-12">
                    <h2>Tazzer Group Services</h2>
                </div>
            </div>
            <div class="row align-center justify-center"></div>
        </div>

        <div class="container search-block">
            <div class="row">          
                <div class="col-lg-9 col-md-10 con">
                    <div class="section-search">
                        <div class="search-box">
                            <form action="<?php echo base_url(); ?>search" id="search_service" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                <div class="search-input line">
                                    <!-- <i class="fa fa-tv bficon"></i> -->
                                    <span class="document-img"></span>
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control common_search" name="common_search" id="search-blk" placeholder="Please type what you want here" >
                                    </div>
                                </div>
                                <div class="search-input">
                                    <!-- <i class="fa fa-location-arrow bficon"></i> -->
                                    <span class="document-send"></span>
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" value="" name="user_address" id="user_address" placeholder="Postcode / Zipcode">
                                        <input type="hidden" value="" name="user_latitude" id="user_latitude">
                                        <input type="hidden" value="" name="user_longitude" id="user_longitude">
                                        <a class="current-loc-icon current_location" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                                    </div>
                                </div>
                                <div class="search-btn">
                                    <button class="btn search_service" name="search" value="search"  type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="search-cat">
                            <i class="fa fa-circle"></i>
                            <span><?php echo (!empty($user_language[$user_selected]['lg_popular_search'])) ? $user_language[$user_selected]['lg_popular_search'] : $default_language['en']['lg_popular_search']; ?></span>
                            <?php foreach ($popular as $popular_services) { ?>
                                <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $popular_services['service_title']) . '?sid=' . md5($popular_services['id']); ?>">
                                    <?php echo $popular_services['service_title'] ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-list-section">
    <!-- <div class="header-title">
        <h3>Services Detail</h3>
    </div> -->

    <div class="service-block row">
        <?php 
        foreach($category as $cate) {
            $categoryName = $cate['category_name'];
            $categoryImage = $cate['category_image'];
            $cardImage = $cate['card_image'];
            $icon = $cate['icon'];
            $mobileIcon = $cate['category_mobile_icon'];
            $description = $cate['description'];
            $id = $cate['id'];
            ?>
        <div link="<?php echo base_url().'service-details/'.$id.'/'.replace_specials(strtolower(trim($categoryName)));?>" data-id="<?=$id?>" class="service-box">
            <img class="card-img" alt="<?=$categoryName?>" src="<?php echo base_url().$cardImage;?>" transition="scale-transition">
            <div class="service-img-box">
                <img class="service-img" alt="<?=$categoryName?>" src="<?php echo base_url().$mobileIcon;?>" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3><?=$categoryName?></h3>
            </div>
            <div class="service-description">
                <span><?=$description?></span>
            </div>
        </div>
            <?php
        }
        ?>
    </div>
</section>

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
                    <a href="<?php echo base_url(); ?>all-services" class="bottom-button">Book Service</a>
                </div>
            </div>
            <div class="row align-center justify-center"></div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_categories/index_new.css?v1.01">
<script src="<?php echo base_url(); ?>assets/js/service_categories/index_new.js?v1.0"></script>