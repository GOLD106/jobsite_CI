<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/assets/app.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/job/jobmatch.css">
<div class="breadcrumb-bar jobmatch_banner">
	 <div class="container">
		 <div class="row">
			<div class="col">
				 <div class="jobmatch-title">
					<h2> Job Match List </h2>
				</div>
                <div class="banner-search">
                    <form action="<?php echo base_url(); ?>job/jobmatch/search" id="" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Job List" name = "job_search">
                        <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        </div>
                    </div>
                    </form>
                </div>
               
			</div>
			
		</div>
	</div>
</div>
<div class = "container job-content">
    <div class = "row" >
        <div class = "col-lg-3 col-md-3 col-sm-12 col-12 left-content" style = "margin-bottom:20px;">
            <div class = "job-sidebar">
               <ul>
                   <li>> <span>Best Job Matches</span></li>
                   <li>> <span> Most Recent</span></li>
               </ul>
               <div class = "side-bar-detail">
                   <div class = "side-bar-title">My Job Skills</div>
                   <div class="form-group">
                        
                        <div class="job-tag">
                            <input type="text" id="#inputTag" value="Clean,Dog Walker" data-role="tagsinput">
                        </div>
                    </div>                  
                </div>

                <div class = "side-bar-detail">
                    <span class = "side-bar-title">Review & Rating</span>
                    <div class = "side-bar-review">
                        <img src="/assets/img/job/star.png" alt="" class= "star-png">
                        <span class = "rating-number-text" >5/4.9</span>
                        <span class = "text-excellent">Excellent</span>
                    </div>
                </div>

                <div class = "side-bar-detail">
                    <span class = "side-bar-title">Performance</span>
                    <div class = "performance-progress">
                        <span class = "good-work-text">Good Work</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                          
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class = "side-bar-detail">
                    <span class = "side-bar-title">My Location</span>
                    <div class = "my-location">                                           
                        <span class = "my-location-text">33 Aulike St Kallua, Hi 96734 + 1 808-266-4646</span>
                        <img src="/assets/img/job/gmap.png" alt="" class = "map-image" >
                    </div>
                </div>
               <div class = "side-bar-detail">
                    <span class = "side-bar-title">Price</span>
                    <img src="/assets/img/job/dollar-symbol.png" alt="" class = "dollar-image">
                   <select name="price" id="price" class="select-price-sidebar">
                       <option value="0">$100 per hour</option>
                       <option value="1">$50 per hour</option>
                       <option value="2">$30 per hour</option>
                       <option value="3">$20 per hour</option>
                       <option value="4">$10 per hour</option>
                       <option value="5">$5 per hour</option>
                   </select>
               </div>
            </div>

        </div>
        <div class = "col-lg-6 col-md-6 col-sm-12 col-12 middle-content" style = "margin-bottom:20px;">
            <div class = "job-middle-content">
                <div class = "job-content-header">
                    <div>
                        <h2>Most Recent Job for you </h2>
                        <a href= "javascript:refresh_content()" ><img src="/assets/img/job/refresh.png" alt="refresh" class = "refresh-image"> </a>  
                    </div>
                    
                    <h4>Brose the most recent jobs that match you skills and profiles description to the skills clients are looking for. </h4>
                </div>

                <div id = "job-content-part">
                    <?php  foreach ($job_list as $key => $job) { 
                        if($job['job_type'] == 'hourly'){
                            switch ($job['job_price']) {
                                case "0":
                                    $price = "$100/hr";
                                case "1":
                                    $price = "$50/hr";
                                case "2":
                                    $price = "$50/hr";
                                case "3":
                                    $price = "$25/hr";
                                case "4":
                                    $price = "$10/hr";        

                            }
                        }

                        if($job['job_type'] == 'fixed'){
                            switch ($job['job_price']) {
                                case "0":
                                    $price = "$100 -$500";
                                case "1":
                                    $price = "$200-$300";
                                case "2":
                                    $price = "$700-$1000";
                                case "3":
                                    $price = "$10-$50";
                                case "4":
                                    $price = "$50-$100";        

                            }
                        }
                        
                        
                        ?>
                    <div class = "job-content-detail">
                        <a href="<?php echo base_url().'job/jobmatch/detail/'. $job['id']; ?>"><h2><?= $job['title']?></h2></a>
                        
                        <div class = "job-content-type">
                            <div class = "job-type-price">
                                <img src="/assets/img/job/clock.png" alt="">
                                <span><?= $job['job_type']?> Job</span>                       
                            
                                <img src="/assets/img/job/dollar.png" alt="">
                                <span><?= $price?></span>
                            </div>
                            <div class = "job-content-location">
                                <img src="/assets/img/job/location.png" alt="">
                                <span><?= $job['location']?></span>
                            </div>
                        </div>
                        <div class = "job-content-detail-text">
                            <p><?= $job['description']?> </p>
                        </div>
                        <div class = "job-content-skill">
                            <img src="/assets/img/job/skills.png" alt="">
                            <span class= "skill-text">Skills</span>
                            <div><?= $job['category_name']?></div>
                            
                            
                        </div>

                    </div>
                    <?php  } ?>
                </div>

                
                <div class = "load-more" id = "load-more">
                    <a href= "javascript:load_more()">Load more...</a>

                </div>
            </div>
            

        </div>
        <div class = "col-lg-3 col-md-3 col-sm-12 col-12 right-content">
            <div class = "job-sidebar">
                <div class= "side-bar-detail">
                    <div class = "side-bar-title" >Availability</div> 
                    <div class = "availability-content">
                        <img src="/assets/img/job/calendar.png" alt="">
                        <span>24hr/Monday to Sunday</span>
                    </div>
                </div>
                <div class= "side-bar-detail">
                     <div class = "side-bar-title" >Qualifications</div> 
                    <div>
                        <span>Higher Education Technical in Handy service</span>
                    </div>
                </div>
                <div class= "side-bar-detail">
                    <div class = "side-bar-title" >Recommendation</div> 
                    <div class = "job-content-skill">
                        <div>cleaning</div>
                        <div>capacity</div>
                        
                    </div>
                    

                </div>

                <div class= "side-bar-detail">
                    <div class = "side-bar-title" >Languages</div> 
                    <div class = "job-content-skill">
                        <div>English</div>
                        <div>Spanish</div>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script>
    $("#inputTag").tagsinput('items')
</script>
<script>
    function load_more() {
        var BASE_URL = $('#base_url').val();
        var csrf_token = $("#csrf_token").val();

        var url = BASE_URL + 'job/jobmatch/load_more';
        var data = {
           csrf_token_name: csrf_token,
        };            
       
       
        $.ajax({
          	url: url,
            data: data,
            type: "POST",
          
          	success: function(res) {
         
	          
                $('#job-content-part').html(res);
	            // $('#service_location').trigger('change')
          	}
        });
    }

    function refresh_content() {
        var BASE_URL = $('#base_url').val();
        var csrf_token = $("#csrf_token").val();

        var url = BASE_URL + 'job/jobmatch/refresh_content';
        var data = {
           csrf_token_name: csrf_token,
        };            
       
       
        $.ajax({
          	url: url,
            data: data,
            type: "POST",
          
          	success: function(res) {
         
	          
                $('#job-content-part').html(res);
	            // $('#service_location').trigger('change')
          	}
        });
    }
</script>