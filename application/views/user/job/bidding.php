<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/assets/app.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/job/jobmatch.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/job/jobpost.css">

<div class="breadcrumb-bar jobpost_banner">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="jobpost-title">
					<h2> Make a offer/Bid </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class = "container">
    <div class = "row">
        <div class = "detail-proposals">
            <a href="" class = "details">Details</a>
            <a href="<?php echo base_url().'job/jobmatch/proposal/'. $detail_job['id']; ?>" class = "proposals">Proposal</a>
        </div>
    </div>
    <div class = "row">    
        <div class = "col-lg-9 col-md-9 col-sm-12 col-12 " >
            <div class = "job-content-detail">
                <?php   
                    if($detail_job['job_type'] == 'hourly'){
                        switch ($detail_job['job_price']) {
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

                    if($detail_job['job_type'] == 'fixed'){
                        switch ($detail_job['job_price']) {
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
                <h2><?= $detail_job['title']?></h2>
                
                <div class = "job-content-type">
                    <div class = "job-type-price">
                        <img src="/assets/img/job/clock.png" alt="">
                        <span><?= $detail_job['job_type']?> Job</span>                       
                    
                        <img src="/assets/img/job/dollar.png" alt="">
                        <span><?= $price?></span>
                    </div>
                    <div class = "job-content-location">
                        <img src="/assets/img/job/location.png" alt="">
                        <span><?= $detail_job['location']?></span>
                    </div>
                </div>
                <div class = "job-content-detail-text">
                    <p><?= $detail_job['description']?> </p>
                </div>
                <div class = "job-content-skill">
                    <img src="/assets/img/job/skills.png" alt="">
                    <span class= "skill-text">Skills</span>
                    <div><?= $detail_job['category_name']?></div>                 
                    
                </div>
            </div>
            <div class = "bidding-form">
                  <h3>
                      Place a bid on the Project
                  </h3>
                  <div class = "warning-message">
                    <p> If you are need of home cleaning, apartment cleaning, or a maid service, we 're simply the best , most convenient home cleaning service out there,We know you want the cheapest house cleaning available while still having the confidence that you will receive a cleaner who is through and professional , with keep attention to detail. 
                    </p>    
                  </div>
                  <span>
                      You will be able to edit your bid until the project is awarded to someone.
                  </span>
                  <h3 style = "margin-top:30px;"> Bid details </h3>

                   <form id = "bidding-form-content" action = "<?php echo base_url('job/jobmatch/insert_bid'); ?>" class = "bidding-form-content" method = "post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <input type="hidden" name = "job_id" value = "<?php echo $detail_job['id']; ?>">
                            <div class = "row">
                                <div class = "col-lg-6 ">
                                    <div class="form-group">
                                        <label>Bid Amount</label>
                                        <input class="form-control input-amount" type="text" name="amount" id="amount" required oninvalid="this.setCustomValidity('Enter Bid Amount Here')"  oninput="this.setCustomValidity('')">
                                    </div>
                                </div>

                                <div class = "col-lg-6 ">
                                    <div class="form-group">
                                        <label>This Work will be done in</label>
                                        <input class="form-control" type="text" name="work_time" id="work_time" required oninvalid="this.setCustomValidity('Enter Work time')"  oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                                
                                <div class = "col-lg-12">
                                    <div class = "form-group">
                                        <label for="">Describe your proposal</label>
                                        <textarea class="form-control" name="proposal" id="proposal" rows="9" required 	oninvalid="this.setCustomValidity('Enter Your Proposal Here')"  oninput="this.setCustomValidity('')"></textarea>                                
                                    </div>
                                </div>
                             
                                <div class="col-lg-12">
                                    <div class="bid-submit" >
                                        <button class="bid-btn" type = "submit" id="submit" name = "submit"> <img src="/assets/img/job/auction.png" alt=""> submit</button>
                                    </div>
                                </div>
                            </div>                            
                    </form>
                  
                  
                  
            </div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-12 col-12" >
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