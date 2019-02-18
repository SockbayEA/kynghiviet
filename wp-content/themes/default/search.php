<?php get_header(); ?>
<div class="head_page searbox">
    <h2 class="search-title">Tìm kiếm tour</h2>
      <img srcset="<?php echo get_template_directory_uri();?>/images/diemden.jpg" alt="<?php the_title(); ?>"/>
</div>
<div class="container">
    <div class="row">
        <div class="tax_tour col-md-8">
            <div class="tax_desc"></div>
            <h3 class="text_search">Tìm Kiếm Tour</h3>
            <div class="order">
                <select name="order" id="sort">
                <option value="0"  selected> Sort orders </option>
                <option value="ASC">Hot tour</option>
                <option value="DESC">Tên Tour</option>
                <option data-meta="meta_value_num" value="ASC" data-key ="price">Giá từ thấp đến cao</option>
                <option data-meta="meta_value_num" value="DESC" data-key="price">Giá từ cao đến thấp</option>
                </select>
            </div>

            <?php // $s= $_GET['s'];?>
            <?php $key = $_GET['s']; ?>
            <?php $key_s  = str_replace(" ", "-", $key); ?>
            <?php $s = convert_vi_to_en($key_s); ?>
            <h3 class="srt">Search Result <?php if($key){ ?> for : <?php echo $key;?><?php }else { echo '';} ?></h3>
            <div id="result">
                            <?php $querystr="
                                SELECT *
                                    FROM $wpdb->posts, $wpdb->term_relationships, $wpdb->term_taxonomy, $wpdb->terms
                                        WHERE ($wpdb->terms.name = '$s'
                                        OR $wpdb->posts.post_content LIKE '%$s%'
                                    OR $wpdb->posts.post_title LIKE '%$s%'  OR $wpdb->posts.post_name LIKE '%$s%' )
                                    AND $wpdb->posts.post_type = 'tour' 
                                    AND $wpdb->posts.ID = $wpdb->term_relationships.object_id
                                    AND $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id
                                    AND $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id
                                    ORDER BY $wpdb->posts.post_date DESC
                            ";

                            $pageposts = $wpdb->get_results($querystr, OBJECT_K); ?>
                            <div class="row">
                            <?php foreach ($pageposts as $post): setup_postdata($post); ?>
                              <?php include 'template/tax_tour.php'; ?>  
                            <?php endforeach; ?>
                            </div>
            </div>
        </div>
        <div class="col-md-4 sidebar_col">
            <?php get_sidebar('tour'); ?>
        </div>
    </div>
</div>
<div class="section6">

    <div class="container">

        <div class="tour_custom">

            <h3 class="sc_text"><?php the_field('tour_custom',5) ?></h3>

            <a href="<?php the_field('link',5) ?>"><button class="lh_knv"><?php the_field('ten_button',5) ?></button></a>

        </div>

    </div>

</div>
<?php get_footer(); ?>
<script type="text/javascript">
     function loadItemProduct() {
        var id = jQuery('#sort').val();
        var meta_key = jQuery('#sort option:selected').data('meta');
        var key = jQuery('#sort option:selected').data('key');
        /**/
        jQuery.ajax({
            type: 'POST',
            url:ajax_url,
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