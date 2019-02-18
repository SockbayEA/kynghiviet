<?php

add_action('wp_ajax_pj_filter', 'fl_load_pj_filter');
add_action('wp_ajax_nopriv_pj_filter', 'fl_load_pj_filter');

function fl_load_pj_filter() {

    // if (isset($_POST['type'])) {
    //     $tax_name = $_POST['type'];
    //     $taxquery = array(
    //         array(
    //             'taxonomy' => 'tour_cat',
    //             'field' => 'slug',
    //             'terms' => $tax_name
    //         )
    //     );
    // }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
        $metaquery1['relation'] = 'OR';
        foreach ($price as $pr) {
            $splpr = split('-', $pr);
            $metaquery1 = array(array(
                'key' => 'sale_price',
                'value' => $splpr,
                'compare' => 'BETWEEN',
                'type' => 'numeric'
            ));

        }
    }
    if (isset($_POST['tour_length'])) {
        $sq = $_POST['tour_length'];
        $metaquery2['relation'] = 'OR';
        foreach ($sq as $dt) {
            $spldt = split('-', $dt);
            $metaquery2 = array(array(
                'key' => 'time',
                'value' => $spldt,
                'compare' => 'BETWEEN',
                'type' => 'numeric'
            ));
        }
    }
    if(empty($price) && !empty($sq)) {
        $metaquery = array($metaquery2);
    }
    if(!empty($price) && empty($sq)) {
        $metaquery = array($metaquery1);
    }
    if(!empty($price) && !empty($sq)) {
        $metaquery = array($metaquery1,$metaquery2);
    }
    query_posts(array(
        'post_type' => 'tour',
        'posts_per_page' =>12,
        'meta_query' => $metaquery,
        'orderby'   => 'meta_value_num'
    ));
    include 'result.php';
    die();
}