<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<!--[if gte mso 9]><xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml><![endif]-->
<title>Sadhana India Craft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
<meta name="format-detection" content="telephone=no">
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<!--<![endif]-->
<style type="text/css">
body {
  margin: 0 !important;
  padding: 0 !important;
  -webkit-text-size-adjust: 100% !important;
  -ms-text-size-adjust: 100% !important;
  -webkit-font-smoothing: antialiased !important;
}
img {
  border: 0 !important;
  outline: none !important;
}
p {
  Margin: 0px !important;
  Padding: 0px !important;
}
table {

  border-collapse: collapse;
  mso-table-lspace: 0px;
  mso-table-rspace: 0px;
}
td, a, span {
  border-collapse: collapse;
  mso-line-height-rule: exactly;
}
th {
    padding: 10px;
}
.ExternalClass * {
  line-height: 100%;
}
.em_defaultlink a {
  color: inherit !important;
  text-decoration: none !important;
}
span.MsoHyperlink {
  mso-style-priority: 99;
  color: inherit;
}
span.MsoHyperlinkFollowed {
  mso-style-priority: 99;
  color: inherit;
}
span .im{
  color: #000;
}
 @media only screen and (min-width:481px) and (max-width:699px) {
.em_main_table {
  width: 100% !important;
}
.em_wrapper {
  width: 100% !important;
}
.em_hide {
  display: none !important;
}
.em_img {
  width: 100% !important;
  height: auto !important;
}
.em_h20 {
  height: 20px !important;
}
.em_padd {
  padding: 20px 10px !important;
}
}
@media screen and (max-width: 480px) {
.em_main_table {
  width: 100% !important;
}
.em_wrapper {
  width: 100% !important;
}
.em_hide {
  display: none !important;
}
.em_img {
  width: 100% !important;
  height: auto !important;
}
.em_h20 {
  height: 20px !important;
}
.em_padd {
  padding: 20px 10px !important;
}
.em_text1 {
  font-size: 16px !important;
  line-height: 24px !important;
}
u + .em_body .em_full_wrap {
  width: 100% !important;
  width: 100vw !important;
}
}

    .dis {
    text-decoration: line-through !important;
    color: #beb4b4;
    font-size: 15px;
}

.dis1 {
    font-size: 12px;
}
.em_main_table{
  width:700px;
  border: 1px solid;
  margin-top: 50px;
}
</style>
</head>

<body class="em_body" style="margin:0px; padding:0px;" bgcolor="#efefef" >

<?php if(empty(!$orderdetails)){ ?>  
<table class="em_full_wrap" valign="top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">
  <tbody>
    <tr>
    <td valign="top" align="center">
      <table class="em_main_table"  width="700" cellspacing="0" cellpadding="0" border="0" align="center">
        <!--Header section-->
        <tbody>
          <tr>
            <td style="padding:15px;" class="em_padd" valign="top" bgcolor="#fff" align="center">
              <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                  <tr>
                    <td style="font-family:'Open Sans', Arial, sans-serif; font-size:12px; line-height:15px; color:#b10808; font-size: 15px;    font-weight: bold;" 
                    valign="top" align="center">
                        <img src="<?= base_url()?>assets/web/img/logo-1.png" style="width: 190px;height: 52px;"><br>
                          
                        <th style="background-color: #fff;font-weight: normal;" >3nd Floor, sadhand Chambers,Acollege road,<br> Nashik – 422009.


                        <!-- C-16- NICE, Satpur Industrial Area,
                        Nashik<br>422007, Maharashtra,INDIA<br><strong> Customer Care :</strong>+91-9595101984 -->
                      </th>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        <!--//Header section--> 
        <!--Banner section-->
    
        <tr>
          <td style="padding:10px 35px 10px;" class="em_padd" valign="top" 
          bgcolor="#f9f7f7" align="center">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
              <tbody> <tr>      
      <th>Order id :#<?= $orderdetails->id ?> </th>
      <th>Payment id : <?= $orderdetails->txn_id ?></th>
      <th>Date :<?= date('d-m-Y',strtotime($orderdetails->order_date)) ?></th>
    </tr>
</tbody>
</table>
</td>
</tr>

<td style="padding:20px 40px 20px;" class="em_padd" valign="top" bgcolor="#fff" align="center">
  <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody>
      <tr>
        <td style="font-family:'Open Sans', Arial, sans-serif; font-size:14px; line-height:20px; color:#000;word-wrap: break-word;" valign="top" align="left" >
          <strong>Shipping Address</strong>

            <p><strong>Name:</strong>  <?= $orderdetails->ship_name ?></p>
          <p><strong>Address:</strong> <?= $orderdetails->ship_address ?>,<?= $orderdetails->ship_pin ?>,<?= $orderdetails->ship_city ?>,<?= $orderdetails->ship_state ?>,India</p>
      <p><strong>Email :</strong> <?= $orderdetails->ship_email ?></p>
    <p><strong>Mobile :</strong> <?= $orderdetails->ship_mob ?></p></td>

  <td style="font-family:'Open Sans', Arial, sans-serif; font-size:14px; line-height:20px;padding: 0px 20px; border-left: 1px solid black; color:#000; word-wrap: break-word; " valign="top" align="left">
   <strong>Billing Address</strong>

     <p><strong>Name :</strong> <?= $orderdetails->bill_name ?></p>
     <p><strong>Address :</strong><?= $orderdetails->bill_address ?>,<?= $orderdetails->bill_pin ?>,<?= $orderdetails->bill_city ?>,<?= $orderdetails->bill_state ?>,<?= $orderdetails->bill_country ?></p>
     <p><strong>Email :</strong> <?= $orderdetails->bill_email ?></p>
     <p><strong>Mobile :</strong><?= $orderdetails->bill_mob ?></p>
    </td>
   </tr>
  </tbody>
 </table>
</td>
    <!--//Content Text Section--> 
        <!--Footer Section-->
        <tr>
          <td style="padding:0px 0px;" class="em_padd" valign="top" 
          bgcolor="#fff" align="center">
          <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
        <tr style="padding:35px 70px 30px; border-bottom: 0.5px solid #d2d0d0;
    border-top: 0.5px solid #d2d0d0;" class="em_padd" valign="top" 
          bgcolor="#f9f7f7"> 
          <th>Name</th>
            <th>Quantity</th>
              <th>Price</th>
                <th>Amount</th>
                </tr>

 <?php  $total_amount=0; foreach($product_list as $val) { ?>
                 <tr> 
          <th style="font-weight: normal;"><?= $val->product_name ?></th>
            <th style="font-weight: normal;"><?= $val->product_qty ?></th>
            <?php if($val->discount) {   $dicountedprice=$val->price-($val->price * $val->discount / 100); ?>
            <td><?=  number_format($dicountedprice, 2,'.', '') ?> <span class="dis"> <?= $val->price ?> </span><span class="dis1"> (<?= $val->discount ?>%) </span></td>
          <?php }else{ ?>

            <th style="font-weight: normal;"><?=  number_format($val->price, 2,'.', '') ?></th>
          <?php } ?>
           
                <th style="font-weight: normal;"><?=  number_format($val->total_price, 2,'.', '') ?></th>
                </tr>

<?php $total_amount+=$val->total_price; } ?>

                 <tr style="padding:35px 70px 30px; border-bottom: 0.5px solid #d2d0d0;
    border-top: 0.5px solid #d2d0d0;" class="em_padd"
                 valign="top" bgcolor="#f9f7f7"> 
          <th></th>
            <th></th>
              <th>Total amount</th>
                <th style="font-weight: normal;"><?=  number_format($total_amount, 2,'.', '') ?></th>
                </tr>


                 <tr style="padding:35px 70px 30px;" class="em_padd" 
                 valign="top" bgcolor="#f9f7f7"> 
          <th>Payment status</th>
            <th style="font-weight: normal;"><?= $orderdetails->payment_status ?></th>
              <th>Shipping</th>
             
              <?php $shipingcharges=$orderdetails->shipping_charge; ?>
                <th style="font-weight: normal;">+<?=  number_format($shipingcharges, 2,'.', '') ?></th>
               
                </tr>


                <tr style="padding:35px 70px 30px;" class="em_padd" 
                valign="top" bgcolor="#f9f7f7"> 
          <th>Paid Amount</th>
            <th style="font-weight: normal;"><?= number_format($orderdetails->payed_amount, 2,'.', '') ?></th>
              <th>Final Total</th>
                <th style="font-weight: normal;"><?=  number_format($total_amount+$shipingcharges, 2,'.', '') ?></th>
                </tr>


            </tbody>
          </table>
        </td>
      </tr>
</tbody>
</table>
</td> 
</tr>
</tbody>
</table>
<?php }else { ?>
   <div class="empty-cart">
  
  <div class="container">
  
   
   <h4><b><b></h4>
     
      <h3>No Details to View</h3>

     
  </div>
</div>





<?php } ?>





</body>
</html>