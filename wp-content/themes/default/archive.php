<?php get_header(); ?>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
    <h2 class="page-title1"><?php  fl_optitle($post, 'page-title'); ?></h2>
</div>
<div class="archive_box">
<div class="container">
    <div class="row">
        <div class="archive">
            <?php if (have_posts()) : ?>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php // fl_optitle($post, 'page-title'); ?>
            <?php if (is_tax()) { ?>
            <div class="tax_desc">
                <?php echo term_description(); ?>
            </div>
            <?php } ?>
            <div class="row_posts posts">
                <?php while (have_posts()) : the_post(); ?>
                <?php include 'template/new-post.php'; ?>
                <?php endwhile; ?>
            </div>
            
            <div class="paginate">
                <?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text'          => __('&larr;'),
                'next_text'          => __('&rarr;'),
                ));
                ?>
            </div>
            <?php else : ?>
            <h2 class="page-title">Không có bài viết nào</h2>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>