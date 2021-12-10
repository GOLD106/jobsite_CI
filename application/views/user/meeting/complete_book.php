<div class="breadcrumb-bar meeting_banner">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="meeting-title">
					<h2> Book a meeting </h2>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="meeting">
            <div class = "meeting-confirm-img">
                <img src="/assets/img/meeting/confirm_redirect.png" alt="">

            </div>
            <div class = "book-confirm-title">
                <h2>Booking Confirmed</h2>
                <span>And invitation has been emailed to you</span>
            </div>
            <div class = "redirect-message">
                 <span>Redirect in 2 seconds</span>       
            </div>

        </div>
    </div> 
</div>       


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meeting/meeting.css">

<script>
    $(document).ready(function(){
      setTimeout(function() {
       var BASE_URL = $('#base_url').val(); 
       var url = BASE_URL + 'career/meeting';  
       window.location.href = url;
      }, 3000);
    });
</script>