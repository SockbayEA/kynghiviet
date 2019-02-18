<?php
/*
* Template Name:Page Landing page
*/ get_header(); // This fxn gets the header.php file and renders it ?>
<style type="text/css">
  i.fa.fa-angle-right {
    position: absolute;
    right: 0;
    top: 50%;
    font-size: 28px;
}
i.fa.fa-angle-left {
    position: absolute;
    left: 0;
    top: 50%;
    font-size: 28px;
}
</style>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
  <h2 class="page-title"><?php the_title(); ?></h2>
</div>
<div class="ld_box1 padding">
  <div class="container">
    <h3 class="wtitle"><a href="#">Tại sao chọn chúng tôi</a></h3>
    <p class="land_sub w80"><?php the_field('why'); ?></p>
    <div class="price_box">
      <?php $pr = get_field('why_ct'); ?>
      <div class="row">
        <?php foreach ($pr as $key => $prv) { ?>
        <div class="col-md-4 col-sm-4">
          <div class="fr_list">
            <div class="thumb">
              <img src="<?php echo  $prv['icon']['url']; ?>" alt = "<?php echo  $prv['icon']['title'] ?>">
            </div>
            <h3 class="pd_title"><?php echo  $prv['title'] ?></h3>
            <div class="why_ct">
              <?php echo $prv['body_text'];?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="ld_box2 padding">
  <div class="container">
    <h3 class="wtitle"><a href="#">Khách hàng</a></h3>
    <div class="price_box">
      <?php $pr2 = get_field('khach_hang'); ?>
      <div class="row">
        <?php foreach ($pr2 as $key => $prv2) { ?>
        <div class="col-md-2 col-sm-4">
          <div class="kh_box">
            <div class="thumb">
              <img src="<?php echo  $prv2['sizes']['thumbnail']; ?>" alt = "<?php echo  $prv2['title'] ?>">
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <a href="<?php the_field('group_link'); ?>"><button class="read">Xem thêm</button></a>
  </div>
</div>
<div class="ld_box3 padding">
  <div class="container">
    <h3 class="wtitle"><a href="#">Cảm nhận</a></h3>
    <div class="price_box">
      <?php $pr3 = get_field('cam_nhan'); ?>
      <div class="owl-carousel cn-owl">
        <?php foreach ($pr3 as $key => $prv3) { ?>
        <div class="item">
          <div class="cn_box">
            <div class="thumb">
              <img src="<?php echo  $prv3['image']['url']; ?>" alt = "<?php echo  $prv3['image']['title'] ?>">
            </div>
            <h3 class="pd_title"><?php echo  $prv3['name'] ?></h3>
            <div class="nx">
              <?php echo $prv3['content'];?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <a href="<?php the_field('care_link'); ?>"><button class="read">Xem thêm</button></a>
  </div>
</div>

<div class="ld_box4 padding">
  <div class="container">
    <h3 class="wtitle"><span>Tour gợi ý</span></h3>
    <p class="land_sub w80"><?php the_field('tour_des'); ?></p>
    <?php $tour_select = get_field('tour_select'); ?>
    <div class="price_box">
      <?php query_posts(array('post_type'=>'tour','posts_per_page'=>6,'tax_query'=>array(array('taxonomy'=>'tour_cat','field'=>'term_id','terms'=>$tour_select)))); ?>
      <?php if (have_posts()):while (have_posts()):the_post(); ?>
        <?php include 'template/row_tour.php' ;?>
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?>
    </div>
    <div class="clearfix"></div>
    <a href="<?php the_field('tour_link'); ?>"><button class="read">Xem thêm</button></a>
  </div>
</div>
<div class="have_quest">
	<div class="container">
			<div class="box_quest">
				<h3 class="have_ask">Liên hệ</h3>
				<div class="col_quest">
					<?php echo do_shortcode('[contact-form-7 id="392" title="Question"]'); ?>
				</div>
			</div>
	</div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
jQuery(document).ready(function($) {
  $('.cn-owl').owlCarousel({loop:true,margin:25,nav:true,autoplay:true,autoplayTimeout:3000,autoplayHoverPause:true,
  responsive:{0:{items:1},480:{items:2},1000:{items:3,nav:true}}
  });
  $(".owl-prev").html('<i class="fa fa-angle-left"></i>');
  $(".owl-next").html('<i class="fa fa-angle-right"></i>');

   $('.date-choose').datepicker({ dateFormat:'dd/mm/yy'});
});
</script>