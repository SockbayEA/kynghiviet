<?php
/*
* Template Name:Page Thanh Toán
*/ get_header(); // This fxn gets the header.php file and renders it ?>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
</div>
<div class="page_payment">
  <div class="container">
    <div class="pm">
      <h2 class="pm_title">SECURE CHECKOUT</h2>
      <p class="sub_pm">Checkout safely with our payment methods.</p>
      <div class="step col-md-5 col-md-offset-7">
        <ul class="ul_step">
          <li><span>1</span> Deal selected</li>
          <li><span>2</span> Addition options</li>
          <li><span>3</span> checkout</li>
        </ul>
      </div>
      <div class="box_info">
        <div class="row">
          <div class="col-md-6 order-col">
            <h4>1.PURCHASER DETAILS *</h4>
            <div class="step1">
              <label>First Name*</label>
              <input type="text" name="firstname">
            </div>
            <div class="step1">
              <label>Last Name*</label>
              <input type="text" name="lastname">
            </div>
            <p class="order"><label>Email</label>
            <input type="text" name="email"></p>
            <p class="order"><label>Phone</label>
            <input type="text" name="email"></p>
            <div class="step1">
              <label>Độ dài tour*</label>
              <input type="text" name="lastname">
            </div>
            <div class="step1">
              <label>Điểm đến*</label>
              <input type="text" name="lastname">
            </div>
            <div class="step1">
              <label>Loại tour*</label>
              <input type="text" name="lastname">
            </div>
            <div class="step1">
             <label>Giá*</label>
              <input type="text" name="lastname">
            </div>
            <p class="order"><label>Hoạt động đi kèm</label>
            <input type="text" name=""></p>
          </div>
          <div class="col-md-3 order-col">
            <h4>2.Payment*</h4>
          </div>
          <div class="col-md-3 order-col">
            <h4>3.Review your oder*</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>