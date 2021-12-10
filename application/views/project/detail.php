<?php 
    
?>
<style type="text/css">
    .page-data {
        background-color: #f3f3f3;
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      margin-bottom: 0px;
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .card-header {
        border-bottom: solid 3px #f3f3f3 !important;
    }
    .content-right {
        display: flex;
        justify-content: flex-end;
    }
    .pro-title-font {
        font-size: 1.17rem;
    }
    .three-line-ellipsis {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        /*white-space: pre-line;*/
    }
    .round-border {
        text-align: center;
        border-radius: 10rem;
        display: inline-block;
        border: 1px solid #b1b1b1;
        padding: .25rem .75rem;
    }
    .title-3 {
        font-weight: 600;
    }
    .form-label {
        padding: 0.7rem 1rem 0.4rem 1rem;
        font-size: 15px;
        min-height: 46px;
        border: 1px solid #ced4da;
        background-color: #f3f3f3;
    }
</style>
<div class="content">
    <div class="container">
        <div class="row">
            <?php $this->load->view($theme.'/home/'.$theme.'_sidemenu');?>
            <div class="col-xl-9 col-md-8">
                <h4 class="widget-title">Project</h4>
                <ul class="nav nav-tabs menu-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().$theme ?>-project-detail/1">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url().$theme ?>-project-proposals/1">Proposals</a>
                    </li>
                </ul>
                <div class="row page-data"> 
                    <!-- ============================= Project Info =============================== -->
                    <div class="col-md-9 mt-4 mb-4">
                        <!-- ----------------------------- project detail ----------------------------- -->
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3>Project Details</h3>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="row content-right">
                                            <span><?=$project['currency_sign'].$project['price_from']?> - <?=$project['price_to']." ".$project['currency_code']?></span>
                                        </div>
                                        <div class="row content-right">
                                            <span>BINDING IN 6 DAYS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="three-line-ellipsis">
                                            <?=$project["description"]?>
                                        </p>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h6>Skills Required</h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-9">
                                        <?php 
                                            $i=0;
                                            $req_skill_list = explode(",", $project['skills']); 
                                            for($i=0; $i<(count($req_skill_list)-1); $i++){
                                            ?>
                                        <label class="round-border"><?php echo $skill_list[$req_skill_list[$i]]; ?></label>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                               
                            </div>
                        </div>
                        <!-- ----------------------------- project bid -------------------------------- -->
                        <?php
                            if ($project['user_id'] != $this->session->userdata('id')) {
                                ?>
                        <div class="card" style="margin-top:10px;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Place a Bid on this Project</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="three-line-ellipsis">
                                            You will be able to edit your bid until the project is awarded to someone.
                                        </p>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h6>Bid Details</h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="title-3">Bid Amount</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" style="display:flex;">                                        
                                                <input type="text" class="form-control" name="bid_amount" value="" >
                                                <label class="form-label">$</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Paid to you : $5.00 - $0.58 fee = $4.42</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="title-3">Description</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">                                        
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="title-3">Suggest a milestone payment</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >                                        
                                                <input type="text" class="form-control" placeholder="Project milestone" name="suggest_description" value="" >
                                            </div>
                                            <div class="col-md-6" style="display:flex;">                                        
                                                <input type="text" class="form-control" name="milestone" value="" >
                                                <label class="form-label">$</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn login-btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <?php
                            }
                        ?>
                        
                    </div>
                    <!-- ============================= Client Info =============================== -->
                    <div class="col-md-3 mt-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>About the Client</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <span><i class="fa fa-map-marker"></i>  <?=$client_details['country_name']?></span>
                                </div>
                                <div class="row">
                                    <div class="rating">
                                        <i class="fa fa-user-circle filled" style="color:black;"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <span class="d-inline-block average-rating">5.0(100 reviews)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <span>  <?=$client_details['name']?></span>
                                </div>
                                <div class="row">
                                    <span><i class="fa fa-map-marker"></i>  <?=$client_details['address']?></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>
    </div>
</div>


