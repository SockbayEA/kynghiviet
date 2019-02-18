<?php session_start();
function filter() {
$by = $_POST['id_sort'];
$orderby = $_POST['meta'];
$key= $_POST['key'];
?>
<?php $loop = new WP_Query(array('post_type'=>'tour','posts_per_page' =>12,'order'=>$by,'orderby'=>$orderby,'meta_query'=>array(array('key'=>$key)),'paged' => get_query_var('paged') ? get_query_var('paged') : 1 )); ?>
<div class="row_posts posts row">
    <?php while ($loop->have_posts() ) : $loop->the_post();?>
    <?php include 'template/tax_tour.php'; ?>
    <?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
<?php  wp_die (); ?>
<?php } ?>
<?php 
add_action( 'wp_ajax_filter', 'filter' );

add_action( 'wp_ajax_nopriv_filter', 'filter' );
?>
<?php 

function numberofentry(){

$number = isset($_POST['number'])? $_POST['number']:"";
$_SESSION['number'] = $number;
	 for($i=1;$i<=$number;$i++){ ?>
<?php if($i==1){ ?>
    <div class="item item1">
        <h5>Hành khách</h5>
        <p><label>Họ tên : </label><span class="wpcft7-form-control-wrap your-name1"><input type="text" name="your-name1" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
        <p><label>Ngày sinh : </label>
        <span class="wpcft7-form-control-wrap your-since1"><input type="text" name="your-since1" value="" class="wpcft7-form-control wpcft7-date wpcft7-validates-as-date form-controls" aria-invalid="false" placeholder="dd/mm/yy"></span>
    </p>
    <p><label>Loại khách <span>*</span> :</label>
    <span class="wpcft7-form-control-wrap your-type1"><select name="your-type1" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false"><option value="Người lớn">Người lớn</option><option value="Trẻ em">Trẻ em</option></select></span></p>
    <p><label>Giới tính <span>*</span> : </label><span class="wpcft7-form-control-wrap your-sex1"><select name="your-sex1" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false"><option value="Nam">Nam</option><option value="Nữ">Nữ</option></select></span></p>
    <p><label>Passport/CMND <span>*</span> :</label> <span class="wpcft7-form-control-wrap your-pasport1"><input type="text" name="your-pasport1" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
    <p><label>Ngày hết hạn <span>*</span>: </label>
    <span class="wpcft7-form-control-wrap your-exp-date1"><input type="text" name="your-exp-date1" value="" class="wpcft7-form-control wpcft7-date wpcft7-validates-as-date form-controls" aria-invalid="false" placeholder="dd/mm/yy"></span>
    </p>
    <p><label>Quốc tịch :</label> <span class="wpcft7-form-control-wrap your-nat1"><input type="text" name="your-nat1" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
    <p><label>Email <span>*</span> : </label><span class="wpcft7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-email wpcft7-validates-as-required wpcft7-validates-as-email form-controls" aria-required="true" aria-invalid="false"></span></p>
    <p><label>Số điện thoại <span>*</span> :</label> <span class="wpcft7-form-control-wrap your-tel"><input type="tel" name="your-tel" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-tel wpcft7-validates-as-required wpcft7-validates-as-tel form-controls" aria-required="true" aria-invalid="false"></span></p>
    <p><label>Địa chỉ <span>*</span> : </label><span class="wpcft7-form-control-wrap your-add"><input type="text" name="your-add" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
    <p><label>Thành phố <span>*</span> : </label><span class="wpcft7-form-control-wrap your-city"><input type="text" name="your-city" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
    </div>
    <br>
<?php } else { ?>
<div class="item item1">
	<h5>Hành khách <?php echo $i; ?></h5>
	<p><label>Họ tên : </label><span class="wpcft7-form-control-wrap your-name<?php echo $i;?>"><input type="text" name="your-name<?php echo $i;?>" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
	<p><label>Ngày sinh : </label>
	<span class="wpcft7-form-control-wrap your-since<?php echo $i;?>"><input type="text" name="your-since<?php echo $i;?>" value="" class="wpcft7-form-control wpcft7-date wpcft7-validates-as-date form-controls" aria-invalid="false" placeholder="dd/mm/yy"></span>
</p>
<p><label>Loại khách <span>*</span> :</label>
<span class="wpcft7-form-control-wrap your-type<?php echo $i;?>"><select name="your-type<?php echo $i;?>" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false"><option value="Người lớn">Người lớn</option><option value="Trẻ em">Trẻ em</option></select></span></p>
<p><label>Giới tính <span>*</span> : </label><span class="wpcft7-form-control-wrap your-sex<?php echo $i;?>"><select name="your-sex<?php echo $i;?>" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false"><option value="Nam">Nam</option><option value="Nữ">Nữ</option></select></span></p>
<p><label>Passport/CMND <span>*</span> :</label> <span class="wpcft7-form-control-wrap your-pasport<?php echo $i;?>"><input type="text" name="your-pasport<?php echo $i;?>" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
<p><label>Ngày hết hạn <span>*</span>: </label>
<span class="wpcft7-form-control-wrap your-exp-date<?php echo $i;?>"><input type="text" name="your-exp-date<?php echo $i;?>" value="" class="wpcft7-form-control wpcft7-date wpcft7-validates-as-date form-controls" aria-invalid="false" placeholder="dd/mm/yy"></span>
</p>
<p><label>Quốc tịch :</label> <span class="wpcft7-form-control-wrap your-nat<?php echo $i;?>"><input type="text" name="your-nat<?php echo $i;?>" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
</div>
<br>
<?php } } ?>

    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
    	    $('.wpcft7-date').datepicker({ dateFormat:'dd/mm/yy'});
    </script>


<?php  wp_die (); ?>
<?php }

add_action( 'wp_ajax_numberofentry', 'numberofentry' );

add_action( 'wp_ajax_nopriv_numberofentry', 'numberofentry' );
 ?>
<?php 
function district(){

$id_city = $_POST['id_city']; ?>

<?php if($id_city ==0) { ?>

 <select name="diemdulich" class="wpcft7-form-control wpcft7-select form-controls" id="diemdulich" aria-invalid="false">
    <option>Chọn điểm đến</option>    
</select>

<?php } else { ?>

 <select name="diemdulich" class="wpcft7-form-control wpcft7-select form-controls" id="diemdulich" aria-invalid="false">

        <?php

        $nei_args = array(

        // 'orderby' => 'name',

        'hierarchical' => 1,

        'taxonomy' => 'tour_custom_cat',

        'hide_empty' => 0,

        'parent' =>$id_city,

        );

        $nei = get_categories($nei_args); ?>

        <?php foreach($nei as $ne) {

        echo '<option value="'.$ne->slug.'" >' . $ne->name .'</option>';

        }

        ?>

</select>

<?php }   die(); ?>

<?php }  ?>
<?php 

add_action( 'wp_ajax_district', 'district' );

add_action( 'wp_ajax_nopriv_district', 'district' );


?>