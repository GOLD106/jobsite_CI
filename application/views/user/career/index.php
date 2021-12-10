<div class="breadcrumb-bar career_banner">
    <div class="banner_mask"></div>
	<div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="career-title">
					<h2> Career </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class= "career-meeting-banner" >
    <div class="row">
        <div class="col">
            <div class="career_adventure">
                <!-- <span>10 roles in 10 locations</span>  -->
                <h3 class = "your-adventure">Your adventure <br>
                starts here </h3> 
                <a class = "search_opportunities" href = "#career-select-location"  >Search opportunities</a>
            </div>
        </div>
    </div>
</div>

<div class = "career-content" >
    <div class = "container" >
        <span class = "shot-title">OUR PROCESS</span>
        <div class = "row" >
            <h2 class ="h2-title">Ready to Live Smarter?</h2>
            <p class = "p-text" >Our approach is unique because we deliver end-to-end solutions within complex, fully integrated multi-vendor environments. We take the time to understand the individual business issues of each our customers to ensure they position themseleves and maintain leadership in their perspective market environment .
            </p>
        </div>
    </div>    
</div>

<div class= "career-banner2" >
    
</div>

<section class = "career-opportunity" >
    <div class = "career-content" >
        <div class = "container" >
            <div class = "row" >
                <div class="col-xl-5 col-sm-5 col-12">
                    <div class = "best-career-opportunity">
                        <h2 class= "h2-title">Best Career Opportunity</h3>
                        <p class = "p-text"> </p>
                    </div>
                    <div class = "achieve-your-goal">
                        <h2 class= "h2-title">Achieve Your Goal</h3>
                        <p class = "p-text">First consider what you want to achieve , and then commit to it. Set SMART(specific,measureable,attainable,relevant and time-bound) goals that motivate you and write them down to make them feel tangible. Then plan the steps you must take to realize your goal and cross off each one as you work through them</p>
                    </div> 
                    <!-- <div class = "freedom-furniture">
                        <h2 class = "h2-title">Freedom Furniture</h3>
                    </div> -->
                </div>
                
                <div class="col-xl-5 col-sm-5 col-12 opportunity-image-control">
                    <div class = "opportunity-image">
                    </div>    
                </div>   
            </div>
        </div>
    </div>            
</section>

<section class ="career-team-section" >
    <div class="breadcrumb-bar career-team">
        <div class="section-mask"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="career-title">
                        <h2> Small teams, global marketplace </h2>
                        <span class ="team-letter" >join our team and make it even better, Are you ready? </span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<section class = "career-select-location" id = "career-select-location" >
    <div class = "career-content" >
        <div class = "container" >
            <div class = "col" >
                <span class ="shot-title" >OPPORTUNITIES</span>
                <div class = "h2-title">
                Tazzer Group have best opportunity for you
                </div>
            </div>
            <div class = "row" >
                <div class="col-xl-6 col-sm-6 col-12">
                
                    <div class="select-location">
                        <label>Select Location</label>
                        <select class="career-select" name="service_location" id = "service_location" placeholder=" All location" >
                            <option value="">All location</option>
                            <?php
                                foreach ($country_list as $key => $country) {
                                    ?>
                            <option  value="<?=$country['country_id'];?>">
                                <?=$country['country_name'];?>
                            </option>
                                    <?php 
                                } 
                            ?>     
                        </select>                                
                    </div>

                    <div id = "category_list" >
                        <div class = "h3-title" >All Opportunity(<?=$total_service_count ?>)</div>
                        <ul class ="service-list">
                            <?php  
                            foreach ($category_list as $key => $category) {  ?>
                                <li><a href = "javascript:select_service(<?=$category['id'] ?>);"><?=$category['category_name']  ?>(<?=$category['count_id'] ?>) </a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>   
                    
                    <!-- <a class ="load-more" href ="javascript:void(1);" >Load More ... </a> -->

                </div> 
                <div class="col-xl-6 col-sm-6 col-12 featured-role" >
                    <span class = "shot-title">FEATURED ROLES </span>
                    <div id = "service_content">
                        <?php  
                            foreach ($services as $key => $service) {  
                                $id = $service['id']?>
                        <div class = "role-content" >
                            <a href="<?php echo base_url().'career/'.$module.'/detail/' . $id; ?>" >
                                <span class ="h2-title" ><?=$service['service_title']  ?> </span>    
                            </a>
                            <span  class ="h2-title" style = "float:right">></span> 
                            <p class= "p-text"> <?=$service['about']  ?></p> 
                        </div>  
                        <?php } ?>
                    </div>
                    
                      
                </div>   
            </div>
        </div>
    </div>        
</section>

<link rel="stylesheet" href="<?=base_url()?>assets/css/career/index.css">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $('#service_location').on('change', function(){
       
        var BASE_URL = $('#base_url').val();
        var csrf_token = $("#csrf_token").val();

        var selected_location = $('#service_location').val();

        var url = BASE_URL + 'career/career/change_location/'+ selected_location;
      
       
        var data = {
            selected_location : selected_location,
            csrf_token_name: csrf_token
        };

        $.ajax({
          	url: url,
          	data: data,
          	type: "POST",
            datatype:'json',
          	success: function(res) {

                res = JSON.parse(res)  ;
	            $('#category_list').html(res.category);
                $('#service_content').html(res.content);
	            // $('#service_location').trigger('change')
          	}
        });
    });

    function select_service(id) {
        var BASE_URL = $('#base_url').val();
        var csrf_token = $("#csrf_token").val();

        var selected_location = $('#service_location').val();

        var url = BASE_URL + 'career/career/select_category';
        var category_id = id;
      
       
        var data = {
            selected_location : selected_location,
            category_id : category_id ,
            csrf_token_name: csrf_token
        };
        $.ajax({
          	url: url,
          	data: data,
          	type: "POST",
          
          	success: function(res) {

              
	          
                $('#service_content').html(res);
	            // $('#service_location').trigger('change')
          	}
        });
        
    }
</script>    




