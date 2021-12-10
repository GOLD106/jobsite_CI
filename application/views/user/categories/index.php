<style type="text/css">
    .slider {
        width: calc(100% - 30px);
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }

</style>
<div class="breadcrumb-bar">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="breadcrumb-title">
					<h2><?php echo (!empty($user_language[$user_selected]['lg_category_name'])) ? $user_language[$user_selected]['lg_category_name'] : $default_language['en']['lg_category_name']; ?></h2>
				</div>
			</div>
			<div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo (!empty($user_language[$user_selected]['lg_category_name'])) ? $user_language[$user_selected]['lg_category_name'] : $default_language['en']['lg_category_name']; ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="">
			<?php 
			$pagination=explode('|',$this->ajax_pagination->create_links());
			?>
		</div>					
		<div class="catsec">
			<div class="row" id="dataList">
				<section class="multirow-slider slider">
					<?php
					if(!empty($category)) {
						foreach ($category as $crows) {
							$category_name=strtolower($crows['category_name']);
						?>
					<div>
						<a href="<?php echo base_url();?>search/<?php echo str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $category_name);?>">
							<div class="cate-widget">
								<img src="<?php echo base_url().$crows['category_image'];?>" alt="">
								<div class="cate-title">
									<h3><span><i class="fa fa-circle"></i> <?php echo ucfirst($crows['category_name']);?></span></h3>
								</div>
								<div class="cate-count">
									<i class="fa fa-clone"></i> <?php echo $crows['category_count'];?>
								</div>
							</div>
						</a>
					</div>
					<?php } }
					else { 

					echo '<div class="col-lg-12">
					<div class="category">
					No Categories Found
					</div>
					</div>';
					} 

					echo $this->ajax_pagination->create_links();
					?>
				</section>
			</div>
		</div>
	</div>
</div>
<script>
      $(".multirow-slider").slick({
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoPlay: true,
        rows: 3,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }

          ]

      });
</script>