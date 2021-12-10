<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/datatables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cropper.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/avatar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owlcarousel/owl.theme.default.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/common.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/invoice.css">  

        <script src="<?php echo $base_url; ?>assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Invoice</title>
    </head>
<body>
<div class="container">
    <div class="card" style = "">
        <div class="card-body">
            <div id="invoice">
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>                                   
                                                                    
                            <div class = "unique-code" style = "">
                                <div> <span style = "padding-right:88px;">Seller Unique code:</span> <?= $invoice_list[0]['seller_code'] ?> </div>
                                <div> <span>Service Unique code:</span> <?= $invoice_list[0]['service_code'] ?> </div>
                                <div> <span style = "padding-right:74px;">Buyer Unique code:</span> <?= $invoice_list[0]['buyer_code'] ?> </div>
                                <div> <span style = "padding-right:23px;">Category Unique code:</span> <?= $invoice_list[0]['category_code'] ?> </div>
                            </div>				                            
                                   

                            <div class = "invoice-num">
                                <div>
                                    <span style = "padding-right:59px;">INVOICE #</span>  56856
                                </div> 
                                <div>
                                    <span style = "padding-right:55px;">DATE </span>  <?= $invoice_list[0]['created_date'] ?>
                                </div>  
                                <div>
                                <span style = "padding-right:10px;">DUE DATE</span>  <?= $invoice_list[0]['created_date'] ?>
                                </div>         
                            </div>

                            <div class="billing-to-info">
                                <div class = "billing-to-text">
                                    <span style = "padding-right:55px; font-size:25px; ">BILLING TO : </span> 
                                    <?= $invoice_list[0]['first_name']?>   <?= $invoice_list[0]['last_name'] ?>
                                    
                                </div>
                                <div class = "billing-to-address-info">                                    
                                    <?= $invoice_list[0]['address'] ?>
                                </div> 
                                

                            </div>                               
                            
                        </header>
                        <main>
                            
                            <table >
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th class="text-left">Service Name</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Qty</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody style = "background:white;">
                                    <?php 
                                    $sno = 1; 
                                    $total = 0;
                                    foreach($invoice_list as $service)
                                     {  
                                         $sub_total = $service['service_amount']*$service['qty'];
                                         ?>
                                    <tr>
                                        <td class="no"><?= $sno ?></td>
                                        <td class="text-left">
                                            <?= $service['service_title'] ?>
                                        </td>
                                        <td class="unit">&#163;<?= $service['service_amount'] ?> 	</td>
                                        <td class="qty"><?= $service['qty'] ?></td>
                                        <td class="total">&#163;<?= $sub_total ?>	</td>
                                    </tr>

                                    <?php $sno +=1; $total += $sub_total; } ?>
                                    
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2" ><span> SUBTOTAL </span></td>
                                        <td>&#163;<?= $total ?> </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Commission Fee</td>
                                        <td><?=$invoice_list[0]['commission']*100 ?>%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"> Transaction Fee </td>
                                        <td>&#163;<?= $invoice_list[0]['transaction_fee'] * $total  ?> </td>
                                    </tr>
                                    <?php $sum_total = $total*(1-$invoice_list[0]['commission']-$invoice_list[0]['transaction_fee']);  ?>
                                    <tr class = "total-price-value">
                                        <td colspan="3" >
                                          
                                               
                                        </td>
                                        <td colspan="1"> TOTAL:</td>
                                        <td>&#163; <?=$sum_total ?></td>
                                    </tr>
                                </tfoot>
                            </table>  
                            <div class = "sign_part">
                                <span>Thank you for your business</span>
                                <div class = "sign_image_part">
                                    <img src="assets/img/invoice/sign_image.jpg" width="80" alt="" style = "border-bottom:1px solid grey; display: block;">
                                    <img src="assets/img/invoice/auth_sign.jpg" width="80" alt="">
                                </div>
                                
                            </div>                                
                                                
                        </main>
                                     
                    </div>
                        
                    
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
        <footer>
            <div class = "payment-info">
                <div class = "pay-info">
                    <h2>Payment Info</h2>
                    <span>A/C No.    :  7368420</span>
                    <span>Sort Code  :  20-04-50</span>
                    <span>SWIFT      :  7368420</span>
                    <span>PAYPAL     :  tazzerclean@gmail.com</span>
                </div>
                <div class = "terms-info">
                    <h2>TERMS&CONDITIONS&NOTES </h2>
                    <ul>
                        <li>Tazzergroup is an on Demand Marketplace for products and services</li>
                        <li>Our invoice are paid immediatetly actor special agreements are in place </li>
                        <li>No cash payment accepts</li>
                    </ul>
                </div>

            </div>
            <div class = "group-info">
                <h3 style = "text-align:center"> TAZZER GROUP </h3>
                <div class = "group-contact-info">
                    <div style = "padding-top: 20px;padding-left:20px;"> 
                        <div class = "address-info">
                            <div class = "address-image">
                                <img src="assets/img/invoice/placeholder.png" alt="" width = "25">
                            </div>
                        
                            <div class = "address-text">
                                <span>Address:</span>
                                south Yorksin 2002
                            </div>
                        </div>

                        <div class = "address-info" style = "margin-left:40px;">
                            <div class = "address-image">
                                <img src="assets/img/invoice/telephone.png" alt="" width = "25">
                            </div>
                        
                            <div class = "address-text">
                                <span>Phone:</span>
                                (+44)07961242587
                            </div>
                        </div>
                    </div>
                    <div style = "padding-top: 20px;padding-left:20px;"> 
                        <div class = "address-info">
                            <div class = "address-image">
                                <img src="assets/img/invoice/email.png" alt="" width = "25">
                            </div>
                        
                            <div class = "address-text">
                                <span>Email Id:</span>
                                info@tazzergroup.com
                            </div>
                        </div>

                        <div class = "address-info" style = "margin-left:20px;">
                            <div class = "address-image">
                                <img src="assets/img/invoice/worldwide.png" alt="" width = "25">
                            </div>
                        
                            <div class = "address-text">
                                <span>Website:</span>
                                www.tazzergroup.com
                            </div>
                        </div>
                    </div> 
                    
                    <div class= "thankyou-image">
                        <img src="assets/img/invoice/thank-you.jpg" alt="" width = "100">
                    </div>               
                    
                    
                    
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>


