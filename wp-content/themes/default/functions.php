<?php
define('IZWT_VERSION', 1.0);
/* ----------------------------------------------------------------------------------- */
/* Register main menu for Wordpress use
/*----------------------------------------------------------------------------------- */
register_nav_menus(
array(
'primary' => __('Primary Menu', 'fl_theme'),
'footer_menu1' => __('Footer Menu1', 'fl_theme'),
'footer_menu2' => __('Footer Menu2', 'fl_theme'),
'sidebar_menu' => __('Sidebar Menu', 'fl_theme')
)
);
/* ----------------------------------------------------------------------------------- */
/* Activate sidebar for Wordpress use
/*----------------------------------------------------------------------------------- */
function fl_register_sidebars() {
register_sidebar(array(// Start a series of sidebars to register
'id' => 'sidebar', // Make an ID
'name' => 'Sidebar', // Name it
'description' => 'Take it on the side...', // Dumb description for the admin side
'before_widget' => '<div>', // What to display before each widget
'after_widget' => '</div>', // What to display following each widget
'before_title' => '<h3 class="side-title">', // What to display before each widget's title
'after_title' => '</h3>', // What to display following each widget's title
'empty_title' => '', // What to display in the case of no title defined for a widget
));
}
// adding sidebars to Wordpress (these are created in functions.php)
add_action('widgets_init', 'fl_register_sidebars');
/* ----------------------------------------------------------------------------------- */
/* Enqueue Styles and Scripts
/*----------------------------------------------------------------------------------- */
function fl_scripts() {
// get the theme directory style.css and link to it in the header
wp_enqueue_style('fl-style', get_template_directory_uri() . '/style.css', '1.0', 'all');
wp_enqueue_style('fl-bx-css', get_template_directory_uri() . '/plugin/bxslider/jquery.bxslider.css');
wp_enqueue_style('fl-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
wp_enqueue_style('fl-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
wp_enqueue_style('fl-main', get_template_directory_uri() . '/css/main.css');
wp_enqueue_style('fl-screen', get_template_directory_uri() . '/css/fl_screen.css');
wp_enqueue_style('fl-mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css');
wp_enqueue_style('fl-animate', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/animate.min.css');
wp_enqueue_style('fl-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
// add fitvid
wp_enqueue_script('fl-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), IZWT_VERSION, true);
// add theme scripts
//wp_enqueue_script('fl-theme', get_template_directory_uri() . '/js/theme.min.js', array(), IZWT_VERSION, true);
wp_enqueue_script('fl-bx-script', get_template_directory_uri() . '/plugin/bxslider/jquery.bxslider.min.js', array(), '1.0', true);
//    wp_enqueue_script('jquery-ui');
wp_enqueue_script('fl-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true);
wp_enqueue_script('fl-man-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
wp_enqueue_script('fl-owl-js',get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'fl_scripts'); // Register this fxn and allow Wordpress to call it automatcally in the header
function fl_add_support_theme() {
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');
add_image_size('thumbmd', 360, 240, true);
add_image_size('thumblg', 470, 300, true);
}
add_action('after_setup_theme', 'fl_add_support_theme');
// pre get posts
function fl_pre_get_posts($query) {
if ($query->is_home()) {
//do some thing
}
}
add_action('pre_get_posts', 'fl_pre_get_posts');
// tuy chinh khi upload media
//add_filter('wp_handle_upload_prefilter', 'fl_custom_upload_filter');
//function fl_custom_upload_filter($file){
//    //$file['name'];
//    return $file;
//}
// posts short description
//admin tool bar
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
//what template
function ip_admin_bar_what_template() {
	global $wp_admin_bar;
	global $template;
	if ( $template ) {
		$wp_admin_bar->add_menu( array(
			'id' => 'ip-template',
			'parent' => 'top-secondary',
			'title' => __( basename( $template ) )
		) );
	}
}
add_action( 'wp_before_admin_bar_render', 'ip_admin_bar_what_template' );
//shortdesc
function fl_short_desc($postID = null, $limit = 45, $more = ' [...] ') {
$excerpt = get_post_field('post_excerpt', $postID);
$exc_spl = explode(' ', $excerpt);

if (has_excerpt($postID)) {
if(count($exc_spl) > $limit){
return wp_trim_words($excerpt, $limit, $more);
}else{
return $excerpt;
}
} else {
return wp_trim_words(get_post_field('post_content', $postID), $limit, $more);
}
}
include_once('fl_ajax.php');
include_once('includes/wp_bootstrap_navwalker.php');
include_once('includes/filter_ajax.php');
// wp admin custom css
function fl_login_stylesheet() {
wp_enqueue_style('fl-login', get_template_directory_uri() . '/css/fl_login.css');
}
add_action('login_enqueue_scripts', 'fl_login_stylesheet');
add_action('login_headerurl', function() {
return home_url('/');
});
function fl_default_image($html) {
if (empty($html)) {
$html = '<img class="img-responsive" src="' . get_template_directory_uri() . '/images/default.jpg">';
}
return $html;
}
add_action('post_thumbnail_html', 'fl_default_image');
function fl_optitle($post, $class = 'page-title') {
?>
<h2 class="<?php echo $class; ?>">
<?php if (is_category()) { ?>
<?php single_cat_title(); ?>
<?php } elseif (is_tag()) { ?>
Thẻ <?php single_tag_title(); ?>
<?php } elseif (is_tax()) { ?>
<?php single_term_title(); ?>
<?php } elseif (is_day()) { ?>
Ngày <?php the_time('F jS, Y'); ?>
<?php } elseif (is_month()) { ?>
Tháng <?php the_time('F, Y'); ?>
<?php } elseif (is_year()) { ?>
Năm <?php the_time('Y'); ?>
<?php } elseif (is_author()) { ?>
Tác giả
<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
Blog
<?php } ?>
</h2>
<?php
}
add_filter('ot_theme_options_parent_slug', 'ot_custom_subpage');
function ot_custom_subpage() {
return 'options-general.php';
}
add_filter('ot_theme_options_menu_title', 'ot_custom_title');
function ot_custom_title() {
return 'Tùy chỉnh của bạn';
}
// editor to taxonomy description
remove_filter('pre_term_description', 'wp_filter_kses');
remove_filter('term_description', 'wp_kses_data');
add_filter('tien_ich_edit_form_fields', 'fl_cat_description');
function fl_cat_description(){
?>
<table class="form-table">
    <tr class="form-field">
        <th scope="row" valign="top"><label for="description">Mô tả chi tiết</label></th>
        <td>
            <?php
            $setting = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description');
            wp_editor(wp_kses_post($tag->description, ENT_QUOTES, 'UTF-8'), 'cat_description', $setting);
            ?>
            <br />
            <span class="description">Mô tả chi tiết</span>
        </td>
    </tr>
</table>
<?php
}
add_action('admin_head', 'fl_remove_default_category_desc');
function fl_remove_default_category_desc(){
global $current_screen;
if($current_screen->id == 'edit-tien_ich'){
?>
<script>
jQuery(function($){
$('textarea#description').closest('tr.form-field').remove();
});
</script>
<?php
}
}

//upload SVG
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
//instaler wp-conifg must active
//define( 'ALLOW_UNFILTERED_UPLOADS', true ); 

// add_action('wp_footer', 'ft_footer');
// function ft_footer() {
//     echo "<script>var ajax_url = '".admin_url( 'admin-ajax.php' )."'</script>";
// }
function fl_price_format($price) {
    if($price){
      return number_format($price,0);
    }
    return '';
}

function convert_vi_to_en($str) {
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
  $str = preg_replace("/(đ)/", 'd', $str);
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
  $str = preg_replace("/(Đ)/", 'D', $str);
  //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
  return $str;
  }