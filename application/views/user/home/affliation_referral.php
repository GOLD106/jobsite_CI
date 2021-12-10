<style>

.transaction {
	width: 100%;
	background: #fff;
	border-radius: 10px;
	padding: 20px;
	display: table;
	box-shadow: 0 0 7px 0 #a3a3a3;
}
.container {
	padding-top: 5%;
	color: #442828;
}
.letter {
	font: normal normal normal 16px/27px Poppins;
	letter-spacing: 0px;
	color: #2A2A2A;
	opacity: 1;
	padding-left: 20%;
	padding-right: 20%;
	padding-top: 2%;
}
.service-container {
	text-align: center;
	padding: 3%;
	padding-left: 10%;
	padding-right: 10%;
	font-size: 15px;
}
.affliation-card {
	border-radius: 15px;
	background-color: #6D2C77;
	border: 1px solid #707070;
	display: flex;
	color: white;
	padding: 2%;
	align-items: center;
	width: 25%;
	font-size: 18px; 
	margin-left: -10px
}
.round-box1 {
	background-color: white;
	border-radius: 50%;
	width: 50p;
	width: 80px;
	height: 80px;
	text-align: right;
	margin-top: 1%;
	position: absolute;
	padding-top: 2%;
	color: #6D2C77;
	padding-right: 1%;
	font-weight: bold;
	z-index: 999;
	margin-left: -65%;
}
.round-box2 {
	background-color: white;
	border-radius: 50%;
	width: 50p;
	width: 80px;
	position: absolute;
	height: 80px;
	text-align: right;
	margin-top: 1%;
	margin-left: -22%;
	padding-top: 2%;
	color: #6D2C77;
	padding-right: 1%;
	font-weight: bold;
}
.round-box {
	background-color: white;
	border-radius: 50%;
	width: 50p;
	width: 80px;
	position: absolute;
	height: 104px;
	text-align: right;
	color: #6D2C77;
}
.round-box3 {
	background-color: white;
	border-radius: 50%;
	width: 50p;
	width: 80px;
	position: absolute;
	height: 80px;
	text-align: right;
	margin-top: 1%;
	padding-top: 2%;
	color: #6D2C77;
	padding-right: 1%;
	font-weight: bold;
	margin-left: 20%;
}
.referral-copy {
	box-shadow: 0px 3px 12px #cfc8c829;
	border: 1px solid #F9F9F9;
	border-radius: 50px;
	opacity: 1;
	outline: none;
	width: 35%;
	padding: 2%;
	color: #562B63;
	display: inline-flex;
	justify-content: space-around;
	align-items: center;
}
.affiliation {
	text-align: center; 
	color: white; 
	padding-top: 10%
}
.affliation-content {
	display: flex; 
	width: 100%; 
	justify-content: center
}
.together {
	color: #562B63; 
	width: 30%; 
	display: inline-flex
}
@media (max-width: 768px) {
	.transaction {
		display: block;
		padding: 0;
		padding-top: 3%;
	}

	.service-container {
		display: block;
	}
	.affiliation {
		padding-top: 50%;
	}
	.service-button {
		width: 100%;
		padding: 3% !important
	}
	.affliation-content {
		display: block;
		padding-top: 5%;
	}
	.round-box1 {
		display: none
	}
	.round-box2 {
		display: none
	}
	.round-box3 {
		display: none
	}
	.round-box {
		display: none
	}
	.affliation-card {
		width: 100%;
	}
	.referral-copy {
		width: 100%
	}
	.together {
		width: 100%;
	}
}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="referral-banner"></div>
				<div class="Rectangle-banner"></div>

        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con affiliation">
                  <h1>Affiliations and Referral program</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="transaction">
		<div style="text-align:center; padding-top: 3%">
			<h2> Affiliations and Referral program </h2>
		</div>
		<div class="service-container">
			<div class="affliation-content">
				<div class="round-box1">
					<h3>01</h3>
				</div>
				<div class="affliation-card">
					<img src="<?php echo base_url().'assets/img/affliation-referral/globe.png'?>" alt="" />
					<p style="margin-top: 8%; width: 100%;">Comparison Site</p>
				</div>
				<div style="padding:30px"></div>
				<div class="round-box2">
					<h3>02</h3>
				</div>
				<div class="affliation-card">
					<img src="<?php echo base_url().'assets/img/affliation-referral/user.png'?>" alt="" />
					<p style="margin-top: 8%; width: 100%;">Individual</p>
				</div>
				<div class="round-box3">
					<h3>03</h3>
				</div>
				<div style="padding:30px"></div>
				<div class="affliation-card">
					<img src="<?php echo base_url().'assets/img/affliation-referral/office-building.png'?>" alt="" />
					<p style="margin-top: 8%; width: 100%;">Companies</p>
				</div>
			</div>
			<img style="width: 70%;" src="<?php echo base_url().'assets/img/affliation-referral/referral.png'?>" alt="" />
			<div class="together">
				<h2>Together, We're Going further!</h2>
			</div>
			<div style="display: flex; justify-content: center; padding-top: 3%">
				<div class="round-box" style=" margin-left: -22%;"></div>
				<div class="affliation-card">
					<p style="color: white; margin-top: 8%; width: 100%;">Commission 2 to 7%</p>
				</div>
				<div class="round-box" style="margin-left: 20%"></div>
			</div>
			<p style="color: #787878; padding-top: 3%">Share your code with your friends and get bouns point</p>

			<div class="referral-copy">
				<p style="color: #787878; font-size: 16px; height: 7px">Your referral code &nbsp;&nbsp;&nbsp;</p>
				<?php 
						foreach($lists as $data) {
				?>
				<input type="text" style="color: #562B63; border: none; outline: none; width: 23%" id="myInput" value="<?php echo $data['share_code']?>"></input>
				<?php } ?>
				<button style="background-color: #562B63; border-radius: 36px; color: white; width: 30%; height: 40px" onclick="myFunction()">Copy</button>
			</div>
		</div>
	</div>
</div>

<script>
	function myFunction() {
		/* Get the text field */
		var copyText = document.getElementById("myInput");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /* For mobile devices */

		/* Copy the text inside the text field */
		navigator.clipboard.writeText(copyText.value);
		
		/* Alert the copied text */
		// alert("Copied the text: " + copyText.value);
	}
</script>
