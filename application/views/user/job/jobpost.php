
<div class="breadcrumb-bar jobpost_banner">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="jobpost-title">
					<h2> Post a job </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class = "container" style = "padding-top:50px;">
    <div class = "jobpost-content " >
        <form id = "insert-jobpost" class  = "job-post"  action="<?php echo base_url('job/jobpost/create_post'); ?> "  method="post"     enctype="multipart/form-data">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

            <div class="job-name">
                <div class= "job-name-title"><span class = "under"> Great!</span> Let'give your job a name</div>
                <input class="form-control job-name-form" type="text" name="name" id="name" placeholder = "e.g I need gardenning service" required 
				oninvalid="this.setCustomValidity('Enter User Name Here')"  oninput="this.setCustomValidity('')">
            </div>

			<div class="job-description">
                <div class= "job-name-title"> Job Description</div>
				<textarea class= "form-control job-post-description" name="job-description-content" required oninvalid="this.setCustomValidity('Enter Description Here')" oninput="this.setCustomValidity('')"></textarea>
               
            </div>

			<div class="job-name">
                <div class= "job-name-title"> Email</div>
                <input class="form-control job-name-form" type="email" name="email" id="email" required 
				oninvalid="this.setCustomValidity('Enter Your Email Here')"  oninput="this.setCustomValidity('')">
            </div>

			<div class="job-name">
                <div class= "job-name-title">Phone Number</div>
                <input class="form-control job-name-form" type="text" name="phone_number" id="phone_number"  required 
				oninvalid="this.setCustomValidity('Enter Your phone number Here')"  oninput="this.setCustomValidity('')">
            </div>

			<div class="job-name">
                <div class= "job-name-title">Location</div>
                <input class="form-control job-name-form" type="text" name="location" id="location"  required 
				oninvalid="this.setCustomValidity('Enter Your Location')"  oninput="this.setCustomValidity('')">
            </div>

			
			<div class = "select-job-servcie job-center-div"> 
				<div class= "job-name-title"><span class = "under"> Wha</span>t do you need?</div>
				<select class = "form-control" id ="selected-category" name = "job_category" required oninvalid="this.setCustomValidity('Select Service Category')"  oninput="this.setCustomValidity('')"> 
				<?php  
                    foreach ($category_list as $key => $category) {  ?>
					<option  value ="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
				<?php } ?>	
				</select>		
			</div>

			<div id = "select-category-button-div"  class = "next-button-div" >
			    <a class="next-button"  id="next-button" name = "next"  
				href="javascript:nextCat();"> Next <img src="/assets/img/job/right-arrow.png"> </a>

			</div>	

			<div id = "sub_category_service" class = "select-job-servcie job-center-div" > 
			</div>	

			<div id = "next-detail-service"  class = "next-button-div" style = "display:none">
			<a class="next-button"  id="next-button" name = "next"  
				href="javascript:selectService();"> Next <img src="/assets/img/job/right-arrow.png"> </a>

			</div>

			<div id = "detail_service" class = "select-job-servcie job-center-div" >
			</div> 	
			
			<div id = "next-job-pay"  class = "next-button-div" style = "display:none">
			   <a class="next-button"  id="next-button" name = "next"  
				href="javascript:selectJobpay();"> Next <img src="/assets/img/job/right-arrow.png"> </a>

			</div>	


						

			<div id = "select-fixed-job" class = "fixed-hourly job-center-div" style = "display:none">
				<div class= "job-name-title"><span class = "under"> How </span> would you like pay?</div>
				<div class = "row" >
					<div class = "col-xl-5 col-sm-5 col-12 fixed-price" id = "fixed-job">
						<img src="/assets/img/job/coin.png" style = "display:inline-block;width:20%">
						<div class = "price-content-text">
							<h6 class= "fixed-text-h6">Fixed Price</h6>
							<p>Recommended for projects that have finite deliverables</p>
							
						</div>
						<img src="/assets/img/job/arrow-right.svg" style = "display:inline-block ;width :5%;"> 
					</div>
					<div class = "col-xl-2 col-sm-2 col-12  or-text" >
						OR
					</div>	
					<div class = "col-xl-5 col-sm-5 col-12 hourly-price" id = "hourly-job">
						<img src="/assets/img/job/pay.png" style = "display:inline-block;width:20%">
						<div class = "price-content-text">
							<h6 class= "fixed-text-h6">Hourly Price</h6>
							<p>Recommended for projects that have finite deliverables</p>
							
						</div>
						<img src="/assets/img/job/arrow-right.svg" style = "display:inline-block ;width :5%;"> 
					</div>		
				</div>
				

			</div >	

			<div id = "fixed-select-value" class = "select-job-servcie job-center-div" style = "display:none"> 
				<div class= "job-name-title"><span class = "under"> what</span> budget do you have in mind</div>
				<select class = "form-control" name = "fixed_value" id = "fixed_value"  oninvalid="this.setCustomValidity('Select Price "  oninput="this.setCustomValidity('')"> 
					<option  value ="">Select Price</option>
					<option  value ="1">$1000 - 2000</option>
					<option  value ="2">$2000 - 3000</option>
					<option  value ="3">$3000 - 4000</option>
					<option  value ="4">$4000 - 5000</option>

				</select>		
			</div>

			<div id = "hourly-select-value" class = "select-job-servcie job-center-div" style = "display:none"> 
				<div class= "job-name-title"><span class = "under"> what</span> budget do you have in mind(hourly)</div>
				<select class = "form-control" id = "hourly_value" name = "hourly_value"  oninvalid="this.setCustomValidity('Select Price "  oninput="this.setCustomValidity('')"> 
					<option value ="" >Select Price</option>
					<option  value ="1">$10 per hour</option>
					<option  value ="2">$20 per hour</option>
					<option  value ="3">$30 per hour</option>
					<option  value ="4">$40 per hour</option>

				</select>		
			</div>

			<div id = "next-file-upload"  class = "next-button-div" style = "display:none">
			   <a class="next-button"  id="next-button" name = "next"  
				href="javascript:nextfileupload();"> Next <img src="/assets/img/job/right-arrow.png"> </a>

			</div>	
			
			<div id = "job-file-upload" class = "select-job-servcie job-center-div" style = "display:none"> 
				<div class= "job-name-title"><span class = "under"> Any </span> Attachments that help explain what you need done</div>
				

				<div class="job-file-upload-input">
					

					<div class="image-upload-wrap">
						<input class="file-upload-input" type='file' name= "job_upload_file" onchange="readURL(this);" accept="image/*" />
						<div class="drag-text">
						<h3>Drag and drop a file or select add Image</h3>
						</div>
					</div>
					<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><img src = "/assets/img/job/add.png" class = "file-upload-button "></button>
					
				</div>
				<div class="file-upload-content">
						<div class = "upload-image-part">
							<img class="file-upload-image" src="#" alt="your image" />
							<a href="javascript:onclick(removeUpload())" class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
						</div>
						
						<div class="image-title-wrap">						
						    <span class="image-title">Uploaded Image</span>
					    </div>

				</div>
			</div>
			<div id = "job-post-btn"  class = "next-button-div" style = "display:none;">
			    <button class="next-button" type= "submit" id="next-button" name = "post_job">Post Job  </button>

			</div>

       </form>     

    </div>
</div>     

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/job/jobpost.css">

<script >

function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
     // $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);





  } else {
    removeUpload();
  }
}

function removeUpload() {
	$('.file-upload-input').replaceWith($('.file-upload-input').clone());
	$('.file-upload-content').hide();
	$('.image-upload-wrap').show();
}

$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
});

$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

function nextCat() {
	$("#select-category-button-div").hide();
	$("#next-detail-service").show();

	var BASE_URL = $('#base_url').val();
    var csrf_token = $("#csrf_token").val();

        var selected_category = $('#selected-category').val();
		var category_text = $( "#selected-category option:selected" ).text();

	

        var url = BASE_URL + 'job/jobpost/get_sub_category';
      
      
        
        var data = {
            selected_category : selected_category,
            category_text:category_text ,
            csrf_token_name: csrf_token
        };
        $.ajax({
          	url: url,
          	data: data,
          	type: "POST",
          
          	success: function(res) {

              
	          
                $('#sub_category_service').html(res);
	            // $('#service_location').trigger('change')
          	}
        });
}

function selectService() {

	$("#next-detail-service").hide();
	$("#next-job-pay").show();

	var BASE_URL = $('#base_url').val();
    var csrf_token = $("#csrf_token").val();

        var selected_subcategory = $('#subcategory_list').val();
		var subcategory_text = $( "#subcategory_list option:selected" ).text();

	

        var url = BASE_URL + 'job/jobpost/get_service_list';
            
        
        var data = {
            selected_subcategory : selected_subcategory,
            subcategory_text:subcategory_text ,
            csrf_token_name: csrf_token
        };
        $.ajax({
          	url: url,
          	data: data,
          	type: "POST",
          
          	success: function(res) {

              
	          
                $('#detail_service').html(res);
	            // $('#service_location').trigger('change')
          	}
        });
}

function selectJobpay (){

	$("#next-job-pay").hide();
	$("#select-fixed-job").show();

}

$("#fixed-job").click(function(){
  $(".fixed-price").css("border", "solid 3px blue");
  $("#fixed-select-value").show();
  $("#fixed_value").attr("required",true);


  $(".hourly-price").css("border", "solid 2px #562b63");
  $("hourly_value").attr("required",false);
  $("#hourly-select-value").hide();
  $("#next-file-upload").show();
 

});

$("#hourly-job").click(function(){
  $(".hourly-price").css("border", "solid 3px blue");
  $("#hourly-select-value").show();
  $("#hourly_value").attr("required",true);

  $("#fixed-select-value").hide();
  $(".fixed-price").css("border", "solid 2px #562b63 ");
  $("#fixed_value").attr("required",false);

  $("#next-file-upload").show();

});

function nextfileupload() {
	$("#job-file-upload").show();
	$("#next-file-upload").hide();
	$("#job-post-btn").show();
}








</script>	






