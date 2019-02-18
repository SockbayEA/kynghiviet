<?php get_header(); // This fxn gets the header.php file and renders it ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ;?>/css/owl.carousel.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'>
<div class="container">
    <div class="row">
        
        <div class="col-md-8 sg_tour content_col">
            <div class="sec1">
                <?php if(have_posts()):while(have_posts()):the_post(); ?>
                <h2 class="sg_title"><span><?php the_title(); ?></span></h2>
                 <?php endwhile; endif; ?>
                <p class="tour_code"><strong>Tour code</strong> : <?php the_field('tour_code'); ?> | <span><?php the_field('star'); ?></span></p>
                <div class="gallery_box">
                    <?php $gallery = get_field('gallery_tour');?>
                    <div class="owl-carousel sg_gallery">
                        <?php foreach ($gallery as $key => $gallery_v) { ?>
                        <div class="item">
                            <img data-thumb='<img src="<?php echo $gallery_v['url']; ?>"/>'  src="<?php echo $gallery_v['url']; ?>" alt="<?php echo $gallery_v['title']; ?>">
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="entry_content">
                    <?php the_content(); ?>
                    <a href ="<?php the_field('lich_trinh_tour');?>" ><i class="fa fa-file-pdf-o"></i> Tải về lịch trình </a>
                </div>
            </div>
            <div class="sec2">
                <h3 class="sg_tour_text">Dịch vụ</h3>
                <div class="service_sg">
                    <?php the_field('service'); ?>
                </div>
            </div>
            <div class="sec3">
              <h3 class="sg_tour_text">Lịch trình</h3>
                 <div class="lichtrinh_sg">
                    <?php the_field('lich_trinh'); ?>
                </div>
            </div>
            <div class="sec4">
              <h3 class="sg_tour_text">Khởi hành</h3>
                <div class="khoihanh_sg">
                    <?php the_field('lich_khoi_hanh'); ?>
                </div>
            </div>
            <div class="sec4">
              <h3 class="sg_tour_text">Ghi chú</h3>
                <div class="ghi_chu">
                    <?php the_field('ghi_chu'); ?>
                </div>
            </div>              
        </div>
        
        <div class="col-md-4 sg_sidebar">
          <div class="osb1">
            <h3 class="head_box">Loại Tour : <?php the_field('loai_tour'); ?></h3>
            <div class="box_in">
              <p class="time">Thời gian : <span><?php the_field('time'); ?> Ngày</span></p>
              <?php $price_nomal = get_field('price');
              $price_sale = get_field('sale_price');

               ?>
               <?php $pid = get_the_ID(); ?>
              <p>Giá Gốc : <span><?php if($price_sale){ ?><del><?php echo fl_price_format($price_nomal);?> VNĐ</del> <?php } else { ?><?php echo fl_price_format($price_nomal);?> VNĐ<?php } ?> </span> <br>Khuyễn mãi : <span> <?php echo fl_price_format($price_sale); ?> VNĐ</span></p>
              <hr>
              <p>Tiết kiệm : <span><?php echo fl_price_format($price_nomal - $price_sale); ?> VNĐ</span> <span class="star-right"><?php the_field('star') ?></span></p>
              <hr>
              <p class="intext"><?php the_field('content'); ?></p>
              <p><a href="<?php echo home_url();?>/dat-tour/?pid=<?php echo $pid;?>"><button class="select_time">Chọn ngày</button></a></p> <!-- #select_day -->
              <p><a href="#cmt" class="comment"><button class="btn-ask">Đặt câu hỏi</button></a></p>
            </div>
          </div>
          <hr>
          <h3 class="sb_title text-center" >Tour gợi ý</h3>
            <?php query_posts(array('post_type' => 'tour', 'posts_per_page' =>4)) ?>
                <?php if (have_posts()):while (have_posts()):the_post(); ?>
                  <div class="tour_box">
                    <div class="thumb">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbmd', array('class' => 'img-responsive')); ?></a>
                    </div>
                    <div class="tour_if">
                        <div class="col-tour">
                            <h3 class="title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="tinfo">
                                <div class="price">
                                     <p class="line1"><?php the_field('address') ?></p>
                                     <?php $price_nomal = get_field('price');$price_sale = get_field('sale_price');?>


                                    <p class="t_price"><?php if($price_sale){ ?><?php echo fl_price_format($price_sale);?><?php } else { ?><?php echo fl_price_format($price_nomal);?><?php } ?> VNĐ</p>
                                </div>
                                <div class="day">
                                    <p><?php the_field('time'); ?></p> <p class="day_text">day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  endwhile; endif; wp_reset_query(); ?>
        </div>       
    </div>
</div>
<div class="related_box">
    <div class="container">
         <h3 class="wtitle"><a href="#">Tour hot</a></h3>
            <h4 class="sub_wtitle">Hè rực rỡ 5 châu</h4>
        <div class="related_posts row">
            <?php
            $tax_query = array();
            if(is_tax()){
            $tax_query = array(
            array(
            'taxonomy' => 'tour_cat',
            )
            );
            }
            query_posts(array(
                'post_type'=>'tour',
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' =>3,
            ));
            
            ?>
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
                <?php include 'template/row_tour.php'; ?>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </div>
</div>
<div class="related_box">
    <div class="container">
         <h3 class="wtitle"><a href="#">Tour phụ</a></h3>

        <div class="alt_tour row">
          <?php $alt_id = get_field('tour_alt'); ?>
            <?php query_posts(array('post_type'=>'tour_phu','posts_per_page' =>3,'tax_query'=>array(array('taxonomy'=>'tour_phu_cat','terms'=>'term_id','terms'=>$alt_id))));?>
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
                <?php include 'template/tour_alt.php'; ?>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </div>
</div>
<div id="select_day">
        <div class="chonngay">
        <p><label>Ngày đến</label> <br>
        <input type='text' class="form-control" id='datetimepicker4' />
        </p>
      </div>
      <div class="clearfix"></div>
        <p>Điểm đến </p>
        <select name="bkt" class="goto" id="pop_bkt">
              <ul>
                <?php
                  $types_args = array(
                  'hierarchical' => 1,
                  'taxonomy' => 'tour_cat',
                  'hide_empty' => 0,
                  'parent' => 2,
                  'show_count'=> 1,

                  );
                $types = get_categories($types_args); ?>
                <li><option value=""> Điểm đến </li>
                <?php foreach($types as $type) {
                echo '<li><option value="'.$type->slug.'" >' . $type->name.'</option></li>';
                }
                ?>
              </ul>
        </select>
      <a href="<?php echo home_url();?>/dat-tour"><button class="bkt">Book Tour</button></a>
</div>
<div id="cmt">
  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="840px" data-numposts="5"></div>
</div>
<style type="text/css">
    .owl-thumbs {
      text-align: center;
      display: table;
      width: 100%;
  }

  .owl-thumb-item {
      width: 20%;
      height: auto;
      border: none;
      background: none;
      padding: 0 5px;
      outline: none;    
      opacity: .7;
      overflow: hidden;               
  }
  .owl-thumbs {
    margin-top: 15px;
}
  .owl-thumb-item img {
      width: 100%;
      height: auto;
      vertical-align: middle;
  }
  .owl-thumb-item.active {
      opacity: 1;
}
.owl-thumb-item.active img{position: relative;}
.overlay {
  width: 100%;
  height: 100%;
  display: block;
  background-color: black;
}
.owl-prev {
    position: absolute;
    top: 40%;
    width: 40px;
    height: 40px;
    background: #ccc;
    padding: 5px 15px;
    font-size: 30px;
}
.owl-next {
    position: absolute;
    top: 40%;
     width: 40px;
    height: 40px;
    background: #ccc;
    padding: 5px 15px;
    right: 0;
    font-size: 30px;
}
@media screen and (max-width: 768px) {
  .owl-prev,.owl-next{top:30%;}
}
</style>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<script src='<?php echo get_template_directory_uri();?>/js/owl-carousel2thumb.js'></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
  var owl = $('.sg_gallery');
    owl.owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        loop: true,
        items: 1,
        center: true,
        nav: true,
        thumbs: true,
        thumbImage: false,
        thumbsPrerendered: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        navText: ['<span class="prev"><i class="fa fa-angle-left"></i></span>','<span class="next"><i class="fa fa-angle-right"></i></span>'],
    });
});
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(function() {
    $('#datetimepicker4').datepicker();   
  });
});
</script>