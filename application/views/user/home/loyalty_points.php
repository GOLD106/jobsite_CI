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
.round-box {
	background-color: #6D2C77;
	border-radius: 5%;
	border: solid;
	border-radius: 50%;
	width: 65px;
	height: 65px;
	color: white;
	text-align: center;
	align-items: center;
	padding: 2%;
}
.loyalty-card {
	width: 100%;
	height: 50px;
	box-shadow: 0px 3px 15px #00000029;
	border-radius: 7px;
	opacity: 1;
	margin-left: -7%;
}
.loyalty-card-second {
	width: 100%;
	height: 50px;
	box-shadow: 0px 3px 15px #00000029;
	border-radius: 7px;
	opacity: 1;
	margin-right: -7%;
}
.left-text {
	padding:3%; 
	padding-left: 9%; 
	text-align: left;
	color: #5E5C5E;
}
.right-text {
	padding:3%; 
	padding-right: 9%; 
	text-align: left;
	color: #5E5C5E;
}
.loyal-box {
	display: flex; 
	align-items: center;
}
.loyalty-header {
	text-align: center; 
	color: white; 
	padding-top: 10%
}
.loyal-section {
	padding: 5% 23%;
}
@media (max-w  idth: 768px) {
	.transaction {
		display: block;
		padding: 0;
		padding-top: 3%;
	}

	.service-container {
		display: block;
		padding-left: 0;
		padding-right: 0;
		padding: 3%;
	}
	.loyalty-header {
		padding-top: 50%;
	}
	.service-button {
		width: 100%;
		padding: 3% !important
	}
	.loyal-section {
		padding: 0;
		padding-top: 5%;
	}
	.left-text {
		padding: 0;
		padding-left: 9%;
		align-items: center;
	}
	.right-text {
		padding-top: 0;
	}
}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="loyalty-points-banner"></div>
				<div class="Rectangle-banner"></div>

        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con loyalty-header">
                  <h1>Loyalty Points</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="transaction">
		<div style="text-align:center; padding-top: 3%">
			<h2> Tazzer Group Loyalty Points </h2>
		</div>
			<div class="service-container">
				<img style="width: 70%" src="<?php echo base_url().'assets/img/loyalty/loyalty-points.png'?>" alt="" />
				<h2>Best Sellers Loyalty Discount Programmes</h2>
				<div class="loyal-section">
					<div class="loyal-box">
						<div class="round-box">
							<h2>01</h2>
						</div>
						<div class="loyalty-card">
							<h3 class="left-text">
								<?php if(!empty($lists[0])) {?>
									<?php echo $lists[0]['discount_programmes']?> 
								<?php 
									} 
									else {
										printf('T-Priority for 1 month, 3 months, 6, 9 and 12 months');
									}
								?></h3>
						</div>
					</div>
					<div style="display: flex; align-items: center; padding-top: 3%">
						<div class="loyalty-card-second">
							<h3 class="right-text">
								<?php if(!empty($lists[1])) {?>
									<?php echo $lists[1]['discount_programmes']?>
								<?php 
									}
									else {
										printf('Discount on subscription');
									}
								?>
							</h3>
						</div>
						<div class="round-box">
							<h2>02</h2>
						</div>
					</div>
					<div class="loyal-box">
						<div class="round-box">
							<h2>03</h2>
						</div>
						<div class="loyalty-card">
							<h3 class="left-text">
								<?php if(!empty($lists[2])) {?>
									<?php echo $lists[2]['discount_programmes']?>
								<?php 
									}
									else {
										printf('Free services');
									}
								?>	
							</h3>
						</div>
					</div>
					<div style="display: flex; align-items: center;; padding-top: 3%">
						<div class="loyalty-card-second">
							<h3 class="right-text">
								<?php if(!empty($lists[3])) {?>
									<?php echo $lists[3]['discount_programmes']?>
								<?php 
										}
										else {
											printf('Send gift and thank you cards');
										}
								?>
							</h3>
						</div>
						<div class="round-box">
							<h2>04</h2>
						</div>
					</div>
					<div class="loyal-box">
						<div class="round-box">
							<h2>05</h2>
						</div>
						<div class="loyalty-card">
							<h3 class="left-text">
								<?php if(!empty($lists[4])) {?>
									<?php echo $lists[4]['discount_programmes']?>
								<?php 
									}
									else {
										printf('Invitation for meals with the top executives');
									}
								?>
							</h3>
						</div>
					</div>
					<div style="display: flex; align-items: center;; padding-top: 3%">
						<div class="loyalty-card-second">
							<h3 class="right-text">
								<?php if(!empty($lists[5])) {?>
									<?php echo $lists[5]['discount_programmes']?>
								<?php 
									}
									else {
										printf('All will depend on their performance');
									}
								?>
							</h3>
						</div>
						<div class="round-box">
							<h2>06</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
