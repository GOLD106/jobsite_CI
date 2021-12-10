<style>

.transaction {
	width: 100%;
	background: #fff;
	border-radius: 10px;
	padding: 20px;
	display: table;
	box-shadow: 0 0 7px 0 #a3a3a3;
	margin:auto;
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
.gifts-card {
	background-image: url("../assets/img/gifts/shopping-cards.png");
	width: 436px;
	height: 222px;
	box-shadow: 0px 3px 6px #00000029;
	border-radius: 22px;
	opacity: 0.52;
}
.gifts-card-cover {
	background-image: url("../assets/img/gifts/shopping-cards-cover.svg");
	
	width: 436px;
	height: 222px;
	box-shadow: 0px 3px 6px #00000029;
	border-radius: 22px;
	opacity: 0.52;
}
.gifts-cards {
	display: flex; 
	justify-content: center; 
	align-items: flex-end; 
	position: relative
}
.card-letter {
	position: absolute; 
	z-index:999; color: 
	white; 
	font-size: 30px
}
.gifts-header {
	text-align: center; 
	color: white; 
	padding-top: 10%
}
.gifts-content {
	display: flex;
	justify-content: center;
}
.card-cover-img {
	z-index:999; 
	opacity:0.52; 
	height: 252px;
	margin-bottom: -3%
}
.card-img {
	position: absolute; 
	opacity: 1; 
	width: 95%; 
	height: 232px;
	border-radius: 8%
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
	.gifts-header {
		padding-top: 50%;
	}
	.gifts-content {
		display: table
	}
	.gifts-cards > img {
		width: 100%
	}
	.card-cover-img {
    height: 220px;
    margin-bottom: -6%;
	}
	.card-img {
		position: absolute;
    opacity: 1;
    height: 180px;
    border-radius: 8%;
		width: 95% !important;
	}
	.card-letter {
		font-size: 26px;
	}
}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="gifts-points-banner"></div>
				<div class="Rectangle-banner"></div>

        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con gifts-header">
                  <h1>Gifts and Points</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="transaction">
		<div style="text-align:center; padding-top: 3%">
			<h2> Tazzer Group Shopping Gifts and points </h2>
		</div>
			<div class="service-container">
				<img style="width: 75%" src="<?php echo base_url().'assets/img/gifts/gifts-points.png'?>" alt="" />
			
			</div>
			<div class="gifts-content">
				<div class="gifts-cards"> 

					<?php 
						if(!empty($lists[0])) {
					?>
						<img class="card-cover-img" src="<?php echo base_url().'assets/img/gifts/shopping-carts-cover.svg' ?>" alt=""/>
						<img class="card-img" src="<?php echo base_url().$lists[0]['img'] ?>" alt=""/>
						<div class="card-letter" >
							<p><?php echo $lists[0]['title'] ?></p>
						</div>
					<?php } ?>
					<?php 
						if(empty($lists[0])) {
					?>
						<img style="z-index:999; opacity:0.52" src="<?php echo base_url().'assets/img/gifts/shopping-carts-cover.svg' ?>" alt=""/>
						<img style="position: absolute; opacity: 1" src="<?php echo base_url().'assets/img/gifts/shopping-cards.png' ?>" alt=""/>
						<div class="card-letter" >
							<p>Shopping Cards</p>
						</div>
					<?php } ?>
				</div>
				<div class="gifts-cards">
					<?php if(!empty($lists[1])) { ?>
						<img class="card-cover-img"  src="<?php echo base_url().'assets/img/gifts/holidays-cover.svg' ?>" alt=""/>
						<img class="card-img"  src="<?php echo base_url().$lists[1]['img'] ?>" alt=""/>
						<div class="card-letter" >
							<p><?php echo $lists[1]['title'] ?></p>
						</div>
					<?php } ?>
					<?php 
						if(empty($lists[1])) {
					?>
						<img style="z-index:999; opacity:0.52" src="<?php echo base_url().'assets/img/gifts/holidays-cover.svg' ?>" alt=""/>
						<img style="position: absolute; opacity: 1" src="<?php echo base_url().'assets/img/gifts/holidays.png' ?>" alt=""/>
						<div class="card-letter" ><p>Holidays</p></div>
					<?php } ?>
				</div>
				<div class="gifts-cards">
					<?php if(!empty($lists[2])) { ?>
						<img class="card-cover-img"  src="<?php echo base_url().'assets/img/gifts/restaurant-cover.svg' ?>" alt=""/>
						<img class="card-img"  src="<?php echo base_url().$lists[2]['img'] ?>" alt=""/>
						<div class="card-letter" >
							<p><?php echo $lists[2]['title'] ?></p>
						</div>
					<?php } ?>
					<?php 
						if(empty($lists[2])) {
					?>
						<img style="z-index:999; opacity:0.52" src="<?php echo base_url().'assets/img/gifts/restaurant-cover.svg' ?>" alt=""/>
						<img style="position: absolute; opacity: 1" src="<?php echo base_url().'assets/img/gifts/restaurants.png' ?>" alt=""/>
						<div class="card-letter" ><p>Restaurants</p></div>
					<?php } ?>
				</div>
			</div>
			<div class="gifts-content">
				<div class="gifts-cards"> 
					<?php if(!empty($lists[3])) { ?>
						<img class="card-cover-img"  src="<?php echo base_url().'assets/img/gifts/entertainment-cover.svg' ?>" alt=""/>
						<img class="card-img"  src="<?php echo base_url().$lists[3]['img'] ?>" alt=""/>
						<div class="card-letter" >
							<p><?php echo $lists[3]['title'] ?></p>
						</div>
					<?php } ?>
					<?php 
						if(empty($lists[3])) {
					?>
						<img style="z-index:999; opacity:0.52" src="<?php echo base_url().'assets/img/gifts/entertainment-cover.svg' ?>" alt=""/>
						<img style="position: absolute; opacity: 1" src="<?php echo base_url().'assets/img/gifts/entertainments.png' ?>" alt=""/>
						<div class="card-letter" ><p>Entertainment</p></div>
					<?php } ?>
				</div>
				<div class="gifts-cards">
					<?php if(!empty($lists[4])) { ?>
						<img class="card-cover-img"  src="<?php echo base_url().'assets/img/gifts/health-beauty-cover.svg' ?>" alt=""/>
						<img class="card-img"  src="<?php echo base_url().$lists[4]['img'] ?>" alt=""/>
						<div class="card-letter" >
							<p><?php echo $lists[4]['title'] ?></p>
						</div>
					<?php } ?> 
					<?php 
						if(empty($lists[4])) {
					?>
						<img style="z-index:999; opacity:0.52" src="<?php echo base_url().'assets/img/gifts/health-beauty-cover.svg' ?>" alt=""/>
						<img style="position: absolute; opacity: 1" src="<?php echo base_url().'assets/img/gifts/health-beauty.png' ?>" alt=""/>
						<div class="card-letter" ><p>Spa or health and beauty</p></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
