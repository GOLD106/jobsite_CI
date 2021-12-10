<?php
/**
 * @author Leo: Delivery Category Landing Page
*/
?>

<!-- Top -->
<section class="top-section">
    <div class="layer">
        <div class="top-banner" style="background-image: url(<?=base_url().$category['image']?>);"></div>
        <div class="top-mask"></div>  
        <div class="top-content">
            <div class="row">
                <div class="col-12">
                    <h2><?=$category['category_name']?></h2>
                </div>
            </div>
            <div class="row align-center justify-center"></div>
        </div>
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

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/delivery_details/index.css">
<script type="text/javascript">
    var serviceList = <?=json_encode($serviceList)?>;
    var serverDate = <?=json_encode(date())?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/delivery_details/index.js"></script>