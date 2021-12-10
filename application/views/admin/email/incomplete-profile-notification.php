<html>
   <head></head>
   <body style="
      vertical-align: middle;
      height: auto;
      align-items: center;
      ">
      <div style="
         width: 100%;
         min-width: 768px;
         height: auto;
         font-size: 1.2rem;
         ">
         <p style="">Hi <?=$postData["name"]?>, <br></p>
         <p style="">
            You need to fully complete your profile. Please fill up all fields on your profile setting page.
         </p>
         <p><a href="<?=base_url()?>user-settings"><?=base_url()?>user-settings</a></p>
         Cheers,
         TazzerGroup
         <div style="
            height: auto;
            ">
            <table style="
               width: 100%;
               height: auto;
               ">
               <tbody style="
                  ">
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