<?php get_header(); ?>
<div class="head_page"  style="background-image:url(<?php echo get_template_directory_uri();?>/images/diemden.jpg);">
     <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php  fl_optitle($post, 'page-title'); ?>

</div>
<div class="container">
    <div class="row">
        <div class="tax_tour col-md-8 ">
            <?php if (have_posts()) : ?>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php // fl_optitle($post, 'page-title'); ?>
            <?php if (is_tax()) { ?>
            <div class="tax_desc">
                <?php echo term_description(); ?>
            </div>
            <?php } ?>
            <?php $cur = get_queried_object_id();?>
            <div class="order">
                <select name="order" id="sort">
                <option value="0"  selected> Sort orders </option>
                <option value="ASC">Hot tour</option>
                <option value="DESC">Tên Tour</option>
                <option data-meta="meta_value_num" value="ASC" data-key ="sale_price">Giá từ thấp đến cao</option>
                <option data-meta="meta_value_num" value="DESC" data-key="sale_price">Giá từ cao đến thấp</option>
                </select>
            </div>
            <div id="result">
            <?php $loop = new WP_Query(array('post_type'=>'tour','posts_per_page'=>8,'tax_query'=>array(array('taxonomy'=>'tour_cat','field'=>'term_id','terms'=>$cur)),'paged' => get_query_var('paged') ? get_query_var('paged') : 1 )); ?>
            <div class="row_posts posts row">
                <?php while ($loop->have_posts() ) : $loop->the_post();?>
                <?php include 'template/tax_tour.php'; ?>
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
                'total' => $loop->max_num_pages,
                'prev_text'          => __('&larr;'),
                'next_text'          => __('&rarr;'),
                ));
                ?>
            </div>
            </div>
            <?php else : ?>
            <h2 class="page-title">Không có bài viết nào</h2>
            <?php endif; ?>
        </div>
        <div class="col-md-4 sidebar_col">
            <?php get_sidebar('tour'); ?>
        </div>
    </div>

</div>
<div class="section6">

    <div class="container">

        <div class="tour_custom">

            <h3 class="sc_text">Bạn muốn đặt tour theo ý muốn </h3>

            <a href="<?php echo home_url();?>/dat-tour-tuy-chinh"><button class="lh_knv">Đặt Tour Tùy Chỉnh</button></a>

        </div>

    </div>

</div>
<?php get_footer(); ?>
<script type="text/javascript">
     function loadItemProduct() {
        var id = jQuery('#sort').val();
        var meta_key = jQuery('#sort option:selected').data('meta');
        var key = jQuery('#sort option:selected').data('key');
        jQuery('#result').html('<div class="text-center"><span class="loading"></span></div>');
        jQuery.ajax({
            type: 'POST',
            url:ajaxurl,
            data: { id_sort: id, meta:meta_key, key:key, action:'filter'},
            dataType: 'html',
            success: function(data) {
                jQuery("#result").html(data);
            }
        });
        return false;
    }
    jQuery("#sort").change(function(){

        loadItemProduct();
    });
</script>