<?php get_header(); // This fxn gets the header.php file and renders it ?>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
</div>
<div class="container">
    <div class="row">
        
        <div class="col-md-12 content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            
            <h2 class="single-title"><span><?php the_title(); ?></span></h2>
            <div class="entry_content">
                <?php the_content(); ?>
                
            </div>
            
            <div class="pagebox likebox">
                <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            </div>

            
            <?php endwhile; endif; ?>
            
        </div>

        
    </div>

</div>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>