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
<div class = "proposal-background">
    <div class = "container">
        <div class = "row">
            <div class = "detail-proposals">
                <a href="<?php echo base_url().'job/jobmatch/detail/'. $job_id; ?>" class = "proposals">Details</a>
                <a href="" class = "details">Proposal</a>
            </div>
        </div>
        <div class = "row">
            <div class = "col-lg-9 col-md-9 col-sm-12 col-12 " >
                <div class = "all-proposals">
                    <h2>
                        All Proposals
                    </h2>
                    <a href="">
                        <img src="/assets/img/job/refresh.png" alt="" class = "refresh-image">
                    </a>
                </div>

                <?php  foreach ($p_list as $prop) {    ?>
                    
                    <div class = "proposal-detail">
                        <div class = "user-image-part">
                                <?php
                                    if(!empty($prop['profile_img'])){
                                        $image=base_url().$prop['profile_img'];
                                    }else{
                                        $image=base_url().'assets/img/user.jpg';
                                    }
                                ?>
                            <img class="avatar-xl rounded-circle" src="<?= $image; ?>" alt="" >
                        </div>
                        <div class = "user-detail-part">
                            <h3><?= $prop['name'] ?></h3>
                            <p>handyman</p>
                            <img src="/assets/img/job/star-group.png" alt="" width = "60">
                            <p>
                                5+ Years Experience 
                            </p> 
                        </div>
                        <div class = "amount-content">
                            <div class = "amount-contact">
                                <h3>
                                    Amount: $<?= $prop['amount']; ?>
                                </h3>
                                <a href="">Contact</a>
                            </div>
                            <div class = "job-content-skill">
                                
                                    <img src="/assets/img/job/skills.png" alt="">
                                    <span class= "skill-text">Skills</span>
                                                        
                                    <div><?= $prop['category_name']; ?></div>                          
                                
                                    <img src="/assets/img/job/location.png" alt="" style = "margin-left:70px;">
                                    <span><?= $prop['location']; ?></span>
                            
                            </div>
                        </div>
                    </div>

                <?php  } ?>

               
            </div>
            <div class = "col-lg-3 col-md-3 col-sm-12 col-12 right-content" style = "margin-top:30px;">
                <div class = "job-sidebar">
                    <div class= "side-bar-detail">
                        <div class = "side-bar-title" >Bids</div> 
                        <div class = "availability-content">
                            
                            <span><?= $count_bid[0]['cnt_bid']  ?></span>
                        </div>
                    </div>
                    <div class= "side-bar-detail">
                        <div class = "side-bar-title" >Avg Bids</div> 
                        <div style = "padding-left:30px ; font-size:13px;" >
                            <span>$<?= $count_bid[0]['avg_amount'] ?></span>
                        </div>
                    </div>
                   

                    
                </div>
            
            </div>

        </div>
    </div>
</div>
