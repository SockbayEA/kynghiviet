<?php
/*
* Template Name:Page Giới thiệu
*/ get_header(); // This fxn gets the header.php file and renders it ?>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
</div>
<div class="container">
    <div class="row">
        
        <div class="col-md-9 content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            
            <h2 class="single-title"><span><?php the_title(); ?></span></h2>
            <div class="entry_content">
                <?php the_content(); ?>
                
            </div>
            
            <?php endwhile; endif; ?>
            
        </div>        
        <div class="col-md-3 sidebar_col">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<div class="ourteam">
  <div class="container">
     <h3 class="wtitle"><a href="">Our team </a></h3>
     <div class="our_box">
       <?php $ub = get_field('ourteam') ;?>
       <div class="owl-carousel owl-team">
       <?php foreach ($ub as $key => $ubv) { ?>
        <div class="item">
            <div class="thubm">
            <img src="<?php echo $ubv['image']; ?>" alt="<?php echo $ubv['title']; ?>">
          </div>
          <h3 class="team_name"><?php echo $ubv['title']; ?></h3>
          <p class="pst"><?php echo $ubv['postition']; ?></p>
        </div>
      <?php  } ?>
    </div>
     </div>
  </div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<script type="text/javascript">

    jQuery(document).ready(function($){

    $('.owl-team').owlCarousel({loop:true,margin:15,nav:true,autoplay:true,autoplayTimeout:2000, autoplayHoverPause:true,responsive:{0:{items:1},480:{items:2},1000:{items:4,nav:true}}});

    $(".owl-prev").html('<i class="fa fa-angle-left"></i>');

    $(".owl-next").html('<i class="fa fa-angle-right"></i>');


     $('.aboutme').owlCarousel({loop:true,margin:15,nav:true,autoplay:true,autoplayTimeout:2000, autoplayHoverPause:true,items:1});

});
</script>