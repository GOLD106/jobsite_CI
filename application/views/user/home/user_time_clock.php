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
.profile-img-modal {
	width: 60px;
	height: 60px;
	border-radius: 50px;
	/* margin-top: 7%; */
}
.schedule-detail {
	width: 100px;
	overflow: hidden;
	/* display: inline-block; */
	text-overflow: ellipsis;
	white-space: nowrap;
}
.search-user {
	display: flex;
	padding-bottom: 3%
}
.weekcommencing {
	text-align: center;
	min-width: 190px;
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
		display: none;
		padding-bottom: 3%;
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
					$this->load->view('user/home/user_sidemenu');
				?>
		 
			<div class="col-xl-9 col-md-8">
				<div class="tab-content pt-0">
					<div class="tab-pane show active" id="user_profile_settings" >
						<div class="widget">
							<?php 
								if($status[0]['name'] === 'Company') { 
							?>

							<div class="card blog-block-item" style="padding: 2%; display: -webkit-inline-box; width: 100%">
								<div  style="width: 50%">
									<h3 style="color: #6c2c78"> Time Clock Lobby </h3>
								</div>
								<!-- <div style="width: 50%">
									<button class="login-btn btn" style="border-radius: 50px" data-toggle="modal" data-target="#add-shift">Add Shifts</button>
								</div> -->
							</div>
							<div class="card blog-block-item" style="padding: 2%; display: -webkit-inline-box; width: 100%">
								<div class="text-center">

									<main style="padding-top: 5%; padding-bottom: 10%">
											<h3 style="text-align: left">Employees clocked in today</h3>
											<form action="employee/timesheet" method="POST">
												<!-- <div class="form-group row"> -->
											
												<div class="col-6 search-user">
													<p style="width: 70%; align-self: center;color: #8f8f8f;padding-top: 3%;font-size: 16px; text-align: left">Search User</p>
													<input type="search" onkeyup="myFunction()" id="myInput" class="form-control " style="border-radius: 50px; out-line: none; " placeholder="Type keyword..."></input>
												</div>
											</form>
											<div class="table-responsive">
                        <table class="table" id="myTable">
													<thead>
														<tr>
															<th style="text-align: center">First Name</th>
															<th>Job</th>
															<th>Location</th>
															<th>Clock In</th>
															<th>Clock Out</th>
															<th>Total Hours</th>
															<th>Hours Worked</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															if(!empty($users)) { 
																foreach($users as $user) {
														?>
															<tr style="cursor: pointer" onclick="modalFunction(<?php echo $user['id']?>)" data-toggle="modal" id="<?php echo $user['id']?>" data-target="<?php echo '#shift'.$user['id']?>" >
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
																	<?php 
																		if(!empty($clocked_today)) {
																		foreach($clocked_today as $clocked) {
																			if($user['id'] === $clocked['user_id']) {
																	?>
																		<td style="vertical-align: middle;" class="schedule-detail"> <?php echo $clocked['job_title'] ?> </td>
																		<td style="vertical-align: middle;"> <?php echo $clocked['location'] ?> </td>
																		<td style="vertical-align: middle;"> <?php echo $clocked['clocked_in'] ?> </td>
																		<td style="vertical-align: middle;"> <?php echo $clocked['clocked_out'] ?> </td>
																		<td style="vertical-align: middle;"> <?php echo $clocked['total_hours'] ?> </td>
																		<td style="vertical-align: middle;"> <?php echo $clocked['note'] ?> </td>
																		<!-- <td style="vertical-align: middle;"> <?php echo $clocked['note'] ?> </td> -->
																	<?php 
																		} else {
																	?>
																		<td style="vertical-align: middle;"> -- </td>
																		<td style="vertical-align: middle;"> -- </td>
																		<td style="vertical-align: middle;"> -- </td>
																		<td style="vertical-align: middle;"> -- </td>
																		<td style="vertical-align: middle;"> -- </td>
																		<td style="vertical-align: middle;"> -- </td>
																	<?php 
																				}
																			}
																		}
																	?>
																<td style="vertical-align: middle;"> -- </td>
																<td style="vertical-align: middle;"> -- </td>
																<td style="vertical-align: middle;"> -- </td>
																<td style="vertical-align: middle;"> -- </td>
																<td style="vertical-align: middle;"> -- </td>
																<td style="vertical-align: middle;"> -- </td>
															</tr>															
														<?php 
																	}
																}
															?>
														</td>
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

<!-- clocked modal -->
<?php 
	foreach($users as $user) {
?>
<div class="modal account-modal fade multi-step" id="<?php echo 'shift'.$user['id']?>" value="<?php echo $user['id']?>" data-keyboard="false" data-backdrop="static">
	<div class=" modal-lg modal-dialog modal-dialog-centered" style="max-width: 95%;">
		<div class="modal-content">
			<div class="modal-header p-0 border-0" style="justify-content: left; padding-top: 5% !important; border-bottom: solid 1px #cccccc !important; padding-bottom: 5% !important">
				<div style="display: flex; padding-left: 5%">
					<?php if($user['profile_img']) { ?>
						<img class="profile-img-modal" src="<?php echo $user['profile_img'] ?>" alt="" />
					<?php 
							}
						else {
					?>
						<img class="profile-img-modal" src="<?php echo base_url().'assets/img/user.jpg' ?>" alt="" />
					<?php 
						}
					?>
					<h2 style="color: #6c2c78; align-self: center; padding-left: 5%; padding-right: 10%">
						<?php echo $user['name'] ?>
					</h2>
					<div class="row" style="color: #6c2c78; justify-content: center; align-items: center">
						<form action="employee/timesheet" method="POST">
							<!-- <div class="form-group row"> -->
							<div class="col-8">
								<label class="sr-only" for="datePicker">Date</label>
								<input type="text" style="border-radius: 50px; text-align: center" class="form-control mb-2 mr-sm-2 col-4 weekcommencing" name="<?php echo 'datePicker'.$user['id']?>" id="<?php echo 'datePicker'.$user['id']?>" placeholder="week commencing">
							</div>

						</form>
						<!-- <input type="text" style="border-radius: 50px; " class="form-control weekcommencing" name="datePicker" id="datePicker" placeholder="week commencing" /> -->
					</div>
				</div>

				<button type="button" class="close" data-dismiss="modal" onclick="closeFunc(<?php echo $user['id'] ?>)" id="close<?php echo 'close'.$user['id']?>" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" style="padding: 0" data-step="1">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="table-responsive">
								<table class="table" id="myTable">
									<thead style="background-color: #ccc">
										<tr>
											<th style="width: 10%">Date</th>
											<th style="width: 10%">Status</th>
											<th style="width: 10%">Start</th>
											<th style="width: 10%">End</th>
											<th style="width: 10%">Total Hours</th>
											<!-- <th style="width: 10%">Daily total</th> -->
											<!-- <th style="width: 10%">Weekly total</th> -->
											<th style="width: 10%">Absence</th>
											<!-- <th style="width: 10%">Absence</th> -->
											<th style="width: 10%">Employee Notes</th>
											<!-- <th style="width: 10%">Manager Notes</th> -->
										</tr>
									</thead>
									<tbody id="<?php echo 'tBody'.$user['id'] ?>">
										<tr>
											<td class="day" style="border-bottom: solid 1px #ccc">--</td>
											<td class="status" style="border-bottom: solid 1px #ccc">--</td>
											<td class="start-time" style="border-bottom: solid 1px #ccc"> -- </td>
											<td class="end-time" style="border-bottom: solid 1px #ccc">--</td>
											<td class="total-hours" style="border-bottom: solid 1px #ccc">--</td>
											<td class="absence-type" style="border-bottom: solid 1px #ccc">--</td>
											<td class="employee-notes" style="border-bottom: solid 1px #ccc">--</td>
										</tr>
            			</tbody>
									
								</table>
							</div>
							<div style="padding: 5%; text-align: right">
								<button class="login-btn btn" onclick="saveChanages(<?php echo $user['id'] ?>)" id="<?php echo 'save-button'.$user['id'] ?>" style="display: inline-flex;"> Save Changes </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
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

function closeFunc(userID) {
	$('#tBody'  + userID).empty(); //clear table
	$('.bottom').removeClass('d-none'); //display total hours worked
}

function modalFunction(userID) {
	const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	let csrf_token = $('#csrf_token').val();
		$('#tBody' + userID).append(`
			<tr>
				<td class="day" style="border-bottom: solid 1px #ccc">--</td>
				<td class="status" style="border-bottom: solid 1px #ccc">--</td>
				<td class="start-time" style="border-bottom: solid 1px #ccc"> -- </td>
				<td class="end-time" style="border-bottom: solid 1px #ccc">--</td>
				<td class="total-hours" style="border-bottom: solid 1px #ccc">--</td>
				<td class="absence-type" style="border-bottom: solid 1px #ccc">--</td>
				<td class="employee-notes" style="border-bottom: solid 1px #ccc">--</td>
			</tr>
		` );

		$('#datePicker' + userID).datepicker({ //initiate JQueryUI datepicker
        showAnim: 'fadeIn',
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        beforeShowDay: function(date) {
					return [date.getDay() == 1,""];
        },
        onSelect: populateDates
    });
    
    function populateDates() {
			const weekDates = [];
			const postDates = [];
			
			let result = [];
			$('#tBody'  + userID).empty(); //clear table
			$('.bottom').removeClass('d-none'); //display total hours worked

			let chosenDate = $('#datePicker' + userID).datepicker('getDate'); //get chosen date from datepicker
			let newDate;
			const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

			for(let i = 0; i < weekDays.length; i++) {
				newDate = new Date(chosenDate); //create date object
				newDate.setDate(chosenDate.getDate() + i); //increment set date

				months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
				days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

				let weekly_date = days[newDate.getDay()]+' '+months[newDate.getMonth()]+' '+newDate.getDate()+' '+newDate.getFullYear()
				weekDates.push(weekly_date);

				if((newDate.getMonth()+1) < 10 && newDate.getDate() < 10) {
					postDates.push(newDate.getFullYear() + '-0' + (newDate.getMonth() + 1) + '-0' + newDate.getDate());
				}
				if((newDate.getMonth()+1) < 10 && newDate.getDate() >= 10) {
					postDates.push(newDate.getFullYear() + '-0' + (newDate.getMonth() + 1) + '-' + newDate.getDate());
				}
				if((newDate.getMonth()+1) >= 10 && newDate.getDate() >= 10) {
					postDates.push(newDate.getFullYear() + '-' + (newDate.getMonth() + 1) + '-' + newDate.getDate());
				}
				if((newDate.getMonth()+1) >= 10 && newDate.getDate() < 10) {
					postDates.push(newDate.getFullYear() + '-' + (newDate.getMonth() + 1) + '-0' + newDate.getDate());
				}
				$('#tBody' + userID).append(`
					<tr>
						<td class="day" id="day${userID}${monStartWeekDays[i]}">${weekly_date}</td>
						<td class="status"><input onchange="" id="status${userID}${monStartWeekDays[i]}"/></td>
						<td class="start-time"><input id="start${userID}${monStartWeekDays[i]}" class="time ui-timepicker-input" type="text" /></td>
						<td class="end-time"><input id="end${userID}${monStartWeekDays[i]}" class="time ui-timepicker-input" type="text" /></td>
						<td class="total-hours" id="total${userID}${monStartWeekDays[i]}"></td>
						<td class="absence-type" id="absence${userID}${postDates[i]}"></td>
						<td class="employee-notes" id="employee${userID}${monStartWeekDays[i]}"></td>
					</tr>
				` );
			}
			$.ajax({
					type: "POST",
					url: "../../user/dashboard/shift_detail_get_data",
					data: {
						weekDates: weekDates,
						postDates: postDates,
						userID: userID,
						csrf_token_name: csrf_token
					},
					success: function(response) {
						temp = [];
						temp = JSON.parse(response);

						for(let i=0; i<7; i++) {
							if(temp['shift_detail'][i].length > 0) {
								$('#status' + userID + monStartWeekDays[i]).val(temp['shift_detail'][i][0].job_title)
								$('#start' + userID + monStartWeekDays[i]).val(temp['shift_detail'][i][0].clocked_in)
								$('#end' + userID + monStartWeekDays[i] ).val(temp['shift_detail'][i][0].clocked_out)
								let work_hour = ((parseInt(temp['shift_detail'][i][0].clocked_out.split(":")[0]) - parseInt(temp['shift_detail'][i][0].clocked_in.split(":")[0])) + 
																Math.abs(parseInt(temp['shift_detail'][i][0].clocked_out.split(":")[1].slice(0,-2)) - parseInt(temp['shift_detail'][i][0].clocked_in.split(":")[1].slice(0,-2)))/60).toFixed(2);
								$('#total' + userID + monStartWeekDays[i] ).text(work_hour);
								$('#employee' + userID + monStartWeekDays[i]).text(temp['shift_detail'][i][0].note);
							}

							if(temp['from_date'][i].length > 0) {
								let fromDate = parseInt(temp['from_date'][i][0].absence_from.split("-")[2])
								let toDate = parseInt(temp['from_date'][i][0].absence_to.split("-")[2])
								for(let j=fromDate; j<=toDate; j++) {
									if(j>=10) {
										let duration = temp['from_date'][i][0].absence_from.split("-")[0] + '-' + temp['from_date'][i][0].absence_from.split("-")[1] + '-' + j;
										$('#absence' + userID + duration).text(temp['from_date'][i][0].absence_type);
									}
									if(j<10) {
										let duration = temp['from_date'][i][0].absence_from.split("-")[0] + '-'+ temp['from_date'][i][0].absence_from.split("-")[1] + '-0' + j;
										$('#absence' + userID + duration).text(temp['from_date'][i][0].absence_type);
									}
								}
							}
						}
					}
			});
		}
}
function saveChanages(userID) {
	let csrf_token = $('#csrf_token').val();
	$('#tBody'  + userID).empty(); //clear table
	$('.bottom').removeClass('d-none'); //display total hours worked
	const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
	for(let i=0; i<monStartWeekDays.length; i++) {
		
		$.ajax({
				url: '../../user/dashboard/shift_detail_add_data',
				type: 'POST',
				data: {
					work_date: $('#day' + userID + monStartWeekDays[i]).text(),
					job_title: $('#status' + userID + monStartWeekDays[i]).val(),
					clocked_in: $('#start' + userID + monStartWeekDays[i]).val(),
					clocked_out: $('#end' + userID + monStartWeekDays[i]).val(),
					work_hour: $('#total' + userID + monStartWeekDays[i]).val(),
					note: $('#employee' + userID + monStartWeekDays[i]).val(),
					user_id: userID,
					csrf_token_name: csrf_token
				},
				success: function(response) {
				}               
		});
	}
	window.location.href="user-time-clock";
}

$(document).ready(function(){
	$('#category').click(function() {
		var csrf_token = $('#csrf_token').val();

		$("#subcategory").val('default');
		$("#subcategory").selectpicker("refresh");

		$.ajax({
			type: "POST",
			url: base_url + "user/service/get_subcategory",
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
});
</script>

<link rel="stylesheet" href="<?=base_url()?>assets/css/tazzergroup/home.css?v1.13">
<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>