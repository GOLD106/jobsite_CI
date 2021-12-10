<?php
   $user_details = $this->db->get('users')->result_array();
   $country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>
<style type="text/css">
    a.dropdown-item {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="<?=base_url()?>assets/css/<?=TEMPLATE_THEME?>/style.css">
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Users</h3>
				</div>
				<div class="col-auto text-right">
					<a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
						<i class="fa fa-filter"></i>
					</a>
				</div>
				<!-- <div class="text-right m-b-20">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_user_modal">Add User</button>
                </div> -->
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Search Filter -->
		<form action="<?php echo base_url()?>users" method="get" id="filter_inputs">
			<!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
    
			<div class="card filter-card">
				<div class="card-body pb-0">
					<div class="row filter-row">
					
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>User Name</label>
								<select class="form-control" name="username">
									<option value="">Select user name</option>
									<?php foreach ($user_details as $user) { ?>
									<option value="<?=$user['name']?>"><?php echo $user['name']?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label class="col-form-label">Email</label>
								<select class="form-control" name="email">
									<option value="">Select email</option>
									<?php foreach ($user_details as $user) { ?>
									<option value="<?=$user['email']?>"><?php echo $user['email']?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>From Date</label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" name="from">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>To Date</label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" name="to">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<!-- <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>"> -->
								<button class="btn btn-primary btn-block" name="form_submit" value="submit" type="submit">Submit</button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
                        <div class="table-responsive">
                            <table class="custom-table table table-hover table-center mb-0 w-100" id="users_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Applying As</th>
                                        <th>Subscription</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Street Address</th>
                                        <th>Address</th>
                                        <th>Contact No</th>
                                        <th>Signup Date</th>
										<th>Last Login</th>
										<th>Need to know of about You</th>
                                        <th>Permission</th>
										<th>Action</th>
										<th>Notify</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
                                    
                                    
									if(!empty($lists)) {
										$i=1;
										foreach ($lists as $rows) {
										if($rows['status']==1) {
											$val='checked';
											$tag='data-toggle="tooltip" title="Click to Deactivate User ..!"';
										}
										else {
											$val='';
											$tag='data-toggle="tooltip" title="Click to Activate User ..!"';
										}
										$profile_img = $rows['profile_img'];
										if(empty($profile_img)){
											$profile_img ='assets/img/user.jpg';
										}

										if(!empty($rows['last_login'])){
											$date=date('d M Y');
										}else{
											$date='-';
										}

										$address = $rows['house_name']." ".$rows['house_number']." ".$rows['street_address']." ".$rows['city']." ".$rows['province'];

										$need_to_know_data = "";

										// how many years of experience
										if (!empty($rows['how_many_years_of_paid_experience_do_you_have'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>How many years of paid experience do you have?</span> ";
											if ($rows['how_many_years_of_paid_experience_do_you_have']==1) {
												$need_to_know_data .= "None ";
											}
											else if ($rows['how_many_years_of_paid_experience_do_you_have']==2) {
												$need_to_know_data .= "3 months";
											}
											else if ($rows['how_many_years_of_paid_experience_do_you_have']==3) {
												$need_to_know_data .= "6 months ";
											}
											else if ($rows['how_many_years_of_paid_experience_do_you_have']==4) {
												$need_to_know_data .= "9 months ";
											}
											else if ($rows['how_many_years_of_paid_experience_do_you_have']==5) {
												$need_to_know_data .= "12 months ";
											}
											else if ($rows['how_many_years_of_paid_experience_do_you_have']==6) {
												$need_to_know_data .= "1 year & above";
											}
											$need_to_know_data .= "</div>";
										}
										
										// how many years of paid experience
										if (!empty($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>Provide proof of qualification obtained choose to do your job and upload.</span> ";
											if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==1) {
												$need_to_know_data .= "Self-taught ";
											}
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==2) {
												$need_to_know_data .= "NVQ";
											}
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==3) {
												$need_to_know_data .= "GCE";
											}
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==4) {
												$need_to_know_data .= "College degree";
											}
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==5) {
												$need_to_know_data .= "University degree";
											}
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==6) {
												$need_to_know_data .= "HND";
											}
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==7) {
												$need_to_know_data .= "Vocational qualification";
											} 
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==8) {
												$need_to_know_data .= "I don't have any qualifications.";
											} 
											else if ($rows['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==9) {
												$need_to_know_data .= "Other";
												$need_to_know_data .= " => ".$rows['name_provide_proof_of_qualification_obtained_choose_to_do_your_j'];
											} 
											if ($rows['file_provide_proof_of_qualification_obtained_choose_to_do_your_j']!="") {
												$need_to_know_data .= ' &nbsp;&nbsp;<a href="'.base_url().'assets/img/'.$rows['file_provide_proof_of_qualification_obtained_choose_to_do_your_j'].'" target="blank" style="color: #009ce7;">View file</a>';
											}
											$need_to_know_data .= "</div>";
										}
										
										// What supplies do you have?
										if (!empty($rows['what_supplies_do_you_have_check_all_that_apply'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>What supplies do you have?.</span> ";
											$what_supplies_do_you_have_check_all_that_apply = $rows['what_supplies_do_you_have_check_all_that_apply'];
											$dataa = (explode(",",$what_supplies_do_you_have_check_all_that_apply));
											foreach ($dataa as $value) {
												if ($value==1) {
													$need_to_know_data .= "Basic tools (drill, wrench, hammer, level, etc.) &nbsp;";
												}
												if ($value==2) {
													$need_to_know_data .= "Power tools (circular/table saw, nail gun, shop vac, etc.) &nbsp;";
												}
												if ($value==3) {
													$need_to_know_data .= "Painting supplies (roller, brush, drop cloth, tape, etc.) &nbsp;";
												}
												if ($value==4) {
													$need_to_know_data .= "Lawn care equipment (mower, leaf blower, string trimmer, hand tools, etc.) &nbsp;";
												}
												if ($value==5) {
													$need_to_know_data .= "Ladder &nbsp;";
												}
											}
											$need_to_know_data .= "</div>";
										}
										
										// Are you legally eligible to work in the county you are current in?
										if (!empty($rows['are_you_legally_eligible_to_work_in_the_current'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>Are you legally eligible to work in the county you are current in?</span> ";
											$need_to_know_data .= $rows['are_you_legally_eligible_to_work_in_the_current'];
											$need_to_know_data .= "</div>";
										}
										
										// Provide proof of photo ID you must choose at least one from the list and upload.
										if (!empty($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>Provide proof of photo ID you must choose at least one from the list and upload.</span> ";
											if ($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==1) {
												$need_to_know_data .= "Passport ";
											}
											else if ($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==2) {
												$need_to_know_data .= "Driving licence";
											}
											else if ($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==3) {
												$need_to_know_data .= "Biometric card";
											}
											else if ($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==4) {
												$need_to_know_data .= "ID card";
											}
											else if ($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==5) {
												$need_to_know_data .= "Resident permit";
											}
											else if ($rows['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==6) {
												$need_to_know_data .= "Other";
												$need_to_know_data .= " => ".$rows['name_provide_proof_of_photo_id_you_must_choose_at_least_one_from'];
											} 
											if ($rows['file_provide_proof_of_photo_id_you_must_choose_at_least_one_from']!="") {
												$need_to_know_data .= ' &nbsp;&nbsp;<a href="'.base_url().'assets/img/'.$rows['file_provide_proof_of_photo_id_you_must_choose_at_least_one_from'].'" target="blank" style="color: #009ce7;">View file</a>';
											}
											$need_to_know_data .= "</div>";
										}

										// Provide proof of right to work in your country you select a minimum of one and upload.
										if (!empty($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>Provide proof of right to work in your country you select a minimum of one and upload.</span> ";
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==1) {
												$need_to_know_data .= "National Insurance  ";
											}
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==2) {
												$need_to_know_data .= "Passport";
											}
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==3) {
												$need_to_know_data .= "Driving licence";
											}
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==4) {
												$need_to_know_data .= "Biometric card";
											}
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==5) {
												$need_to_know_data .= "ID card";
											}
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==6) {
												$need_to_know_data .= "Resident permit";
											}
											if ($rows['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==7) {
												$need_to_know_data .= "Other";
												$need_to_know_data .= " => ".$rows['name_provide_proof_of_right_to_work_in_your_country_you_select_a'];
											} 
											if ($rows['file_provide_proof_of_right_to_work_in_your_country_you_select_a']!="") {
												$need_to_know_data .= ' &nbsp;&nbsp;<a href="'.base_url().'assets/img/'.$rows['file_provide_proof_of_right_to_work_in_your_country_you_select_a'].'" target="blank" style="color: #009ce7;">View file</a>';
											}
											$need_to_know_data .= "</div>";
										}
										
										// Provide proof of homes address Must be less than 3 months old from the date of issue
										if (!empty($rows['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>Provide proof of homes address Must be less than 3 months old from the date of issue</span> ";
											if ($rows['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==1) {
												$need_to_know_data .= "Telephone Bill  ";
											}
											if ($rows['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==2) {
												$need_to_know_data .= "Gas or electric bill";
											}
											if ($rows['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==3) {
												$need_to_know_data .= "Bank statement";
											}
											if ($rows['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==4) {
												$need_to_know_data .= "Letter from the government or school";
											}
											if ($rows['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==5) {
												$need_to_know_data .= "Other";
												$need_to_know_data .= " => ".$rows['name_provide_proof_of_homes_address_must_be_less_than_3_months_o'];
											} 
											if ($rows['file_provide_proof_of_homes_address_must_be_less_than_3_months_o']!="") {
												$need_to_know_data .= ' &nbsp;&nbsp;<a href="'.base_url().'assets/img/'.$rows['file_provide_proof_of_homes_address_must_be_less_than_3_months_o'].'" target="blank" style="color: #009ce7;">View file</a>';
											}
											$need_to_know_data .= "</div>";
										}

										// For business only
										if (!empty($rows['for_business_only'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>For business only</span> ";
											if ($rows['for_business_only']==1) {
												$need_to_know_data .= "Company registration number  ";
											}
											if ($rows['for_business_only']==2) {
												$need_to_know_data .= "Company registration document";
											}
											if ($rows['for_business_only']==3) {
												$need_to_know_data .= "Business insurance";
											}
											if ($rows['for_business_only']==4) {
												$need_to_know_data .= "Method statement";
											}
											if ($rows['for_business_only']==5) {
												$need_to_know_data .= "Proof of trading address";
											}
											if ($rows['for_business_only']==6) {
												$need_to_know_data .= "The ID of the responsible individual";
											}
											if ($rows['for_business_only']==7) {
												$need_to_know_data .= "provide website link if any";
											}
											if ($rows['for_business_only']==8) {
												$need_to_know_data .= "Other";
												$need_to_know_data .= " => ".$rows['name_for_business_only'];
											} 
											if ($rows['file_for_business_only']!="") {
												$need_to_know_data .= ' &nbsp;&nbsp;<a href="'.base_url().'assets/img/'.$rows['file_for_business_only'].'" target="blank" style="color: #009ce7;">View file</a>';
											}
											$need_to_know_data .= "</div>";
										}

										// Facial Video verification is a must
										if (!empty($rows['facial_video_verification_is_a_must'])) {
											$need_to_know_data .= "<div><span style='color: #7d7d7d;'>Facial Video verification is a must</span> ";
											$need_to_know_data .= ' &nbsp;&nbsp;<a href="'.base_url().'assets/img/'.$rows['facial_video_verification_is_a_must'].'" target="blank" style="color: #009ce7;">View file</a>';
											$need_to_know_data .= "</div>";
										}

										echo'<tr>
										<td>'.$i++.'</td>
										<td>
											<h2 class="table-avatar">
												<a href="#" class="avatar avatar-sm mr-2">
													<img class="avatar-img rounded-circle" alt="" src="'.base_url().$profile_img.'">
												</a>
												<a href="'.base_url().'user-details/'.$rows['id'].'">'.str_replace('-', ' ', $rows['name']).(!is_null($rows['l_name'])?' '.$rows['l_name']:"").'</a>
											</h2>
										</td>
										<td>'.$rows['email'].'</td>
										<td>'.((empty($rows['you_are_appling_as']) || !isset(C_APPLINGAS[intval($rows['you_are_appling_as'])]))?"User":C_APPLINGAS[intval($rows['you_are_appling_as'])]).'</td>
										<td>'.$rows['subscription_name'].'</td>
										<td>'.$rows['province'].'</td>
										<td>'.$rows['city'].'</td>
										<td>'.$rows['street_address'].'</td>
										<td>'.$address.'</td>
										<td>'.$rows['mobileno'].'</td>
										<td>'.$rows['created_at'].'</td>
										<td>'.$rows['last_login'].'</td>
										<td>'.$need_to_know_data.'</td>
                                        <td>'.$rows['permission'].'</td>
										<td>'.($rows['type']==1?'':'<div class="status-toggle"><input id="status_' . $rows['id'] . '" class="check change_Status_user1" data-id="' . $rows['id'] . '" type="checkbox" ' . $val . '><label for="status_' . $rows['id'] . '" class="checktoggle">checkbox</label></div>').'
										</td>
										<td>
											<a href="'.base_url().'send-notification/'.$rows['token'].'" class="btn btn-sm bg-success-light mr-2">
												<i class="fa fa-edit mr-1"></i> Send Message
											</a>
										</td>
										<td>
	                                        <button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actions"></i>
	                                            Action
	                                        </button>
	                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="">
	                                            <a class="dropdown-item edit-user"  onclick="edit_user('.$rows["id"].')" user_id="'.$rows['id'].'" ><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
	                                            <a class="dropdown-item text-danger" onclick="remove_user_info('.$rows["id"].')"><i class="bx bxs-trash mr-2"></i> Remove</a>
	                                        </div>
	                                    </td>
										</tr>';
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
		</div>
	</div>
</div>

<!-- user add modal -->
<div class="modal account-modal fade multi-step" id="add_user_modal" data-keyboard="false" data-backdrop="static">
    <div class=" modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <div class="header-content-blk text-center">
                <div class="alert alert-success text-center" id="flash_succ_message2" ></div>
            </div> -->
            <div class="modal-body step-1" data-step="1">
                <div class="account-content">
                    <div class="account-box">
                        <div class="login-right">
                            <div class="login-header">
                                <h3></h3>
                            </div>
                            <form method='post' id="add_user_form">
                                <h3><strong>Personal Details</strong></h3>
                            <div class="row">
                               <div class="form-group col-md-6 mt-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control border-dark" name="userName" minlength="3">
                                </div>
                               <div class="form-group col-md-6 mt-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control border-dark" name="last_name" minlength="3">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control border-dark" name="userEmail">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control border-dark" name="userPassword">
                                </div>

                                <div class="form-group col-md-6 mt-3">
                                    <label>Postal Code/zipcode</label>
                                    <input type="text" name="postal_code" class="form-control border-dark" Placeholder="Enter Postal Code">
                                </div>

                                <div class="form-group col-md-6 mt-3">
									<label>Applying As</label>
									<select required="true" class="form-control" name="you_are_appling_as">
										<option value="">Select</option>  
										<?php 
											$applyingAs = C_APPLINGAS;
			                                asort($applyingAs, SORT_STRING);
			                                foreach($applyingAs as $key=>$value) {
												?>
										<option value="<?=$key?>"><?=$value?></option> 
												<?php
											}
										?>         
									</select>
								</div>

                                <h3 class="col-md-12 mt-3"><strong>Mailing Address</strong></h3>
                                <div class="form-group col-md-4 mt-3">
                                    <label>House name</label>
                                    <input type="text" name="house_name" value="" placeholder="Enter Street Address" class="form-control border-dark">
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label>House or flat number</label>
                                    <input type="text" name="house_number" value="" placeholder="House or flat number" class="form-control border-dark">
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label>Street Address</label>
                                    <input type="text" name="street_address" value="" placeholder="Enter Street Address" class="form-control border-dark">
                                </div>

                                <div class="form-group col-md-4 mt-3">
                                    <label>City</label>
                                     <input type="text" name="city" value="" placeholder="Enter City" class="form-control border-dark">
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label>County/ Province</label>
                                    <input type="text" name="province" value="" placeholder="Enter Province" class="form-control border-dark">
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label>Postal Code</label>
                                    <input type="text" name="postal_code2" value="" placeholder="Enter Postal Code" class="form-control border-dark">
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label>Mobile Code</label>
                                    <select name="countryCode" class="form-control countryCode final_country_code">
                                        <?php
                                            foreach ($country_list as $key => $country) {
                                                ?>
                                        <option data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>"><?=$country['country_name'];?></option>
                                                <?php 
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control user_final_no user_mobile border-dark" placeholder="Enter Mobile No" name="userMobile">
                                </div>
                                <div class="form-group col-12">
                                    <input type="hidden" name="user_id" >
                                    <button id="registration_submit_user" type="submit" class="login-btn btn">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script type="text/javascript">

var appling_as_list = <?=json_encode(C_APPLINGAS)?>;
var appling_as_user = <?=json_encode(C_YOUARE_USER)?>;
// console.log(appling_as_list)

//remove_user_info
function remove_user_info(user_id)
{
    var csrf_token = $('#admin_csrf').val();
    if( !confirm('Are you sure?'))  return false;
    $.ajax({
        type: "POST",
        url: base_url + "ajax-remove-user",
        data: {
            csrf_token_name: csrf_token,
            user_id : user_id
        },
        success: function(data) {
            data = JSON.parse(data);
            if(data.result=='ok'){
                // alert("user has been removed successfully.");
                toaster_msg('info', "user has been removed successfully.");
                window.location.reload();
            }else{
                // alert("Failed. user has not been removed.");
                toaster_msg("error", "Failed. user has not been removed.");
                window.location.reload();
            }
        }
    });
}

// edit user
function edit_user(user_id) {
	var csrf_token = $('#admin_csrf').val();
	$.ajax({
        type: "POST",
        url: base_url + "ajax-user-info",
        //dataType:'json',
        data: {
            user_id : user_id,
            csrf_token_name: csrf_token,
        },
        beforeSend: function() {
        },
        success: function(data) {
            try{
                data = JSON.parse(data);
                
                if(data.result=='ok'){
                    // console.log(data.data);
                    $('[name="user_id"]').val(data.data.id);
                    $('[name="userName"]').val(data.data.name);
                    $('[name="last_name"]').val(data.data.l_name);
                    $('[name="userEmail"]').val(data.data.email);
                    var you_are_appling_as =  parseInt(data.data.you_are_appling_as, 10);;
                    // console.log(you_are_appling_as, appling_as_list[you_are_appling_as]);
                    if (you_are_appling_as == NaN || !appling_as_list[you_are_appling_as]) {
                    	you_are_appling_as = appling_as_user;
                    }
                    $('[name="you_are_appling_as"] option[value="'+you_are_appling_as+'"]').prop('selected', true);
                    $('[name="house_name"]').val(data.data.house_name);
                    $('[name="street_address"]').val(data.data.street_address);
                    $('[name="city"]').val(data.data.city);
                    $('[name="userMobile"]').val(data.data.mobileno);
                    $('[name="province"]').val(data.data.province);
                    $('[name="postal_code"]').val(data.data.postal_code);
                    $('[name="postal_code2"]').val(data.data.postal_code2);
                    $('[name="house_number"]').val(data.data.house_number);
                    $('[name="userPassword"]').val(data.data.password);
                    $('[name="countryCode"]  option[value="'+data.data.country_code+'"]').prop('selected', true);
                    // -- you_are_appling_as
                }else{
                    alert("The user information could not get.");
                    return;
                }
            }
            catch(ee)
            {
                console.log(ee);
                return;
            }

            keep_stsff_information_flag = 1;
            $('#add_user_modal').modal('show');
        },
        error: function(obj, error, description) {

        }
   });
}

function change_Status_user1(service_id){
	var csrf_token = $("#admin_csrf").val();
	var stat= $('#status_'+service_id).prop('checked');
	if(stat==true) {
		var status=1;
	}
	else {
		var status=2;
	}
	var url = base_url+ 'admin/dashboard/delete_users';
	var category_id = service_id;
	var data = { 
	  user_id: category_id,
	  status: status,
	  csrf_token_name:csrf_token
	};
	$.ajax({
	  url: url,
	  data: data,
	  type: "POST",
	  success: function (data) {
		if(data==1){
				alert("Failed to change Status");
				$(".check_status").attr('checked', $(this).attr('checked'));
				$('#status_'+service_id).attr('data-on',"Active");
				$('.check_status').addClass('toggle-on');
			}
			console.log(data);
			if(data=="success"){
				swal({
					title: "User",
					text: "User Status Change SuccessFully....!",
					icon: "success",
					button: "okay",
					closeOnEsc: false,
					closeOnClickOutside: false
				});
			}
	  }
	});
}

var keep_stsff_information_flag = 0;
$(document).ready(function(){   

    $('#add_user_modal').on('show.bs.modal', function (e) {
        // console.log('Showing user\'s Information Modal');

        if(keep_stsff_information_flag==0)
        {
            $('.login-header h3').html('Add User');
            $('#add_user_form')[0].reset();
            $('#add_user_form').bootstrapValidator('enableFieldValidators',  'userPassword', 'notEmpty');
        }
        else
        {
            $('.login-header h3').html('Edit User');
            $('#add_user_form').bootstrapValidator('enableFieldValidators',  'userPassword', false, 'notEmpty');
        }
            
        keep_stsff_information_flag = 0;
    });

    $('.edit-user').click( function(e) {
        var user_id = $(this).attr('user_id');
       	// return e.preventDefault() // stops modal from being shown
  		
    });

    var checked = ''; 
    var base_url = $('#base_url').val();
    var csrf_token = $('#admin_csrf').val();
    
    $('#add_user_form').bootstrapValidator({
        excluded: ':disabled',
        fields: {
            userName: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter your name ..'
                    }
                }
            },
            userEmail: {
                validators: {
                    remote: {
                        url: base_url + 'user/login/email_chk_user',
                        data: function(validator) {
                            return {
                                userEmail: validator.getFieldElements('userEmail').val(),
                                user_id : $('[name="user_id"]').val(),
                                csrf_token_name: csrf_token
                            };
                        },
                        message: 'This email is already exist...',
                        type: 'POST'
                    },
                    notEmpty: {
                        message: 'Please Enter Email Address...'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    },
                }
            },
            userPassword: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter the user\'s password ..'
                    }
                }
            },
            userMobile: {
                validators: {
                    remote: {
                        url: base_url + 'user/login/mobileno_chk_user',
                        data: function(validator) {
                            return {
                                user_id : $('[name="user_id"]').val(),
                                userMobile: validator.getFieldElements('userMobile').val(),
                                countryCode: validator.getFieldElements('countryCode').val(),
                                csrf_token_name: csrf_token
                            };
                        },
                        message: 'This mobile number is already exist or invalid..',
                        type: 'POST'
                    },
                    notEmpty: {
                        message: 'Please Enter Mobile Number'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]{5,15}$/,
                        message: "Invalid Mobile Number"
                    },
                }
            },
        }
    }).on('success.form.bv', function(e) {
        
        var userName = $('[name="userName"]').val();
        var last_name = $('[name="last_name"]').val();
        var userEmail = $('[name="userEmail"]').val();
        var userPassword = $('[name="userPassword"]').val();
        var postal_code = $('[name="postal_code"]').val();
        var you_are_appling_as = $('[name="you_are_appling_as"]').val();
        var house_name = $('[name="house_name"]').val();
        var house_number = $('[name="house_number"]').val();
        var street_address = $('[name="street_address"]').val();
        var city = $('[name="city"]').val();
        var province = $('[name="province"]').val();
        var postal_code2 = $('[name="postal_code2"]').val();
        var userMobile = $('[name="userMobile"]').val();
        var countryCode = $('[name="countryCode"]').val();

        var user_id = $('[name="user_id"]').val();
        $.ajax({
            type: "POST",
            url: base_url + "add-user",
            dataType:'json',
            data: {
                'name': userName,
                'l_name': last_name,
                'email': userEmail,
                'password': userPassword,
                'postal_code': postal_code,
                'you_are_appling_as': you_are_appling_as,
                'house_name': house_name,
                'house_number': house_number,
                'street_address': street_address,
                'city': city,
                'province': province,
                'postal_code2': postal_code2,
                'country_code': countryCode,
                'csrf_token_name': csrf_token,
                'mobileno': userMobile,
                "user_id" : user_id
            },
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader();
                // data = JSON.parse(data);
                // console.log(data)
                if(data.result == "ok" || data.result == true){
                    // alert("Regist Success.");
                    toaster_msg("info", "user Registed successfully")
                    window.location.reload();
                }else{
                    // alert("Failed.");
                    toaster_msg("error", "Register Failed")
                    window.location.reload();
                }
            }
        });
        
        return false;
    });

    var user_list_url=$('#user_list_url').val();
	// var users_table = $('#users_table').DataTable({
	// 	"processing": true, //Feature control the processing indicator.
	// 	"serverSide": true, //Feature control DataTables' server-side processing mode.
	// 	"order": [], //Initial no order.
	// 	"ordering": false,
	// 	"ajax": {
	// 		"url":user_list_url,
	// 		"type": "POST",

	// 		"data":{csrf_token_name:csrf_token}
	// 	},
	// 	"columnDefs": [
	// 		{
	// 			"targets": [ 0 ], //first column / numbering column
	// 			"orderable": false, //set not orderable
	// 		},
	// 	]
	// });
	var users_table = $('#users_table').DataTable();

	$('#users_table').on('click','.change_Status_user1', function () {
		// console.log("3");
	  var id = $(this).attr('data-id');
	  change_Status_user1(id);
	});

});
</script>