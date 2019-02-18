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
              <div class="osb1 hidden-md">
                <?php $price_nomal = get_field('price');
                  $price_sale = get_field('sale_price');

                ?>
                <?php if (($price_sale)&&($price_nomal!=$price_sale)){ ?>
                  <h3 class="head_box">Khuyến mãi</h3>
                <?php } ?>
               
                <div class="box_in">
                  <p class="time">Độ dài tour : <span><?php the_field('time'); ?> Ngày</span></p>
                  
                   <?php $pid = get_the_ID(); ?>
                   <?php if (($price_sale)&&($price_nomal!=$price_sale)){ ?>
                     <p>Giá gốc : <span><del><?php echo fl_price_format($price_nomal);?> VNĐ</del></span></p>
                     <p>Giá khuyến mãi : <span> <?php echo fl_price_format($price_sale); ?> VNĐ</span></p>
                     <p>Tiết kiệm : <span><?php echo fl_price_format($price_nomal - $price_sale); ?> VNĐ</span> <span class="star-right"><?php the_field('star') ?></span></p>
                    <?php }elseif(!empty($price_nomal)) { ?>
                      <p>Giá : <span><?php echo fl_price_format($price_nomal);?> VNĐ</span></p>
                    <?php } else { ?>
                      <p><span>Liên hệ</span></p>
                    <?php } ?>
                  
                  
                  <hr>
                  <p class="intext"><?php the_field('content'); ?></p>
                  <p><a href="<?php echo home_url();?>/dat-tour/?pid=<?php echo $pid;?>"><button class="select_time">Chọn ngày</button></a></p> <!-- #select_day -->
                  <p><a href="<?php echo home_url();?>/cau-hoi/?pid=<?php the_ID();?>" class="comments"><button class="btn-ask">Đặt câu hỏi</button></a></a></p>
                </div>
              </div>
            <div class="sec2">
                <h3 class="sg_tour_text">Dịch vụ</h3>
                <div class="service_sg">
                    <?php the_field('service'); ?>
                </div>
            </div>
            <!-- <div class="sec3">
              <h3 class="sg_tour_text">Lịch trình</h3>
                <div class="ltr2">
                  <?php $ltrinh = get_field('ltrinh');?>
                  <div class="panel-group" id="accordion">
                  <?php $i=0; foreach ($ltrinh as $key => $value) { $i++;?>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
                            <?php echo $value['ngay']; ?> <span> </span></a>
                          </h4>
                        </div>
                        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1){echo 'in';} else { echo ''; } ?>">
                          <div class="panel-body"><?php echo $value['lt_time']; ?></div>
                        </div>
                      </div>
                  <?php } ;?>
                  </div>                 
                </div>
            </div> -->
            <div class="sec3">
              <h3 class="sg_tour_text">Lịch trình</h3>
                <div class="ltr2">
                  <?php $ltrinh = get_field('ltrinh');?>
                  <ul class="ngay">
                      <?php $i=0; foreach ($ltrinh as $key => $value) { $i++;?>
                        <li class="<?php if($i == 1)echo 'ac' ?>"><div class="n_title"><?php echo $value['ngay']; ?></div>
                          <ul class="nd_ngay">
                            <li>
                              <?php echo $value['lt_time']; ?>
                            </li>
                          </ul>
                        </li>
                      <?php } ;?>
                  </ul>                 
                </div>
            </div>
            <script type="text/javascript">

            </script>
            <div class="sec4">
              <h3 class="sg_tour_text">Lịch khởi hành</h3>
                <div class="khoihanh_sg">
                    <?php the_field('lich_khoi_hanh'); ?>
                </div>
                <p><a href="<?php echo home_url();?>/dat-tour/?pid=<?php the_id();?>"><button class="select_time">Chọn ngày</button></a></p>
            </div>
            <div class="sec4">
              <h3 class="sg_tour_text">Ghi chú</h3>
                <div class="ghi_chu">
                    <?php the_field('ghi_chu'); ?>
                </div>
            </div>
            <div class="sec4">
              <h3 class="sg_tour_text">Nhận xét</h3>
              <div class="comment">
                  <?php if ( comments_open() || '0' != get_comments_number() ) { comments_template();} ?>
              </div>
            </div>               
        </div>
        
        <div class="col-md-4 sg_sidebar">
          <div class="osb1 hidden-xs">
            <?php $price_nomal = get_field('price');
              $price_sale = get_field('sale_price');

            ?>
            <?php if (($price_sale)&&($price_nomal!=$price_sale)){ ?>
              <h3 class="head_box">Khuyến mãi</h3>
            <?php } ?>
           
            <div class="box_in">
              <p class="time">Độ dài tour : <span><?php the_field('time'); ?> Ngày</span></p>
              
               <?php $pid = get_the_ID(); ?>
               <?php if (($price_sale)&&($price_nomal!=$price_sale)){ ?>
                 <p>Giá gốc : <span><del><?php echo fl_price_format($price_nomal);?> VNĐ</del></span></p>
                 <p>Giá khuyến mãi : <span> <?php echo fl_price_format($price_sale); ?> VNĐ</span></p>
                 <p>Tiết kiệm : <span><?php echo fl_price_format($price_nomal - $price_sale); ?> VNĐ</span> <span class="star-right"><?php the_field('star') ?></span></p>
                 <?php }elseif(!empty($price_nomal)) { ?>
                      <p>Giá : <span><?php echo fl_price_format($price_nomal);?> VNĐ</span></p>
                    <?php } else { ?>
                      <p><span>Liên hệ</span></p>
                    <?php } ?>
              
              
              <hr>
              <p class="intext"><?php the_field('content'); ?></p>
              <p><a href="<?php echo home_url();?>/dat-tour/?pid=<?php echo $pid;?>"><button class="select_time">Chọn ngày</button></a></p> <!-- #select_day -->
              <p><a href="<?php echo home_url();?>/cau-hoi/?pid=<?php the_ID();?>" class="comments"><button class="btn-ask">Đặt câu hỏi</button></a></p>
            </div>
          </div>
          <hr>
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
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
    font-size: 16px;
}

.accordion.active, .accordion:hover {
    background-color: #f93;
}
.panel {
  /*  border: 1px solid #f93!important;*/
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 0;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    margin-top: 15px;
}
.panel-default>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #f93!important;
        border: 1px solid #f93;
    margin-top: 15px;
}
.panel-group .panel{border-radius: 0;}

.panel-default>.panel-heading {
    color: #fff;
    background-color: #fac51f;
    border: none!important;
}
.panel-title{font-size: 14px;}
.panel-default>.panel-heading+.panel-collapse>.panel-body {
    white-space: pre-wrap;
}
button.accordion:before {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: left;
    margin-right: 15px;
}
#accordion .panel .panel-heading .panel-title a span {
    line-height: 12px;
    float: left;
    width: 30px;
}
#accordion .panel .panel-heading .panel-title a span:after {
    font-family: "FontAwesome";
    content: "\f068";
    display: inline-block;
    color: #fff;
}
#accordion .panel .panel-heading .panel-title a.collapsed span:after {
   font-family: "FontAwesome";
    content: "\f067";
    display: inline-block;
    color: #fff;
}
button.accordion.active:before {
    content: "\2212";
    color:#fff;
}
@media screen and (max-width: 768px) {
  .owl-prev,.owl-next{top:30%;}
}
</style>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<script src='<?php echo get_template_directory_uri();?>/js/jquery.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/css/jquery.fancybox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/js/jquery.fancybox.min.js"></script>
<script src='<?php echo get_template_directory_uri();?>/js/owl-carousel2thumb.js'></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
   $(".comments").fancybox();
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