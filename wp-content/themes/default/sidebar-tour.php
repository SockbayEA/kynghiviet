<div class="sb_content">
    <div class="sb_box">
        <h3 class="side_title">Search deals</h3>
        <form action="<?php echo home_url(); ?>/tour_cat/diem-den/" id="searchform" method="get">
            <div class="f_search">
                <label for="s" class="screen-reader-text"></label>
                <input type="hidden" name="post_type" value="tour">
                <input type="text" id="s" name="s" value="<?php echo get_search_query(); ?>"  placeholder=" Search for" autocomplete="off" />
                <input type="submit" value="" id="searchsubmit"  />
            </div>
        </form>
       
          <form class="filter-form">
            <p class="sub_side">Độ dài tour</p>
            <div class="checkbox">
              <label><input name="tour_length[]" type="checkbox" value="0-1000" checked>Tất cả</label>
            </div>
            <?php $tour_length = get_field('setup_tour',5) ?>
            <?php foreach ($tour_length as $key => $t_value) { ?>
            <div class="checkbox">
              <label><input name="tour_length[]" type="checkbox" value="<?php echo $t_value['gia_tri'] ;?>"><?php echo $t_value['view_tour'] ;?></label>
            </div>
            <?php } ?>
          <hr>
          <p class="sub_side">Điểm đến</p>
          <div class="button-group">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Tất cả <i class="fa fa-caret-down"></i></button>
            <ul class="dropdown-menu diemden">
              <?php $dd = get_field('goto',5); ?>
              <?php  $i=0;foreach ($dd as $key => $t_dd) {  $i++; ?>
              <li><a href="#" class="small" data-value="option<?php echo $i;?>" tabIndex="-1"><input name="type[]" type="checkbox" value="0-<?php echo $t_dd->term_id;?>"/>&nbsp;<?php echo $t_dd->name;?></a></li>
              <?php  } ?>
            </ul>
          </div>
          <hr>
          <p class="sub_side">Hoạt động đi kèm</p>
            <div class="checkbox">
              <label><input name="method[]" type="checkbox" value="0-1" checked>Tất cả</label>
            </div>
             <?php $active = get_field('active',5) ?>
             <?php foreach ($active as $key => $v_active) { ?>
            <div class="checkbox">
              <label><input name="method[]" type="checkbox" value="0-<?php  echo $v_active->term_id;?>"><?php echo $v_active->name;?></label>
            </div>
            <?php } ?>
          <hr>
          <p class="sub_side">Giá bán</p>
            <div class="checkbox">
              <label><input type="checkbox" name="price[]" value="0-2000000000" checked>Tất cả</label>
            </div>
            <?php $price_length = get_field('setup_price',5) ?>
            <?php foreach ($price_length as $key => $p_value) { ?>
            <div class="checkbox">
              <label><input type="checkbox" name="price[]" value="<?php echo $p_value['gia_tri'] ;?>"><?php echo $p_value['view_tour'] ;?></label>
            </div>
            <?php } ?>
            <input type="hidden" name="action" value="pj_filter">
          </form>
          <hr>
    </div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/includes/advance-filter.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
var options = [];
$( '.dropdown-menu a' ).on( 'click', function( event ) {
var $target = $( event.currentTarget ),
val = $target.attr( 'data-value' ),
$inp = $target.find( 'input' ),
idx;
if ( ( idx = options.indexOf( val ) ) > -1 ) {
options.splice( idx, 1 );
setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
} else {
options.push( val );
setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
}
$( event.target ).blur();

console.log( options );
return false;
});
});
</script>