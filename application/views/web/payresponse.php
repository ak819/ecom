
<div class="container">
  <div class="pay">
  <div class="paper-container">
    <div class="paper">
      <div class="main-contents">
        <div class="success-icon">&#10004;</div>
        <div class="success-title">
          Payment Complete
        </div>
         <div class="order-details">
          <div class="order-number-label">Order ID : #<?= (isset($orderdetials->order_id) && $orderdetials->order_id)? $orderdetials->order_id : " " ?></div>
        </div>
        <div class="success-description">
          <p>Your Order Details Send on Your Email</p>
          <p><?= (isset($orderdetials->email) && $orderdetials->email)? $orderdetials->email : " " ?></p>
        </div>
       
        <div class="order-footer">Thank you!</div>
      </div>
      <div class="jagged-edge"></div>
    </div>
  </div>
</div>
<!--<div class="pay">
  <div class="paper-container">
    <div class="paper">
      <div class="main-contents">
        <div class="success-icon-wrong">&#10006;</div>
        <div class="success-title">
          Payment fail
        </div>
         <div class="order-details">
          <div class="order-number-label">Order ID : #123</div>
        </div>
        <div class="success-description">
           <p>Oops! Something went wrong.
While trying to reserve money from your account</p>


        </div>
        <div class="order-details">
          <div class="order-number-label">Order ID : 123456789</div>
        </div>

       
        <div class="order-footer">Thank you!</div>

      </div>
      <div class="jagged-edge"></div>
    </div>
  </div>
</div>-->
</div>


<!-- <div class="container">
  <div class="pay">
  <div class="paper-container">
    <div class="paper">
      <div class="main-contents">
        <div class="failed-icon">&#10006;</div>
        <div class="success-title">
          Payment Failed
        </div>
        <div class="success-description">
          <p>Oops! Something went wrong.
While trying to reserve money from your account</p>
        </div>
        <div class="order-details">
          <div class="order-number-label">Order ID : 123456789</div>
        </div>
        <div class="order-footer">Thank you!</div>
      </div>
      <div class="jagged-edge"></div>
    </div>
  </div>
</div>
</div> -->