<?php

function iz_add_currency_vnd($currencies) {
    $currencies['Đồng'] = __('Việt Nam - Đồng', 'iz_woocommerce');
    return $currencies;
}

add_filter('woocommerce_currencies', 'iz_add_currency_vnd');

function iz_add_currency_symbol($symbol, $currency) {
    switch ($currency) {
        case 'Đồng':

            $symbol = 'VNĐ';
            break;

        default:
            break;
    }
    return $symbol;
}

add_filter('woocommerce_currency_symbol', 'iz_add_currency_symbol', 10, 3);

function iz_woo_template_cart() {
    global $woocommerce;
    ?>
    <div class="shopping-cart">
        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>">
        <span class="fa fa-shopping-cart icon"></span>
        <div class="text">
            <div><strong>GIỎ HÀNG</strong></div>
            <div><span class="num"><?php echo $woocommerce->cart->get_cart_contents_count() ?> </span> <span>Sản phẩm</span></div>
        </div>
        </a>
    </div>
    <?php
}


//field checkout
add_filter('woocommerce_checkout_fields', 'iz_custom_address_field');
function iz_custom_address_field($fields){
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_postcode']);
    return $fields;
}

add_filter('woocommerce_output_related_products_args', 'iz_num_products_related');
function iz_num_products_related($args){
    $args['posts_per_page'] = 4;
    return $args;
}


add_action('wp_ajax_product_search', 'iz_ajax_product_search');
add_action('wp_ajax_nopriv_product_search', 'iz_ajax_product_search');
function iz_ajax_product_search(){
    if(isset($_POST['action']) && $_POST['action'] == 'product_search'){
        $key = $_POST['key'];
        global $query_string;
        $args = array('post_type'=>'product','showposts'=>10,  's'=>$key);
        $search = new WP_Query($args);
        $result = '';
        if($search->have_posts()):while ($search->have_posts()):$search->the_post();
        global $product;
        $result .= '
           <li>
                <a href="'.  get_permalink().'">
                    <div class="thumbnail">
                        '.  get_the_post_thumbnail().'
                    </div>
                    <div class="info">
                        <h4>'.  get_the_title().'</h4>
                        <div class="price">Giá: '.$product->get_price_html().'</div>
                    </div>
                </a>
            </li> 
        ';
        endwhile;        wp_reset_query();        wp_reset_postdata();
        echo $result.'<li class="more-search">Xem tất cả</li>';
        else:
            echo 'Không có sản phẩm nào!';
        endif;
        die();
    }
}


// sale percent
add_filter('woocommerce_sale_flash', 'iz_sale_percent', 10, 3);
function iz_sale_percent($text, $post, $_product){
    $from = $_product->regular_price;
    $to = $_product->price;
    if($from == $to || !$to) return '';
    $percent = round(($from - $to)/$from*100);
    $text = $from>$to?'-':'+';
    return '<span class="onsale">'.$text.' '.$percent.'%'.'</span>';
}


// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {
 
  global $woocommerce, $post;
  
  echo '<div class="options_group">';
  
  woocommerce_wp_text_input(array(
      'id' => '_cmml',
      'label' => 'Nồng độ',
      
  ));
  
  echo '</div>';
	
}
function woo_add_custom_general_fields_save( $post_id ){
	
	// Text Field
	$woocommerce_text_field = $_POST['_cmml'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, '_cmml', esc_attr( $woocommerce_text_field ) );
		
	
}
