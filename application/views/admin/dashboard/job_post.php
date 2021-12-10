<?php
$sql = "SELECT jp.id, jp.title, jp.description,jp.email,jp.phone_number,jp.location,
			   jp.job_type, jp.job_price, s.category_name
        FROM job_post jp
        LEFT JOIN categories s ON s.id = jp.category" ;
        

$job_post = $this->db->query($sql)->result_array();
  //echo "<pre>";print_r($job_view);exit;
	?>
	<style>
	.job_des{
	
	}
	</style>
	<div class="page-wrapper">
		<div class="content container-fluid">
			
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Job Post</h3>
					</div>
					
				</div>
			</div>
			<!-- /Page Header -->
			
			<!-- Search Filter -->
			<form action="<?php echo base_url()?>admin/dashboard/adminusers_list" method="post" id="filter_inputs">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				    
			</div>
		</form>
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						                    <div class="table-responsive">
							                            <table class="custom-table table table-hover table-center mb-0 w-100" id="myTable">
								                                <thead>
									                                    <tr>
										                                        <th>#</th>
										                                        <th>Job Title</th>
										                                        <th>Job Description</th>
																				<th>Email</th>
																				<th>Phone Number</th>
																				<th>Location</th>
										                                        <th>Job Types</th>
										                                        <th>Skills</th>
										                                        <th>Amount</th>
									                                    </tr>
								                                </thead>
								                                <tbody>
									<?php
									if(!empty($job_post)) {
									$i=1;
									foreach ($job_post as $rows) {

                                            if($rows['job_type'] == 'hourly'){
                                                switch ($rows['job_price']) {
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
                        
                                            if($rows['job_type'] == 'fixed'){
                                                switch ($rows['job_price']) {
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
									<tr>
										<td><?= $i++;?></td>
										<td><?= $rows['title'];?></td>
										<td class="job_des" style="width: 150px;">
											<?php
											 $in = $rows['description'];
											echo wordwrap($in,50,"<br>\n");
											?>
											
										</td>
										<td><?= $rows['email'];?></td>
										<td><?= $rows['phone_number'];?></td>
										<td><?= $rows['location'];?></td>
										<td><?= $rows['job_type'];?></td>
										<td><?php
											 echo $rows['category_name']
										?></td>
										<td><?= $price;?></td>
									</tr>
									<?php
									}
									                                    }
									                                    else {
									echo '<tr><td colspan="6"><div class="text-center text-muted">No records found</div></td></tr>';
									                                    }
									?>
								                                </tbody>
							                            </table>
						                        </div>
					</div>
				</div>
			</div>
			             <?php
                   // echo $this->ajax_pagination->create_links();
                    ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('.custom-table').DataTable();
} );
</script>