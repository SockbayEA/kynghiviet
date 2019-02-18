<?php
/**
*   Template Name: Home Page Template
*
*/
get_header();
?>
<div class="home_slider">
    <?php include 'template/slider.php'; ?>
</div>
<!--end box-->
<div class="section1 padding">
    <div class="container">
        <div class="row">
            <h3 class="wtitle"><span>Tour tốt nhất</span></h3>
            <h4 class="sub_wtitle">Hè rực rỡ 5 châu</h4>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="pagebox featured_box">
    <div class="container">
        <?php query_posts(array('post_type' => 'tour', 'posts_per_page' => 6,'meta_query'=>array(array('key'=>'noibat')))) ?>
        <div class="row">
            <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <div class="col-sm-4">
                <div class="tour_box">
                    <a href="<?php the_permalink(); ?>"><div class="over"></div></a>
                    <div class="thumb">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbmd', array('class' => 'img-responsive')); ?></a>
                    </div>
                    <div class="tour_h">
                            <div class="viewbox">
                                 <?php $price_nomal = get_field('price');$price_sale = get_field('sale_price');?>
                                 <?php if(empty($price_nomal)&&empty($price_sale)){ ?>
                                    <p class="h_price">Liên hệ</p>
                                 <?php } else { ?>
                                <p class="h_price">Giá : <?php echo fl_price_format(get_field('price')); ?> VNĐ</p>
                                <?php } ?>
                                <h3 class="h_title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="h_day">
                                    <p class="h_time"><i class="fa fa-calendar"></i> <?php the_field('time'); ?> Ngày</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php  endwhile; endif; wp_reset_query(); ?>
        </div>
    </div>
</div>
<div class="section2 padding">
    <div class="container">
        <div class="s2_p">MUA TUA SỚM <br><span> ƯU ĐÃI LỚN</span></div>
        <p>Giảm giá ngay sau khi mua sớm và mua theo nhóm</p>
        <a href="<?php the_field('mts_link');?>"><button class="readmore"><?php the_field('mts');?></button></a>
    </div>
</div>
<div class="section3 padding">
    <div class="container">
        <?php $terms = get_terms([
        'taxonomy' =>'tour_cat',
        'parent'=>2,
        'hide_empty' => false,
        ]); ?>
        <h3 class="wtitle"><span>Điểm đến hot nhất</span></h3>
        <h4 class="sub_wtitle">Hè rực rỡ 5 châu</h4>
        <div class="row">
            <?php foreach ($terms as $key => $terms_v) { ?>
            <div class="col-md-3 col-sm-3 add_tour">
                <?php $tid =  $terms_v->term_id; ?>
                <div class="thumb1">
                    <a href="<?php echo get_term_link($tid,'tour_cat'); ?>"><img src="<?php the_field('tax_image','tour_cat_'.$tid); ?>"></a>
                </div>
                <a href="<?php echo get_term_link($tid,'tour_cat'); ?>"><h3 class="add_title"><?php echo  $terms_v->name; ?></h3></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="section4 padding">
    <div class="container">
        <h3 class="wtitle">Cảm nhận</h3>
        <div class="row">
            <?php $nx= get_field('nhan_xet'); ?>
            <div class="owl-carousel owl-nx">
                <?php foreach ($nx as $key => $nxv) { ?>
                <div class="item">
                    <div class="thumb">
                        <img src="<?php echo $nxv['image'];?>">
                    </div>
                    <h3 class="nx_title"><?php echo $nxv['title'];?></h3>
                    <p class="nx_position"><?php echo $nxv['position'];?></p>
                    <div class="excrept w60">
                        <?php echo $nxv['content'];?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="section5">
    <div class="container">
        <div class="lienhe_text">
            <h3 class="sc_text">Liên hệ ngay với kỳ nghỉ việt để được tư vấn du lịch chính xác nhất</h3>
            <a href="<?php echo home_url();?>/lien-he"><button class="lh_knv">Liên hệ</button></a>
        </div>
    </div>
</div>
<?php    get_footer(); // This fxn gets the footer.php file and renders it ?>
<style type="text/css">
.owl-prev {
position: absolute;
font-size: 50px;
top: 50%;
left: 0;
}
.owl-next{
position: absolute;
font-size: 50px;
top: 50%;
right: 0;
}
</style>
<script type="text/javascript">
jQuery(document).ready(function($){
$('.owl-nx').owlCarousel({loop:true,margin:15,nav:true,autoplay:true,autoplayTimeout:2000, autoplayHoverPause:true,items:1});
$(".owl-prev").html('<i class="fa fa-angle-left"></i>');
$(".owl-next").html('<i class="fa fa-angle-right"></i>');
});
</script>