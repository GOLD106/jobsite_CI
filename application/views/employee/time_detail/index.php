<?php
$services_count = countServices();

?>

<style type="text/css">

@media (max-width: 768px) {
  .project-title {
    width: 30% !important;
  }
  .attachment {
    padding-top: 25%;
  }
  .over-card {
    margin-top: -15%;
    width: 86%;
  }
  .blog-block-item {
    font-size: 15px
  }
  .mobile-font {
    font-size: 15px
  }
}
.project-title {
  border-radius: 10px; 
  width: 10%; 
  text-align: center; 
  background-color: #6d2c7733 
}
.edit-btn {
  border: 0;
  background-color: white;
  font-size: 18px;
  font-weight: 500;
  display: block;
  margin: auto;
  color: #6c2c78;
  padding: 10px 50px;
  border-radius: 15px;
  text-align: center;
  border-color: #6c2c78;
  border: solid 1px #6c2c78;
}
</style>

<!-- Location Section -->
<section class="location-section section">
  <!-- <div class="location-block row">
      <div class="block-left col-xl-6 col-lg-6 col-md-6 col-sm-12" style="flex: 100%; max-width: 100% !important">
        <div class="location-map" id="our-location"></div>
      </div>
  </div> -->
  <div class="container">
    <div class="card blog-block-item">
      <div style="display: flex">
        <div style="width: 50%; text-align: left; padding: 1%">
          <h3>Shift Date</h3>
        </div>
        <div style="width: 50%; text-align: right; padding: 1%">
          <h3><?php echo $lists[0]['work_date']?></h3>
        </div>
      </div>
    </div>
    <div style="display: flex; justify-content: center">
      <div class="card blog-block-item" style="width: 50%; padding: 0%; border-radius: 15px;">
        <div style="border-bottom: solid 2px #cccccc; text-align: center; padding-bottom: 2%; padding-top:2%;">
          <h3 class="mobile-font" style="color: #8f8f8f">Clock In</h3>
        </div>
        <div style="border-bottom: solid 2px #cccccc;; text-align: center; padding: 2%">
          <h3 id="clocked_in" class="mobile-font"><?php echo $lists[0]['clocked_in']?></h3>
          <input id="clocked_in_edit" style="display: none" value="<?php echo $lists[0]['clocked_out']?>"/>
        </div>
        <div style="text-align: center; padding: 2%; display: flex; justify-content: center; align-items: center">
          <i class="fa fa-map-marker fa-2x" style="padding-right: 3%" aria-hidden="true"></i>
          <h3 class="mobile-font">Clokced in at : <?php echo $lists[0]['location']?></h3>
        </div>
      </div>
      <div style="padding: 5%"></div>
      <div class="card blog-block-item" style="width: 50%; padding: 0%; border-radius: 15px;">
        <div style="border-bottom: solid 2px #cccccc;; border-bottom: solid 2px #cccccc; text-align: center; padding-bottom: 2%; padding-top:2%;">
          <h3 class="mobile-font" style="color: #8f8f8f">Clock Out</h3>
        </div>
        <div style="border-bottom: solid 2px #cccccc; text-align: center; padding: 2%">
          <h3 id="clocked_out" class="mobile-font"><?php echo $lists[0]['clocked_out']?></h3>
          <input id="clocked_out_edit" style="display: none" value="<?php echo $lists[0]['clocked_out']?>"/>
        </div>
        <div style="text-align: center; padding: 2%; display: flex; justify-content: center; align-items: center">
          <i class="fa fa-map-marker fa-2x" style="padding-right: 3%" aria-hidden="true"></i>
          <h3 class="mobile-font">Clokced in at : <?php echo $lists[0]['location']?></h3>
        </div>
      </div>
    </div>
    <div class="card blog-block-item" style="padding: 2%">
      <div style="display: flex; justify-content: space-between">
        <div style="text-align: left;">
          <h3>Total hours</h3>
        </div>
        <div class="project-title"> <?php echo $lists[0]['job_title']?> </div>
        <div><?php echo $lists[0]['work_hour']?></div>
      </div>
    </div>
    <div class="attachment">
      <div class="card blog-block-item" style="padding: 3%">
        <div style="padding-top: 3%; display: -webkit-box;">
          <i class="fa fa-edit" aria-hidden="true"></i>
          <p style="color: #8f8f8f; padding-left: 0.5%"> Add a note </p>
        </div>
        <textarea value="<?php echo $lists[0]['note']?>" style="padding-left: 1%; border-color: #cccccc; border-radius: 15px; padding-top: 3%; background-color: #f0f0f06e; outline: none" placeholder="add a note" >
          <?php echo $lists[0]['note']?>
        </textarea>
        <div style="padding-top: 3%; display: flex">
          <!-- <button onclick="detailEdit()" class="edit-btn" style="border-radius: 25px;">
          <i class="fa fa-edit"></i>
            Edit
          </button> -->
          <button onclick="location.href='time-clock'" class="login-btn btn" style="border-radius: 25px;">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            Confirm
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // function detailEdit()
  // {
  //   $('#clocked_out_edit').attr('style', 'display: inline');
  //   $('#clocked_out').attr('style', 'display: none');
  //   $('#clocked_in_edit').attr('style', 'display: inline');
  //   $('#clocked_in').attr('style', 'display: none');
  //   $("#clocked_out_edit").on("change paste keyup", function() {
  //     console.log($(this).val(), '---here')
  //   });
  //   $("#clocked_in_edit").on("change paste keyup", function() {
  //     console.log($(this).val(), '---here')
  //   });
  // }
</script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/tazzergroup/home.css?v1.13">
<script src="<?=base_url()?>assets/js/tazzergroup/home.js?v1.09"></script>