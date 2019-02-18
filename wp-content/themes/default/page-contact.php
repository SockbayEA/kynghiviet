<?php
/*
* Template Name:Liên hệ
 */ get_header(); // This fxn gets the header.php file and renders it ?>
<div class="image_h">
    <?php $image_h = get_field('image'); ?>
    <?php if($image_h){ ?>
    <img src=" <?php echo $image_h ;?>">
    <?php } else { ?>
    <img src="<?php echo home_url();?>/wp-content/uploads/2018/10/head.jpg">
    <?php } ?>
    <h2 class="page-title">Liên hệ</h2>
</div>
<div class="page_contact"> 
    <div class="container">
        <div class="row">
            <div class="col-md-5 content_col">
                <ul class="infos">
                <li><strong><?php echo ot_get_option('cty_name'); ?></strong></li>
                <li>
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div class="info_ct">
                     <strong>Địa chỉ</strong> <br> <span><?php echo ot_get_option('fl_address') ?></span>
                    </div>
                 </li>
                 <li>
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div class="info_ct">
                     <strong>Điện thoại</strong> : <span><?php echo ot_get_option('fl_phone') ?></span> <br>
                     <strong>Hotline</strong> : <span><?php echo ot_get_option('fl_hotline') ?></span>
                    </div>
                 </li>
                 <li>
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div class="info_ct">
                     <strong>Email</strong> <br> <span><?php echo ot_get_option('fl_email') ?></span>
                    </div>
                 </li>
                </ul>
            </div>
            <div class="col-md-7 ctf_col">
                
                <?php echo do_shortcode('[contact-form-7 id="395" title="Contact form 1_copy"]'); ?>
            </div>
        </div>    
    </div>
</div>
<style>
    .image_h img{
  width: 100% !important;
}
</style>
<div class="maps">
    <?php the_field('page_ggmap'); ?>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>