<style>

.leads {
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
	padding: 3%;
	display: flex;
}
.buy-cards {
	width: 100%;
	height: 242px;
	box-shadow: 0px 3px 25px #00000029;
	border-radius: 23px;
	opacity: 1;
	border-right: solid 23px;
}
.round-box {
	margin-left: -6%;
	margin-top: -6%;
	width: 50px;
	height: 45px;
	border: 2px solid #6D2C77;
	color: #6D2C77;
	border-radius: 50%;
	align-items: center;
	padding-top: 12px;
}
.buy-button {
	color: white;
	background-color: #6D2C77;
	outline: none;
	border: none;
	box-shadow: 0px 3px 20px #00000029;
	border-radius: 20px;
	font-size: 16px;
	padding: 3%;
	width: 60%;
}
.leads-img {
	width: 70%; 
	margin-left: -15%;
}
.leads-header {
	text-align: center; 
	color: white; 
	padding-top: 10%
}
@media (max-width: 768px) {
	.leads {
		display: block;
		padding: 0;
		padding-top: 3%;
	}
	.leads-img {
		width: 70%;
		margin: 0;
	}
	.service-container {
		display: block;
	}
	.insertion {
		padding-top: 50%;
	}
	.service-button {
		width: 100%;
		padding: 3% !important
	}
	.leads-header {
		padding-top: 50%;
	}
}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="leads-banner"></div>
				<div class="Rectangle-banner"></div>

        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con leads-header">
                  <h1>Tazzer Group Leads Plan </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="leads">
		<div style="text-align:center; padding-top: 3%">
			<h2> Tazzer Group Leads Plan </h2>
		</div>
		<div class="service-container">
			<img class="leads-img" src="<?php echo base_url().'assets/img/Leads/leads.png'?>" alt="" />
			<div style="text-align: center; padding: 3%; width: 100%; color: #6D2C77; font-size: 18px">
				<?php 
						if(!empty($lists)) {
				?>
					<h3 style="padding: 3%; padding-bottom: 10%; color: black">Choose Our Leads Plan</h3>
					<div style="display: flex; padding-bottom: 7%">
						<div class="buy-cards">
							<div class="round-box">
								<h4 style="color: #6D2C77 ">01</h4>
							</div>
							<div style="border-bottom: solid 2px #6D2C77;"><p>One Time</p></div>
							<div style="padding-top: 10%; text-align: center">
								<p style="font-weight: bold"><?php echo $lists[0]['leads']?></p>
								<p style="color: #888282; font-size: 16px">Lead notification</p>
								<button class="buy-button" > 
									Buy
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
									</button>
							</div>
						</div>
						<div style="padding: 3%"></div>
						<div class="buy-cards">
							<div class="round-box">
								<h4 style="color: #6D2C77 ">02</h4>
							</div>
							<div style="border-bottom: solid 2px #6D2C77;"><p>One Week</p></div>
							<div style="padding-top: 10%; text-align: center">
								<p style="font-weight: bold"><?php echo $lists[1]['leads']?></p>
								<p style="color: #888282; font-size: 16px">Lead notification</p>
								<button class="buy-button" > 
									Buy 
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
									</button>
							</div>
						</div>
					</div>
					<div style="display: flex;">
						<div class="buy-cards">
							<div class="round-box">
									<h4 style="color: #6D2C77 ">03</h4>
								</div>
								<div style="border-bottom: solid 2px #6D2C77;"><p>2 Weeks</p></div>
								<div style="padding-top: 10%; text-align: center">
									<p style="font-weight: bold"><?php echo $lists[2]['leads']?></p>
									<p style="color: #888282; font-size: 16px">Lead notification</p>
									<button class="buy-button" > 
										Buy 
										<i class="fa fa-arrow-right" aria-hidden="true"></i>
										</button>
								</div>
						</div>
						<div style="padding: 3%"></div>
						<div class="buy-cards">
							<div class="round-box">
									<h4 style="color: #6D2C77 ">04</h4>
								</div>
								<div style="border-bottom: solid 2px #6D2C77;"><p>1 Month</p></div>
								<div style="padding-top: 10%; text-align: center">
									<p style="font-weight: bold"><?php echo $lists[3]['leads']?></p>
									<p style="color: #888282; font-size: 16px">Lead notification</p>
									<button class="buy-button" > 
										Buy 
										<i class="fa fa-arrow-right" aria-hidden="true"></i>
										</button>
								</div>
						</div>
					</div>
					<?php 
							}
					?>
			</div>
		</div>
	</div>
</div>
