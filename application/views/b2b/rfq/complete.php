<div class="breadcrumb-bar meeting_banner">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="meeting-title">
					<h2> Request for Quoto </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="container">
  
        <div class = "banner-image">
            <img src="/assets/img/b2b/consulting.png" alt=""  style = "width:55%" >
        </div>
        
        <div class="get-price-content">                   
            <h2><?= $subcategory_name ?></h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">SERVICE NAME</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">LOCATION</th>
                        <th scope="col">SERVICE TYPE</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $sno = 1;  
                    foreach ($service_list as $service) 
                           {     
                    ?>
                    <tr>
                        <th scope="row"><?=$sno?></th>
                        <td><?= $service['service_title']?> </td>
                        <td>&#163; <?= $service['service_amount']?> </td>
                        <td><?= $service['service_location']?> </td>
                        <td align = "center"><?= $service['serviceamounttype']?></td>
                    </tr>
                    <?php 
                       $sno  = $sno + 1 ;
                           }
                    ?>
                    
                </tbody>
            </table>    
        </div>
        <div class= "close-button-r">
            <a href="<?php echo base_url('b2b/Reqforquote'); ?>"><input  class="back-button-r " type="button" value ="Back" /></a>
        </div>
   
</div>       


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/rfq/rfq.css">

<script>
    
</script>