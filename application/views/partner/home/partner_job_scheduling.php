<?php 
$get_details = $this->db->where('id',$this->session->userdata('id'))->get('users')->row_array();
?>

<style>
.bootstrap-select {
	border: none;
	padding: 0%;
}
.dropdown-toggle {
	display: none;
}
.from-to {

  display: flex; 
  align-items: center
}
.text-center {
	width: 100%
}
.profile-img {
	width: 60px;
	height: 60px;
	border-radius: 50px;
	margin-top: 7%;
}
.schedule-detail {
	height: 70px;
	border-radius: 4px;
	line-height: 1.5;
	font-size: 12px;
	color: #3f4648;
	position: relative;
	transition: all .3s ease;
	background-color: rgba(132, 179, 205, 0.25);
	border-color: rgba(132, 179, 205, 0.25);
	display: flex;
	align-items: center;
	width: 100px;
	overflow: hidden;
	display: inline-block;
	text-overflow: ellipsis;
	white-space: nowrap;
	padding-top:15%;
	cursor: pointer;
}
.search-user {
	display: flex
}
@media (max-width: 768px) {
	.blog-block-item img {
		display: block !important;
	}
	.profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50px;
    margin-top: 7%;
    margin-left: 16%;
	}
	.login-btn {
		font-size: 12px;
    border-radius: 50px;
    display: flex;
    padding: 9px;
    width: 67%;
    text-align: center;
    justify-content: center;
	}
	.weekcommencing {
		text-align: center;
    min-width: 190px;
	}
	.search-user {
		display: none
	}
}

</style>
<div class="content">
	<div class="container">
		<div class="row">
		 	<?php
			if(!empty($_GET['tbs'])){
				$val=$_GET['tbs'];
			}else{
				$val=1;
			}
			?>
			<input type="hidden" name="tab_ctrl" id="tab_ctrl" value="<?=$val;?>">
			<?php 
				# added by maksimU : for employee
				if( $this->session->userdata('serviceman')=='yes' ){
					$this->load->view('employee/home/employee_sidemenu');
				} else if($this->session->userdata('you_are_appling_as') == C_YOUARE_ORGANIZATION){
					$this->load->view('organization/home/organization_sidemenu');
				} else if($this->session->userdata('you_are_appling_as') == C_YOUARE_STAFF){
					$this->load->view('staff/home/staff_sidemenu');
				} else if($this->session->userdata('you_are_appling_as') == C_YOUARE_PARTNER){
					$this->load->view('partner/home/partner_sidemenu');
				}
				else
				# added end
					$this->load->view('partner/home/organization_sidemenu');
				?>
		 
			<div class="col-xl-9 col-md-8">
				<div class="tab-content pt-0">
					<div class="tab-pane show active" id="user_profile_settings" >
						<div class="widget">
							<?php if($status[0]['name'] === 'Company') { ?>

							<div class="card blog-block-item" style="padding: 2%; display: -webkit-inline-box; width: 100%">
								<div  style="width: 50%">
									<h3 style="color: #6c2c78"> Job Scheduler </h3>
								</div>
								<div style="width: 50%">
									<button class="login-btn btn" style="border-radius: 50px" data-toggle="modal" data-target="#add-shift">Add Shifts</button>
								</div>
							</div>
							<div class="card blog-block-item" style="padding: 2%; display: -webkit-inline-box; width: 100%">
								<div class="text-center">

									<main style="padding-top: 5%; padding-bottom: 10%">
											<form action="employee/timesheet" method="POST">
													<div class="form-group row">
													<div class="col-8">
														<label class="sr-only" for="datePicker">Date</label>
														<input type="text" style="border-radius: 50px; text-align: center" class="form-control mb-2 mr-sm-2 col-4 weekcommencing" name="datePicker" id="datePicker" placeholder="week commencing">
													</div>
													<div class="col-4 search-user">
														<p style="width: 70%; align-self: center;color: #8f8f8f;padding-top: 3%;font-size: 16px;">Search User</p>
														<input type="search" onkeyup="myFunction()" id="myInput" class="form-control" style="border-radius: 50px; out-line: none; " placeholder="Type keyword..."></input>
													</div>
											</form>
											<div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
																	<th style="width: 16%">View by users</th>
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">
																			<p> Mon &nbsp;&nbsp; </p>
																			<p id="monday"></p>
																		</div>
																	</th>
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">	
																			<p> Tue &nbsp;&nbsp;</p>
																			<p id="tuesday"></p> 
																		</div>
																	</th>
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">	
																			<p> Wed &nbsp;&nbsp;</p>
																			<p id="wednsday"></p> 
																		</div>
																	</th>
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">	
																			<p> Thu &nbsp;&nbsp;</p>
																			<p id="thursday"></p> 
																		</div>
																	</th>
																	
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">	
																			<p> Fri &nbsp;&nbsp;</p>
																			<p id="friday"></p> 
																		</div>
																	</th>
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">	
																			<p> Sat &nbsp;&nbsp;</p>
																			<p id="saturday"></p> 
																		</div>
																	</th>
																	<th style="width:12%">
																		<div style="display: flex; justify-content: center">	
																			<p> Sun &nbsp;&nbsp;</p>
																			<p id="sunday"></p> 
																		</div>
																	</th>
                                </tr>
                            </thead>
                            <tbody id="tBody">
															<!-- <tr>
																<td>Shift without users</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr> -->

															<?php 
																if(!empty($users)) {
																	foreach($users as $user) {
															?>
																<tr value="<?php echo $user['id'] ?>" id="table_id">
																	<td style="padding: 0%; text-align: center">
																		<?php if($user['profile_img']) { ?>
																			<img class="profile-img" src="<?php echo $user['profile_img'] ?>" alt="" />
																		<?php 
																				}
																			else {
																		?>
																			<img class="profile-img" src="<?php echo base_url().'assets/img/user.jpg' ?>" alt="" />
																		<?php 
																			}
																		?>
																		<p style="margin: 0; padding-bottom: 3%" ><?php echo $user['name'] ?></p>
																	</td>
																	<td value="<?php echo $user['id'] ?>" class="monaday" id="<?php echo $user['id'] ?>monday"></td>
																	<td value="<?php echo $user['id'] ?>" class="tuesday" id="<?php echo $user['id'] ?>tuesday"></td>
																	<td value="<?php echo $user['id'] ?>" class="wednsday" id="<?php echo $user['id'] ?>wednsday"></td>
																	<td value="<?php echo $user['id'] ?>" class="thursday" id="<?php echo $user['id'] ?>thursday"></td>
																	<td value="<?php echo $user['id'] ?>" class="friday" id="<?php echo $user['id'] ?>friday"></td>
																	<td value="<?php echo $user['id'] ?>" class="saturday" id="<?php echo $user['id'] ?>saturday"></td>
																	<td value="<?php echo $user['id'] ?>" class="sunday" id="<?php echo $user['id'] ?>sunday"></td>
																</tr>
															<?php 
																	}
																}
															?>
														</tbody>
                        </table>
                    </div>
									</main>
								</div>
							</div>
							<?php } else {?>
								<div class="card blog-block-item" style="padding: 2%; display: -webkit-inline-box; width: 100%">
									<h3>You don't have a permission!</h3>
									<button type="button" onclick="permissionRequest()" class="login-btn btn" style="border-radius: 50px">Permission Request</button>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal account-modal fade multi-step" id="add-shift" data-keyboard="false" data-backdrop="static">
	<div class=" modal-lg modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header p-0 border-0" style="justify-content: center; padding-top: 5% !important; border-bottom: solid 1px #cccccc !important; padding-bottom: 5% !important">
        <h2 style="color: #6c2c78">
					<strong id="date"></strong>
				</h2>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" data-step="1">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							
							<div class="row" style="color: #6c2c78; justify-content: center; display: block; padding-bottom: 5%">
								<h3>Shift Details</h3>
							</div>
							<form method="post" action="user-job-scheduling">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
								<div style="display: flex">
									<div class="from-to" style="width: 30%">
										<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
										<h3 style="padding-left: 10%">Date</h3>
									</div>
									<div style="width: 70%">
										<input class="form-control" id="shift_date" name="date" type="date"></input>
									</div>
								</div>
								<div style="display: flex; padding-top: 3%">
									<div class="from-to" style="width: 30%">
										<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
										<h3 style="padding-left: 10%">Start</h3>
									</div>
									<div class="form-group" style="width: 30%; display: flex">
										<input class="form-control" type="time" id="shift_start" name="shift_start" min="09:00" max="18:00" required></input>
									</div>
									<div class="from-to" style="padding-left: 3%; padding-right: 3%; width: 10%"><h3> End</h3></div>
									<div class="form-group" style="width: 30%; display: flex">
										<input class="form-control" type="time" id="shift_end" name="shift_end" min="09:00" max="18:00" required></input>
									</div>
								</div>
								<hr></hr>
								<div style="display: flex;">
									<div style="width: 30%;">
										<h3>Shift Title</h3>
									</div>
									<div style="width: 70%">
										<div class="form-group">
											<!-- <label>Service Title <span class="text-danger">*</span></label> -->
											<!-- <input type="hidden" class="form-control" id="map_key" value="<?=$map_key?>" > -->
											<input class="form-control" type="text" name="shift_title" id="shift_title" placeholder="Type Here" required>
										</div>
									</div>
								</div>
								<div style="display: flex">
									<div style="width: 30%;">
										<h3>Location</h3>
									</div>
									<div style="width: 70%">
										<div class="form-group">
											<!-- <label>Service Title <span class="text-danger">*</span></label> -->
											<!-- <input type="hidden" class="form-control" id="map_key" value="<?=$map_key?>" > -->
											<input class="form-control" type="text" name="shift_location" id="shift_location" placeholder="Type Location" required>
										</div>
									</div>
								</div>
								<div class="form-group" style="padding-top: 5%; display: flex">
									<div style="width: 30%">
										<h3>Employees</h3>
									</div>
									<div style="width: 70%">
										<select class="form-control select" id="user_id" name="user_id" required>
											<option value="">Select Employee</option>
											<?php 
												if(!empty($users)) {
													foreach($users as $user) {
											?>
												<option name="<?php echo $user['id'] ?>" value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
											<?php 
													}
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group" style="padding-top: 5%; display: flex">
									<div style="width: 30%">
										<h3>Job</h3>
									</div>
									<div style="width: 70%">
										<label>Category <span class="text-danger">*</span></label>
										<select class="form-control select" id="category" name="category" required>
											<option value="">Select Category</option>
											<?php 
												if(!empty($lists)) {
													foreach($lists as $category) {
											?>
												<option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
											<?php 
													}
												}
											?>
										</select>
										<div class="form-group" style="padding-top: 5%">
											<label>Services<span class="text-danger">*</span></label>
											<select class="form-control select" title="Select Services" name="subcategory" id="subcategory" required></select>
										</div>
									</div>
								</div>
								<div style="display: flex">
									<div style="width: 30%">
										<h3> Note </h3>
									</div>           
									<div style="width: 70%">
										<textarea class="form-control" id="schedule_note" name="schedule_note" placeholder="Attach a note to your request">
										</textarea>
									</div>
								</div>
								<div style="padding: 5%">
									<button type="submit" id="shift_publish" class="login-btn btn" style="border-radius: 50px">Publish</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- add detail shift -->
<?php 
	if(!empty($users)) {
		foreach($users as $user) {
		$weekDates = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
			for($i=0; $i<count($weekDates); $i++) {
	
?>

<div class="modal account-modal fade multi-step" id="add-detail-shift<?php echo $user['id'].$weekDates[$i]?>" data-keyboard="false" data-backdrop="static">
	<div class=" modal-lg modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header p-0 border-0" style="justify-content: center; padding-top: 5% !important; border-bottom: solid 1px #cccccc !important; padding-bottom: 5% !important">
        <h2 style="color: #6c2c78">
					<strong id="date"></strong>
				</h2>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" data-step="1">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							
							<div class="row" style="color: #6c2c78; justify-content: center; display: block; padding-bottom: 5%">

								<h3>Shift Details</h3>
							
							</div>
							<form method="post" action="user-job-scheduling">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
								<div style="display: flex">
									<div class="from-to" style="width: 30%">
										<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
										<h3 style="padding-left: 10%">Date</h3>
									</div>   
									<div style="width: 70%">
										<input class="form-control" id="<?php echo 'shift_date'.$user['id'].$weekDates[$i] ?>" name="date" type="date"></input>
									</div>
								</div>
								<div style="display: flex; padding-top: 3%">
									<div class="from-to" style="width: 30%">
										<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
										<h3 style="padding-left: 10%">Start</h3>
									</div>
									<div class="form-group" style="width: 30%; display: flex">
										<input class="form-control" type="time" id="<?php echo 'shift_start'.$user['id'].$weekDates[$i]?>" name="shift_start" min="09:00" max="18:00" required></input>
									</div>
									<div class="from-to" style="padding-left: 3%; padding-right: 3%; width: 10%"><h3> End</h3></div>
									<div class="form-group" style="width: 30%; display: flex">
										<input class="form-control" type="time" id="<?php echo 'shift_end'.$user['id'].$weekDates[$i]?>" name="shift_end" min="09:00" max="18:00" required></input>
									</div>
								</div>
								<hr></hr>
								<div style="display: flex;">
									<div style="width: 30%;">
										<h3>Shift Title</h3>
									</div>
									<div style="width: 70%">
										<div class="form-group">
											<input class="form-control" type="text" name="shift_title" id="<?php echo 'shift_title'.$user['id'].$weekDates[$i] ?>" placeholder="Type Here" required>
										
										</div>
									</div>
								</div>
								<div style="display: flex">
									<div style="width: 30%;">
										<h3>Location</h3>
									</div>
									<div style="width: 70%">
										<div class="form-group">
											<input class="form-control" type="text" name="shift_location" id="<?php echo 'shift_location'.$user['id'].$weekDates[$i] ?>" placeholder="Type Location" required>
										</div>
									</div>
								</div>
								<div class="form-group" style="padding-top: 5%; display: flex">
									<div style="width: 30%">
										<h3>Employees</h3>
									</div>
									<div style="width: 70%">
										<select class="form-control select" id="<?php echo 'user_id'?>" name="user_id" required>
											<option value="">Select Employee</option>
											<option name="<?php echo $user['id'] ?>" id="<?php echo 'user_id'.$user['id']?>" value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
										</select>
									</div>
								</div>
								<div class="form-group" style="padding-top: 5%; display: flex">
									<div style="width: 30%">
										<h3>Job</h3>
									</div>
									<div style="width: 70%">
										<label>Category <span class="text-danger">*</span></label>
										<select class="form-control select" id="<?php echo 'category'.$user['id'] ?>" name="category" required>
											<option value="">Select Category</option>
											<?php 
												if(!empty($lists)) {
													foreach($lists as $category) {
											?>
												<option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
											<?php 
													}
												}
											?>
										</select>
										<div class="form-group" style="padding-top: 5%">
											<label>Services<span class="text-danger">*</span></label>
											<select class="form-control select" title="Select Services" name="<?php echo 'subcategory'.$user['id'] ?>" id="<?php echo 'subcategory'.$user['id'] ?>" required></select>
										</div>
									</div>
								</div>
								<div style="display: flex">
									<div style="width: 30%">
										<h3> Note </h3>
									</div>           
									<div style="width: 70%">
										<textarea class="form-control" id="<?php echo 'schedule_note'.$user['id'].$weekDates[$i] ?>" name="schedule_note" placeholder="Attach a note to your request">
										</textarea>
									</div>
								</div>
								<div style="padding: 5%">
									<button type="submit" id="<?php echo 'shift_publish'.$user['id'] ?>" class="login-btn btn" style="border-radius: 50px">Publish</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
			}
		}
	}
?>
<script type="text/javascript">

function permissionRequest() {
	toaster_msg("info", "You sent a permission request to admin successfully!");
}

function toaster_msg(status, msg) {

	setTimeout(function() {
			Command: toastr[status](msg);

			toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "3000",
					"hideDuration": "5000",
					"timeOut": "6000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
			}
	}, 300);
}

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(document).ready(function(){
	$('#category').click(function() {
		var csrf_token = $('#csrf_token').val();

		$("#subcategory").val('default');
		$("#subcategory").selectpicker("refresh");

		$.ajax({
			type: "POST",
			url: base_url + "partner/service/get_subcategory",
			data: {
				id: $(this).val(),
				csrf_token_name: csrf_token
			},
			beforeSend: function() {
				$("#subcategory option:gt(0)").remove();
				$('#subcategory').selectpicker('refresh');
				$("#subcategory").selectpicker();
				$('#subcategory').find("option:eq(0)").html("Please wait..");
				$('#subcategory').selectpicker('refresh');
				$("#subcategory").selectpicker();
			},
			success: function(data) {
				$('#subcategory').selectpicker('refresh');
				$("#subcategory").selectpicker();
				$('#subcategory').find("option:eq(0)").html("Select SubCategory");
				$('#subcategory').selectpicker('refresh');
				var obj = jQuery.parseJSON(data);
				$('#subcategory').selectpicker('refresh');
				$("#subcategory").selectpicker();
				$(obj).each(function() {
					var option = $('<option />');
					option.attr('value', this.value).text(this.label);
					$('#subcategory').append(option);
				});
				$('#subcategory').selectpicker('refresh');
				$("#subcategory").selectpicker();
			}
		});

	});
	 
		let csrf_token = $('#csrf_token').val();

    let result = [];

    const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    $('#datePicker').datepicker({ //initiate JQueryUI datepicker
        showAnim: 'fadeIn',
        dateFormat: "dd/mm/yy",
        firstDay: 1, //first day is Monday
        beforeShowDay: function(date) {
					return [date.getDay() == 1,""];
        },
        onSelect: populateDates
    });
    
    function populateDates() {
        const weekDates = [];
        const postDates = [];
        let result = [];
				
        let chosenDate = $('#datePicker').datepicker('getDate'); //get chosen date from datepicker
        let newDate;
        const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

				for(let i = 0; i < weekDays.length; i++) {
					newDate = new Date(chosenDate); //create date object
					newDate.setDate(chosenDate.getDate() + i); //increment set date
					if((newDate.getMonth()+1) < 10 && newDate.getDate() < 10) {
						postDates.push(newDate.getFullYear() + '-0' + (newDate.getMonth() + 1) + '-0' + newDate.getDate());
						weekDates.push('0' + newDate.getDate() + '/0' + (newDate.getMonth() + 1));
					}
					if((newDate.getMonth()+1) < 10 && newDate.getDate() >= 10) {
						postDates.push(newDate.getFullYear() + '-0' + (newDate.getMonth() + 1) + '-' + newDate.getDate());
						weekDates.push(newDate.getDate() + '/0' + (newDate.getMonth() + 1));
					}
					if((newDate.getMonth()+1) >= 10 && newDate.getDate() >= 10) {
						postDates.push(newDate.getFullYear() + '-' + (newDate.getMonth() + 1) + '-' + newDate.getDate());
						weekDates.push(newDate.getDate() + '/' + (newDate.getMonth() + 1));
					}
					if((newDate.getMonth()+1) >= 10 && newDate.getDate() < 10) {
						postDates.push(newDate.getFullYear() + '-' + (newDate.getMonth() + 1) + '-0' + newDate.getDate());
						weekDates.push('0' + newDate.getDate() + '/' + (newDate.getMonth() + 1));
					}
				}

				$(document).ready(function(){ 
					$('#monday').text(weekDates[0]);
					$('#tuesday').text(weekDates[1]);
					$('#wednsday').text(weekDates[2]);
					$('#thursday').text(weekDates[3]);
					$('#friday').text(weekDates[4]);
					$('#saturday').text(weekDates[5]);
					$('#sunday').text(weekDates[6]);
				})
        //format table with setting date
				$('.monday').empty();
				$('.tuesday').empty();
				$('.wednsday').empty();
				$('.thursday').empty();
				$('.friday').empty();
				$('.saturday').empty();
				$('.sunday').empty();

				$.ajax({
            type: "POST",
            url: "../../partner/dashboard/shift_get_data",
            data: {
							weekDates: postDates,
							csrf_token_name: csrf_token
            },
            success: function(response) {
							temp = [];
							temp = JSON.parse(response);
							console.log(temp);
							if(temp[0].length > 0){
								for(let i=0; i<temp[0].length; i++){
									$("#" + temp[0][i].user_id + 'monday').empty();
									$('#' + temp[0][i].user_id + 'mon').attr("style", "display: none");
									let mon = `<div id="${temp[0][i].user_id}mon" onclick="detailFun(${temp[0][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[0][i].user_id}mon" class='schedule-detail'>${temp[0][i].schedule_job}</br>${temp[0][i].shift_start} - ${temp[0][i].shift_end}</div>`;
									$("#" + temp[0][i].user_id + 'monday').prepend(mon);
									$("#shift_title" + temp[0][i].user_id + 'mon').val(temp[0][i].shift_title);
									$("#shift_location" + temp[0][i].user_id + 'mon').val(temp[0][i].location);
									$("#schedule_note" + temp[0][i].user_id + 'mon').text(temp[0][i].schedule_note);
									$("#shift_start" + temp[0][i].user_id + 'mon').val(temp[0][i].shift_start);
									$("#shift_end" + temp[0][i].user_id + 'mon').val(temp[0][i].shift_end);
									$("#shift_date" + temp[0][i].user_id + 'mon').val(temp[0][i].shift_date);
									$('#subcategory'+ temp[0][i].user_id).text(temp[0][i].schedule_job);
									// $("#category" + temp[0][i].user_id).val(temp[0][i].shift_date);
								}
							}
							if(temp[1].length > 0){
								for(let i=0; i<temp[1].length; i++){
									$("#" + temp[1][i].user_id + 'tuesday').empty();
									$('#' + temp[1][i].user_id + 'tue').attr("style", "display: none");
									let tue = `<div id="${temp[1][i].user_id}tue" onclick="detailFun(${temp[1][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[1][i].user_id}tue" class='schedule-detail'>${temp[1][i].schedule_job}</br>${temp[1][i].shift_start} - ${temp[1][i].shift_end}</div>`;
									$("#" + temp[1][i].user_id + 'tuesday').prepend(tue);
									$("#shift_title" + temp[1][i].user_id + 'tue').val(temp[1][i].shift_title);
									$("#shift_location" + temp[1][i].user_id + 'tue').val(temp[1][i].location);
									$("#schedule_note" + temp[1][i].user_id + 'tue').text(temp[1][i].schedule_note);
									$("#shift_start" + temp[1][i].user_id + 'tue').val(temp[1][i].shift_start);
									$("#shift_end" + temp[1][i].user_id + 'tue').val(temp[1][i].shift_end);
									$("#shift_date" + temp[1][i].user_id + 'tue').val(temp[1][i].shift_date);
									$('#subcategory'+ temp[1][i].user_id).text(temp[1][i].schedule_job);
								}
							} 
							if(temp[2].length > 0){
								for(let i=0; i<temp[2].length; i++){
									$('#' + temp[2][i].user_id + 'wed').attr("style", "display: none");
									let wed = `<div id="${temp[2][i].user_id}wed" onclick="detailFun(${temp[2][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[2][i].user_id}wed" class='schedule-detail'>${temp[2][i].schedule_job}</br>${temp[2][i].shift_start} - ${temp[2][i].shift_end}</div>`;
									$("#" + temp[2][i].user_id + 'wednsday').prepend(wed);
									$("#shift_title" + temp[2][i].user_id + 'wed').val(temp[2][i].shift_title);
									$("#shift_location" + temp[2][i].user_id + 'wed').val(temp[2][i].location);
									$("#schedule_note" + temp[2][i].user_id + 'wed').text(temp[2][i].schedule_note);
									$("#shift_start" + temp[2][i].user_id + 'wed').val(temp[2][i].shift_start);
									$("#shift_end" + temp[2][i].user_id + 'wed').val(temp[2][i].shift_end);
									$("#shift_date" + temp[2][i].user_id + 'wed').val(temp[2][i].shift_date);
									$('#subcategory'+ temp[2][i].user_id).text(temp[2][i].schedule_job);
								}
							}
							if(temp[3].length > 0){
								for(let i=0; i<temp[3].length; i++){
									$('#' + temp[3][i].user_id + 'thu').attr("style", "display: none");
									let thur = `<div id="${temp[3][i].user_id}thu" onclick="detailFun(${temp[3][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[3][i].user_id}thu" class='schedule-detail'>${temp[3][i].schedule_job}</br>${temp[3][i].shift_start} - ${temp[3][i].shift_end}</div>`;
									$("#" + temp[3][i].user_id + 'thursday').prepend(thur);
									$("#shift_title" + temp[3][i].user_id + 'thu').val(temp[3][i].shift_title);
									$("#shift_location" + temp[3][i].user_id + 'thu').val(temp[3][i].location);
									$("#schedule_note" + temp[3][i].user_id + 'thu').text(temp[3][i].schedule_note);
									$("#shift_start" + temp[3][i].user_id + 'thu').val(temp[3][i].shift_start);
									$("#shift_end" + temp[3][i].user_id + 'thu').val(temp[3][i].shift_end);
									$("#shift_date" + temp[3][i].user_id + 'thu').val(temp[3][i].shift_date);
									$('#subcategory'+ temp[3][i].user_id).text(temp[3][i].schedule_job);
								}
							}
							if(temp[4].length > 0){
								for(let i=0; i<temp[4].length; i++){
									$('#' + temp[4][i].user_id + 'fri').attr("style", "display: none");
									let fri = `<div id="${temp[4][i].user_id}fri" onclick="detailFun(${temp[4][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[4][i].user_id}fri" class='schedule-detail'>${temp[4][i].schedule_job}</br>${temp[4][i].shift_start} - ${temp[4][i].shift_end}</div>`;
									$("#" + temp[4][i].user_id + 'friday').prepend(fri);
									$("#shift_title" + temp[4][i].user_id + 'fri').val(temp[4][i].shift_title);
									$("#shift_location" + temp[4][i].user_id + 'fri').val(temp[4][i].location);
									$("#schedule_note" + temp[4][i].user_id + 'fri').text(temp[4][i].schedule_note);
									$("#shift_start" + temp[4][i].user_id + 'fri').val(temp[4][i].shift_start);
									$("#shift_end" + temp[4][i].user_id + 'fri').val(temp[4][i].shift_end);
									$("#shift_date" + temp[4][i].user_id + 'fri').val(temp[4][i].shift_date);
									$('#subcategory'+ temp[4][i].user_id).text(temp[4][i].schedule_job);
								}
							}
							if(temp[5].length > 0){
								for(let i=0; i<temp[5].length; i++){
									$('#' + temp[5][i].user_id + 'sat').attr("style", "display: none");
									let sat = `<div id="${temp[5][i].user_id}sat" onclick="detailFun(${temp[5][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[5][i].user_id}sat" class='schedule-detail'>${temp[5][i].schedule_job}</br>${temp[5][i].shift_start} - ${temp[5][i].shift_end}</div>`;
									$("#" + temp[5][i].user_id + 'saturday').prepend(sat);
									$("#shift_title" + temp[5][i].user_id + 'sat').val(temp[5][i].shift_title);
									$("#shift_location" + temp[5][i].user_id + 'sat').val(temp[5][i].location);
									$("#schedule_note" + temp[5][i].user_id + 'sat').text(temp[5][i].schedule_note);
									$("#shift_start" + temp[5][i].user_id + 'sat').val(temp[5][i].shift_start);
									$("#shift_end" + temp[5][i].user_id + 'sat').val(temp[5][i].shift_end);
									$("#shift_date" + temp[5][i].user_id + 'sat').val(temp[5][i].shift_date);
									$('#subcategory'+ temp[5][i].user_id).text(temp[5][i].schedule_job);
								}
							}
							if(temp[6].length > 0){
								for(let i=0; i<temp[6].length; i++){
									$('#' + temp[6][i].user_id + 'sun').attr("style", "display: none");
									let sun = `<div id="${temp[6][i].user_id}sun" onclick="detailFun(${temp[6][i].user_id})" data-toggle="modal" data-target="#add-detail-shift${temp[6][i].user_id}sun" class='schedule-detail'>${temp[6][i].schedule_job}</br>${temp[6][i].shift_start} - ${temp[6][i].shift_end}</div>`;
									$("#" + temp[6][i].user_id + 'sunday').prepend(sun);
									$("#shift_title" + temp[6][i].user_id + 'sun').val(temp[6][i].shift_title);
									$("#shift_location" + temp[6][i].user_id + 'sun').val(temp[6][i].location);
									$("#schedule_note" + temp[6][i].user_id + 'sun').text(temp[6][i].schedule_note);
									$("#shift_start" + temp[6][i].user_id + 'sun').val(temp[6][i].shift_start);
									$("#shift_end" + temp[6][i].user_id + 'sun').val(temp[6][i].shift_end);
									$("#shift_date" + temp[6][i].user_id + 'sun').val(temp[6][i].shift_date);
									$('#subcategory'+ temp[6][i].user_id).text(temp[6][i].schedule_job);
								}
							}
            }
        });
    }
		$('#shift_publish').click(function() {
			
			$.ajax({
					url: '../../partner/dashboard/shift_add_data',
					type: 'POST',
					data: {
						shift_title: $('#shift_title').val(),
						shift_date: $('#shift_date').val(),
						shift_start: $('#shift_start').val(),
						shift_end: $('#shift_end').val(),
						shift_location: $('#shift_location').val(),
						subcategory: $('#subcategory').text().replace("Select SubCategory", ""),
						schedule_note: $('#schedule_note').val(),
						user_id: $('#user_id').val(),
						csrf_token_name: csrf_token
					},
					success: function(msg) {
							// alert('Email Sent');
					}               
			});
		});
});
const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML =  weekDays[n.getDay()].slice(0,3) + ", " + months[n.getMonth() + 1].slice(0,3) + " "+ d + ", " + y;

function detailFun(detail) {

	$('#category' + detail).click(function() {
		var csrf_token = $('#csrf_token').val();

		$("#subcategory" + detail).val('default');
		$("#subcategory" + detail).selectpicker("refresh");

		$.ajax({
			type: "POST",
			url: base_url + "partner/service/get_subcategory",
			data: {
				id: $(this).val(),
				csrf_token_name: csrf_token
			},
			beforeSend: function() {
				$("#subcategory" + detail + " option:gt(0)").remove();
				$('#subcategory' + detail).selectpicker('refresh');
				$("#subcategory" + detail).selectpicker();
				$('#subcategory' + detail).find("option:eq(0)").html("Please wait..");
				$('#subcategory' + detail).selectpicker('refresh');
				$("#subcategory" + detail).selectpicker();
			},
			success: function(data) {
				$('#subcategory' + detail).selectpicker('refresh');
				$("#subcategory" + detail).selectpicker();
				$('#subcategory' + detail).find("option:eq(0)").html("Select SubCategory");
				$('#subcategory' + detail).selectpicker('refresh');
				var obj = jQuery.parseJSON(data);
				$('#subcategory' + detail).selectpicker('refresh');
				$("#subcategory" + detail).selectpicker();
				$(obj).each(function() {
					var option = $('<option />');
					option.attr('value', this.value).text(this.label);
					$('#subcategory' + detail).append(option);
				});
				$('#subcategory' + detail).selectpicker('refresh');
				$("#subcategory" + detail).selectpicker();
			}
		});

	});
	$('#shift_publish' + detail).click(function() {
		var csrf_token = $('#csrf_token').val();
		console.log(detail, $('#subcategory' + detail).text().replace("Select SubCategory", ""), '-----shifttitle')
		$.ajax({
				url: '../../partner/dashboard/shift_update_data',
				type: 'POST',
				data: {
					shift_title: $('#shift_title' + detail).val(),
					shift_date: $('#shift_date' + detail).val(),
					shift_start: $('#shift_start' + detail).val(),
					shift_end: $('#shift_end' + detail).val(),
					shift_location: $('#shift_location' + detail).val(),
					// subcategory: $('#	' + detail).text().replace("Select SubCategory", ""),
					schedule_note: $('#schedule_note' + detail).val(),
					user_id: detail,
					csrf_token_name: csrf_token
				},
				success: function(msg) {
						// alert('Email Sent');
				}               
		});
	});
}
</script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/tazzergroup/home.css?v1.13">
<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>