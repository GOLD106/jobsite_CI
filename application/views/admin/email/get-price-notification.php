<html>
   <head></head>
   <body style="
      text-align: center;
      vertical-align: middle;
      height: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      ">
      <div style="
         width: 100%;
         min-width: 768px;
         height: auto;
         text-align: center;
         justify-content: center;
         vertical-align: middle;
         ">
         <div style="
            font-family: Poppins;
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 28px;
            /* identical to box height */
            text-align: center;
            text-transform: uppercase;
            color: #414141;
            height: auto;
            padding-top: 10px;
            ">
            <h3 style="font-family: Poppins;font-style: bold;font-weight: 600;font-size: 40px;line-height: 1.5;text-align: center;text-transform: uppercase;color: #1b69d4;height: auto; letter-spacing: 3px;">exclusive of all taxes: <?= $postData['currency_symbol']." ".$postData['service_amount']; ?></h3>
         </div>
         <div style="
            font-family: Poppins;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 28px;
            /* identical to box height */
            text-align: center;
            text-transform: uppercase;
            color: #414141;
            height: auto;
            ">
            <h3 style="font-family: Poppins;font-style: normal;font-weight: 500;font-size: 30px;line-height: 1.5;text-align: center;text-transform: uppercase;color: #525252;height: auto;"><?= $postData['service_title']; ?></h3>
         </div>
         <div style="
            height: auto;
            ">
            <table style="
               width: 100%;
               height: auto;
               ">
               <tbody style="
                  ">
                  <tr style="
                     ">
                     <td style="
                        ">
                        <div style="
                           /* identical to box height */
                           font-family: Poppins;
                           font-style: normal;
                           font-weight: 600;
                           font-size: 25px;
                           line-height: 58px;
                           /* identical to box height */
                           text-align: center;
                           text-transform: uppercase;
                           color: #414141;
                           height: auto;
                           ">
                           <!-- <h3 style="
                              font-family: Poppins;
                              font-style: normal;
                              font-weight: 600;
                              font-size: 25px;
                              line-height: 58px;
                              text-align: center;
                              text-transform: uppercase;
                              color: #1B69D4;
                              height: auto;
                              ">Service Images</h3> -->
                        </div>
                     </td>
                  </tr>
                  <tr style="
                     width: 100%;
                     display: flex;
                     justify-content: center;
                     ">
                     <?php
                        $serviceImages = $postData["service_images"];
                        foreach($serviceImages as $serviceImage) {
                           ?>
                     <td style="
                           width: auto;
                           display: inline-block;
                           vertical-align: middle;
                           text-align: center;
                            margin: auto;
                        ">
                        <div href="#" style="
                           text-decoration: none;
                           display: inline-block;
                           ">
                           <img src="<?=base_url().$serviceImage['service_image']?>" alt="Not Found" style="width: ;">
                           <h2 style="
                              font-family: Poppins;
                              font-style: normal;
                              font-weight: 600;
                              font-size: 16px;
                              line-height: 24px;
                              text-align: center;
                              text-transform: uppercase;
                              color: #414141;
                              "></h2>
                        </div>
                     </td>
                           <?php
                        }
                     ?>
                  </tr>
                  <tr>
                     <td>
                        <div style="
                              font-family: Poppins;
                              font-style: normal;
                              font-weight: 500;
                              font-size: 15px;
                              line-height: 1.5;
                              /* text-transform: uppercase; */
                              color: #414141;
                              height: auto;
                              text-align: left;
                              letter-spacing: 1px;
                              word-spacing: 5px;
                              display: inline-block;
                           ">
                           <div>
                              <strong style="width: 150px; display: inline-block;">Service Type:</strong> <?=$postData['service_info']["subcategory_name"]?>
                           </div>
                           <div>
                              <strong style="width: 150px; display: inline-block;">Service:</strong> <?=$postData['service_info']["service_title"]?>
                           </div>
                           <div>
                              <strong style="width: 150px; display: inline-block;">Booking Time:</strong> <?=date("j F, Y", strtotime($postData["booking_date"]))." ".date("g:i a",strtotime($postData['booking_time']));?>
                           </div>
                           <div>
                              <strong style="width: 150px; display: inline-block;">Name:</strong> <?=$postData["name"]?>
                           </div>
                           <div>
                              <strong style="width: 150px; display: inline-block;">Address:</strong> <?=$postData["address"]?>
                           </div>
                           <div>
                              <strong style="width: 150px; display: inline-block;">Phone Number:</strong> <?=$postData["phonenumber"]?>
                           </div>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td style="
                        height: auto;
                        ">
                        <div style="
                           height: auto;
                           "><a href="#" style="
                           width: 100%;
                           font-family: Poppins;
                           font-style: normal;
                           font-weight: 500;
                           font-size: 19px;
                           line-height: 28px;
                           /* identical to box height */
                           text-align: center;
                           color: #414141;
                           display: block;
                           padding-top: 30px;
                           text-decoration: none;
                           "><strong>Call Us :</strong>(+44) (0)7961242587</a></div>
                        <div style="
                           height: auto;
                           "><a href="#" style="
                           width: 100%;
                           font-family: Poppins;
                           font-style: normal;
                           font-weight: 500;
                           font-size: 19px;
                           line-height: 28px;
                           /* identical to box height */
                           text-align: center;
                           color: #414141;
                           display: block;
                           padding-top: 10px;
                           text-decoration: none;
                           "><strong>Email us :  </strong>info@<?php echo base_uri(); ?></a></div>
                        <div style="
                           height: auto;
                           "><a href="#" style="
                           width: 100%;
                           font-family: Poppins;
                           font-style: normal;
                           font-weight: 500;
                           font-size: 19px;
                           line-height: 28px;
                           /* identical to box height */
                           text-align: center;
                           color: #414141;
                           display: block;
                           padding-top: 10px;
                           text-decoration: none;
                           "><strong>Visite us : </strong> <?php echo base_url();?> </a></div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </body>
</html>