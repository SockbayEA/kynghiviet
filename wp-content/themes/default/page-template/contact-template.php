<?php

/* 
 * Template Name: Contact Template
 */

get_header();
?>

<div class="container contact_page">
    <div class="row">
        
        <div class="col-md-9 content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            
            <h2 class="single-title"><span><?php the_title(); ?></span></h2>

            <div class="entry_content">
                
                <ul class="infos">
                    <li><strong><?php echo ot_get_option('cty_name'); ?></strong></li>
                    <li><strong><i class="fa fa-map-marker"></i> Địa chỉ</strong>: <span><?php echo ot_get_option('fl_address') ?></span></li>
                    <li><strong><i class="fa fa-phone"></i> Điện thoại</strong>: <span class="hotline"><a href="tel:<?php echo ot_get_option('fl_phone') ?>"><?php echo ot_get_option('fl_phone') ?></a></span></li>
                    <li><strong><i class="fa fa-envelope"></i> Email</strong>: <span><a href="mailto:<?php echo ot_get_option('fl_email') ?>"><?php echo ot_get_option('fl_email') ?></a></span></li>
                    <li><strong><i class="fa fa-share"></i> Website</strong>: <span><a target="_blank" href="<?php echo ot_get_option('fl_website') ?>"><?php echo ot_get_option('fl_website') ?></a></span></li>
                </ul>
                
                <div class="ggmap">
                    <?php echo get_field('page_ggmap', get_the_ID(), false); ?>
                </div>
                
                <div class="contact_form qcol">
                    <?php echo do_shortcode('[contact-form-7 id="252" title="Form liên hệ"]'); ?>
                </div>
                
            </div>

          
            <?php endwhile; endif; ?>
            
        </div>
        
        <div class="col-md-3 sidebar_col">
            <?php get_sidebar(); ?>
        </div>
        
    </div>
    
</div>

<?php get_footer(); ?>

