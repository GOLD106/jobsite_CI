<style>
 .subscription-container {
	 display: flex;
	 justify-content: space-between;
	 width: 100%;
}
.subscription {
	width: 100%;
	background: #fff;
	border-radius: 10px;
	padding: 20px;
	display: table;
	box-shadow: 0 0 7px 0 #a3a3a3;
}
.container {
	padding-top: 5%;
}
.plan-time {
	top: 1082px;
	left: 258px;
	width: 680px;
	height: 94px;
	background: #F8FAF5 0% 0% no-repeat padding-box;
	box-shadow: 0px 3px 6px #BEBDBD29;
	border-radius: 12px;
	opacity: 1;
	display: flex;
	margin-top: 5%;
	padding-left: 3%;
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
.img-background{
	width: 65px
}
.cover-img {
	margin-left: -10%;
	width: 55px;
	height: 55px;
	padding-top: 2%;
	margin-top: 2.5%;
}
.percent {
	align-items: center;
	width: 150px;
	height: 94px;
	background: #F8FAF5 0% 0% no-repeat padding-box;
	box-shadow: 0px 3px 6px #BEBDBD29;
	border-radius: 12px;
	opacity: 1;
	display: flex;
	margin-top: 5%;
	padding: 4%;
	justify-content: center;
}
.content-text {
	padding: 6%;
	display: flex;
	align-items: center;
}
.commission {
	text-align: center; 
	color: white; 
	padding-top: 10%
}
/* ---- reponsive --------- */

@media (max-width: 768px) {
	.row {
		/* padding-top: 50% !important; */
	}
	.subscription {
		display: block;
		padding: 0;
		padding-top: 3%;
	}
	.letter {
		padding: 0;
		padding-top: 5%;
	}
	.cover-img {
		margin-left: -22%;
    height: 55px;
    padding-top: 2%;
    margin-top: 6.5%;
	}
	.subscription-container {
		display: block;
	}
	.content-text {
		display: block;
		text-align: center;
	}
	.commission {
		padding-top: 50%;
	}
}
</style>

<section class="hero-section" style="position: sticky">
	<div class="layer">
		<div class="commission-banner"></div>	
		<div class="Rectangle-banner"></div>

		<div class="container">
				<div class="row">          
						<div class="col-lg-9 con commission">
							<h1>Commission</h1>
						</div>
				</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="subscription">
		<div style="text-align:center; padding:3%">
			<h2> Tazzer Group Subscribe Plan </h2>
			<p class="letter">Where people sell or buy more through site the AI should direct it to apply discount to then starting from 0.1% on every 10K sells or purchase however the lowest they could go is 7%</p>
		</div>
		<div class="subscription-container">
			<div style="padding: 2%">
			<?php 
					if(!empty($lists)) {
			?>
				<div style="display: flex;">
					<div class="plan-time"> 
						<img src="<?php echo $base_url . 'assets/img/commission/Rectangle 931.svg'?>" class="img-background" alt="" />
						<img src="<?php echo $base_url . 'assets/img/commission/buyer.png'?>" class="cover-img" alt="" />
						<span class="content-text"><h3 >User ~ (buyer)</h3> <h4 style="padding-top:0.5%"> &nbsp; - will pay commission for all purchases</h4></span>
					</div>
					<div style="padding:3%"></div>
					<div class="percent"><h3> <?php echo $lists[0]["commission"] ?> </h3></div>
				</div>
				<div style="display: flex">
					<div class="plan-time"> 
						<img src="<?php echo $base_url . 'assets/img/commission/Rectangle 931.svg'?>" class="img-background" alt="" />
						<img src="<?php echo $base_url . 'assets/img/commission/agent.png'?>" class="cover-img" alt="" />
						<span class="content-text"><h3 >Seller</h3> <h4 style="padding-top:0.5%"> &nbsp; - will pay commission</h4></span>
					</div>
					<div style="padding:3%"></div>
					<div class="percent"><h3><?php echo $lists[1]["commission"] ?></div>
				</div>
				<div style="display: flex">
					<div class="plan-time"> 
						<img src="<?php echo $base_url . 'assets/img/commission/Rectangle 931.svg'?>" class="img-background" alt="" />
						<img src="<?php echo $base_url . 'assets/img/commission/seller.png'?>" class="cover-img" alt="" />
						<span class="content-text"><h3 >Sellers</h3> <h4 style="padding-top:0.5%"> &nbsp - on basic and free subscription will pay commission</h4></span>
					</div>
					<div style="padding:3%"></div>
					<div class="percent"><h3><?php echo $lists[2]["commission"] ?></div>
				</div>
				<div style="display: flex">
					<div class="plan-time"> 
						<img src="<?php echo $base_url . 'assets/img/commission/Rectangle 931.svg'?>" class="img-background" alt="" />
						<img src="<?php echo $base_url . 'assets/img/commission/buying.png'?>" class="cover-img" alt="" />
						<span class="content-text"><h3 >Buyers</h3> <h4 style="padding-top:0.5%"> &nbsp - on basic and free subscription will pay commission</h4></span>
					</div>
					<div style="padding:3%"></div>
					<div class="percent"><h3><?php echo $lists[3]["commission"] ?></div>
				</div>
			</div>
			<div>
				<img src="<?php echo $base_url . 'assets/img/commission/wavy-tech.png'?>" style="width: 100%; height: 500px;" alt="" />
			</div>
			<?php 
					}
			?>
		</div>
	</div>
</div>
<link rel="stylesheet" href="<?=base_url()?>assets/css/<?=TEMPLATE_THEME?>/style.css">