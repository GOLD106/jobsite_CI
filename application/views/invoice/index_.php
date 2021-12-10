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
<style>
   
</style>   
<div class="container">
    <div class="card" style = "">
        <div class="card-body">
            <div id="invoice">
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="">
                                <div class=""> 
                                        <img src="assets/img/invoice/logo-new.jpg" width = "100" alt="">                               
                                        <div class = "unique-code" style = "color :black">
                                            <div> <span style = "padding-right:88px;">Seller Unique code:</span> <?= $invoice_list[0]['seller_code'] ?> </div>
                                            <div> <span>Service Unique code:</span> <?= $invoice_list[0]['service_code'] ?> </div>
                                            <div> <span style = "padding-right:74px;">Buyer Unique code:</span> <?= $invoice_list[0]['buyer_code'] ?> </div>
                                            <div> <span style = "padding-right:74px;">Category Unique code:</span> <?= $invoice_list[0]['category_code'] ?> </div>
                                        </div>
								</div>
                                <div class="col ">
                                   

                                    <div class = "invoice-num">
                                        <div>
                                            <span style = "padding-right:65px;">INVOICE #</span>  56856
                                        </div> 
                                        <div>
                                            <span style = "padding-right:55px;">DATE </span>  <?= $invoice_list[0]['created_date'] ?>
                                        </div>  
                                        <div>
                                        <span style = "padding-right:10px;">DUE DATE</span>  <?= $invoice_list[0]['created_date'] ?>
                                        </div>         
                                    </div>

                                    <div class="billing-to-info">
                                         <div>
                                            <span style = "padding-right:55px; font-size:25px; ">BILLING TO </span>  <?= $invoice_list[0]['first_name']?>   <?= $datalist[0]['last_name'] ?>
                                        </div> 
                                       

                                    </div>
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
                                        <td class="unit"><?= $service['service_amount'] ?> 	&#163;</td>
                                        <td class="qty"><?= $service['qty'] ?></td>
                                        <td class="total"><?= $sub_total ?>	&#163;</td>
                                    </tr>

                                    <?php $sno +=1; $total += $sub_total; } ?>
                                    
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2" ><span> SUBTOTAL </span></td>
                                        <td><?= $total ?> &#163;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Commission Fee</td>
                                        <td><?=$invoice_list[0]['commission']*100 ?>%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"> Transaction Fee </td>
                                        <td><?= $invoice_list[0]['transaction_fee'] * $total  ?> &#163;</td>
                                    </tr>
                                    <?php $sum_total = $total*(1-$invoice_list[0]['commission']-$invoice_list[0]['transaction_fee']);  ?>
                                    <tr class = "total-price-value">
                                        <td colspan="3" >
                                            <span>
                                            Thank you for your business 
                                            </span>
                                            <img src="assets/img/invoice/sign_image.jpg" width="120" alt="">
                                               
                                        </td>
                                        <td colspan="1"> TOTAL:</td>
                                        <td><?=$sum_total ?>  &#163;</td>
                                    </tr>
                                </tfoot>
                            </table>
                                   
                                                
                        </main>
                        <footer>
                            <div class = "payment-info">
                                <div class = "pay-info">
                                    <h2>Payment Info</h2>
                                    <span>Sort Code :7368420</span>
                                    <span>SWIFT :7368420</span>
                                    <span>PAYPAL :7368420</span>
                                </div>
                                <div class = "terms-info">
                                    <h2>TERMS&CONDITIONS&NOTES </h2>
                                    <ul>
                                        <li>Tazzergroup is an on Demand Marketplace for products and services of all kinds</li>
                                        <li>Our invoice are paid immediatetly actor special agreements are in place </li>
                                        <li>No cash payment accepts</li>
                                    </ul>
                                </div>

                            </div>
                            <div class = "group-info">
                                <h3 style = "text-align:center"> ---  TAZZER GROUP ----</h3>
                                <div class = "group-contact-info">
                                    <div style = "padding-top: 20px;padding-left:20px;"> 
                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="assets/img/invoice/placeholder.jpg" alt="" width = "30">
                                            </div>
                                        
                                            <div class = "address-text">
                                                <span>Address:</span>
                                                south Yorksin 2002
                                            </div>
                                        </div>

                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="assets/img/invoice/telephone.jpg" alt="" width = "30">
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
                                            <img src="assets/img/invoice/email.jpg" alt="" width = "27">
                                            </div>
                                        
                                            <div class = "address-text">
                                                <span>Email Id:</span>
                                                info@tazzergroup.com
                                            </div>
                                        </div>

                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="assets/img/invoice/worldwide.jpg" alt="" width = "25">
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
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>


