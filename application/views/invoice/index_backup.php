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
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/invoice.css">  -->

<script src="<?php echo $base_url; ?>assets/plugins/jquery/jquery-3.6.0.min.js"></script>
<style>
    body{margin-top:20px;
    background-color: #f7f7ff;
    }
    #invoice {
        padding: 0px;
    }
    
    .invoice {
        position: relative;
        min-height: 680px;
        padding: 15px
    }
    
    .invoice header {
      
        margin-bottom: 20px;
        
    }
    
    .invoice .company-details {
        text-align: right
    }
    
    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }
    
    .invoice .contacts {
        margin-bottom: 20px
    }
    
    .invoice .invoice-to {
        text-align: left
    }
    
    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }
    
    .invoice .invoice-details {
        text-align: right
    }
    
    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #0d6efd
    }
    
    
    
    .invoice main .thanks {
        margin-top: -70px;
        font-size: 20px;
        display: inline-flex;
        background: white;
        padding-bottom: 20px;
        
    }

    .invoice main .thanks img {
        margin-left:30px;
    }
    
 
    
    .invoice main .notices .notice {
        font-size: 1.2em
    }
    
    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }
    
    .invoice table td,
    .invoice table th {
        padding: 15px;
    /*    background: #eee;  */
        border-bottom: 1px solid grey
    }
    
    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }
    
    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #0d6efd;
        font-size: 1.2em
    }
    
    .invoice table .qty,
    .invoice table .total,
    .invoice table .unit {
        text-align: right;
        font-size: 1.2em;
        width: 15%;
        
    }
    
    .invoice table .no {
        
        font-size: 1.6em;
        background: #EDEFEC;
        color: #545454;
    }
    
    .invoice table .unit {
        background: #EDEFEC;
        color: #545454;
    }
    
    .invoice table .total {
        background: #EDEFEC;
        color: #545454;
       
    }
    
    .invoice table tbody tr:last-child td {
        border: none
    }
    
    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border: none;
    }

    .invoice table tfoot td span {
        font-weight: bold;
    }
    
    .invoice table tfoot tr:first-child td {
        border-top: none
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    /*    background: url('/assets/img/invoice/invoice_background.jpg') no-repeat;     */
        background-size: cover;	
    }
    
    .invoice table tfoot tr:last-child td {
        color: #f0f1f3;
        font-size: 1.4em;
        background-color: #562B63;
    }
    
    .invoice table tfoot tr td:first-child {
        border: none;
        background: white;
        color: black;
        text-align: left;
    }
    
    .invoice footer {
        width: 100%;
        /* text-align: center; */
        color: #777;
        /* border-top: 1px solid #aaa; */
        padding: 36px 0;
       
        background: white;
    }
    
   
    
    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }

    .unique-code {
        display: block;
        text-align: right;
        margin-bottom: 10px;
        margin-top: -20px;
        color: white;
        font-size: 12px;
    }
    .invoice-num {
        text-align: right;
    }
    .billing-to-info {
        
    }

    .billing-label {
        width: 50%;
        font-size: 30px;
        font-weight: bold;
        display:inline-block;
    }

    .billing-to-info span {
        font-size: 22px;
        font-weight: 500;
    }
    .billing-detail {
        margin-left:30px;
        display: inline-block;
    }

    thead {
        background: #38C5F0;
    }    
    .sign-image  {
        border-bottom: 1px solid grey;
    }
    .payment-info {
        border: 7px solid #c2c2d6;
        background: rgb(240, 236, 236);
        padding-left: 20px;
        padding-top: 20px;
        display: inline-block;
        width: 45%;
    }

    .payment-info h2 {
        color:#562B63;
        font-size: 25px;
    }

    .pay-info span {
        display: block;
        padding-top: 20px;
        padding-left: 20px;
        color:black;
    }
    .terms-info {
        margin-top:30px;
        width:80%;
    }

    .terms-info ul {
        padding-top:30px;
    }
    .address-image {
        width: 35px;
        background: rebeccapurple;
        border-radius: 50%;
        height: 35px;
        padding-top: 7px;
        padding-left: 8px;
    }

    .address-info {
      
        padding-left:15px;
    }
    .address-text {
        padding-left: 15px;
    }
    .address-text span {
        display: block;
        font-weight: bold;
        font-size: 18px;
    }

    .group-info {
        padding-top: 20px;
        display: inline-block;
        width: 40%;
}
    }

    .group-info h3 {
        text-align: center;
        font-size: 25px;
        color: rebeccapurple;;
    }

    .group-contact-info {
        margin-top: 30px;
        margin-left: 27px;
    }
    .thankyou-image {
        text-align: center;
        margin-top: 90px;
    }
    .invoice-num {
        font-size: 16px;
        /* padding-top: 49px; */
        margin-top: 30px;
    }

    .invoice-num span {
        font-weight: bold;
        
    }

    .billing-to-info {
        margin-top:40px;
        text-align:right;
    }

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
                                            <div> <span>Seller Unique code:</span> <?= $invoice_list[0]['seller_code'] ?> </div>
                                            <div> <span>Service Unique code:</span> <?= $invoice_list[0]['service_code'] ?> </div>
                                            <div> <span>Buyer Unique code:</span> <?= $invoice_list[0]['buyer_code'] ?> </div>
                                            <div> <span>Category Unique code:</span> <?= $invoice_list[0]['category_code'] ?> </div>
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
                                        <td class="unit"><?= $service['service_amount'] ?> $</td>
                                        <td class="qty"><?= $service['qty'] ?></td>
                                        <td class="total"><?= $sub_total ?>$</td>
                                    </tr>

                                    <?php $sno +=1; $total += $sub_total; } ?>
                                    
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2" ><span> SUBTOTAL </span></td>
                                        <td><?= $total ?>$</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">DISCOUNT </td>
                                        <td><?=$invoice_list[0]['discount'] ?>%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"> TAX/VAT 25% </td>
                                        <td><?= $total * 0.2 ?> $</td>
                                    </tr>
                                    <?php $sum_total = $total*(1+0.25-$invoice_list[0]['discount']/100);  ?>
                                    <tr class = "total-price-value">
                                        <td colspan="3" >
                                            <span>
                                            Thank you for your business 
                                            </span>
                                            <img src="assets/img/invoice/sign_image.jpg" width="120" alt="">
                                                                
                                            
                                            
                                               
                                            
                                        </td>
                                        <td colspan="1"> TOTAL:</td>
                                        <td><?=$sum_total ?>$</td>
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
                                <h3> ---  TAZZER GROUP ----</h3>
                                <div class = "group-contact-info">
                                    <table width= "100%">
                                        <tr>
                                            <td class = "address-image">
                                                <img src="<?php echo base_url(); ?>assets/img/invoice/placeholder.jpg" alt="" width = "20">
                                            </td>
                                            <td>
                                                <span>Address:</span>
                                                south Yorksin 2002
                                            </td>
                                            <td class = "address-image">
                                                <img src="assets/img/invoice/telephone.jpg" alt="" width = "20">
                                            </td>
                                                
                                            <td>
                                                <span>Phone:</span>
                                                (+44)07961242587
                                            </td>
                                        </tr>
                                    </table>
                                    <div style = "padding-top: 20px;"> 
                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="<?php echo base_url(); ?>assets/img/invoice/placeholder.jpg" alt="" width = "20">
                                            </div>
                                        
                                            <div class = "address-text">
                                                <span>Address:</span>
                                                south Yorksin 2002
                                            </div>
                                        </div>

                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="assets/img/invoice/telephone.jpg" alt="" width = "20">
                                            </div>
                                        
                                            <div class = "address-text">
                                                <span>Phone:</span>
                                                (+44)07961242587
                                            </div>
                                        </div>
                                    </div>
                                    <div style = "padding-top: 20px;"> 
                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="assets/img/invoice/email.jpg" alt="" width = "20">
                                            </div>
                                        
                                            <div class = "address-text">
                                                <span>Email Id:</span>
                                                info@tazzergroup.com
                                            </div>
                                        </div>

                                        <div class = "address-info">
                                            <div class = "address-image">
                                            <img src="assets/img/invoice/worldwide.jpg" alt="" width = "20">
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


