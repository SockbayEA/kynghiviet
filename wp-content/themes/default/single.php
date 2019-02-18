<?php get_header(); // This fxn gets the header.php file and renders it ?>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
</div>
<div class="container">
    <div class="row">
        
        <div class="single-posts content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            
            <h2 class="single-title"><span><?php the_title(); ?></span></h2>
            <?php $date = get_the_date(); ?>
            <?php $postcat = get_the_category( $post->ID ); ?>
            <div class="date"> <i class="fa fa-calendar"></i> <?php echo $date; ?> | <i class="fa fa-user-circle"></i> <?php the_author(); ?> | <i class="fa fa-folder"></i> <?php  echo esc_html( $postcat[0]->name );?></div>
            <?php echo do_shortcode("[social_share_button]"); ?>
            <div class="entry_content">
                <?php the_content(); ?>
            </div>
            <div class="related_box">
                <h3 class="box-title text-left"><span>Bài viết liên quan</span></h3>
                <div class="related_posts media_posts posts row">
                    <?php
                    $tax_query = array();
                    if(is_tax()){
                    $tax_query = array(
                    array(
                    'taxonomy' => 'toa_nha',
                    )
                    );
                    }
                    query_posts(array(
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 4,
                    ));
                    
                    ?>
                    <?php if(have_posts()):while(have_posts()):the_post(); ?>
                        <?php include 'template/new-post.php'; ?>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>
            
            
            <?php endwhile; endif; ?>
            
        </div>
        
    </div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>