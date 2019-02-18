<?php
/*
* Template Name:Page Cảm ơn
*/ get_header(); // This fxn gets the header.php file and renders it ?>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
</div>
<div class="page_about">
<div class="container">
    <div class="row">
        
        <div class="col-md-12 content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            
            <h2 class="single-title"><span><?php the_title(); ?> bạn</span></h2>
            <p class="sub_titles">Để đặt chỗ với chúng tôi </p>
            <p class="icon"><i class="fa fa-check"></i></p>
            <div class="entry_content">
                <?php the_content(); ?>
                
            </div>
            <a href=""><button class="btn-home">Tiếp tục đến trang chủ</button></a>
            <?php endwhile; endif; ?>
            
        </div>
    </div>
</div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>