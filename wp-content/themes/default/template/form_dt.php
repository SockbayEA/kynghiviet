<div role="form" class="wpcft7"  lang="vi"  method="POST">
<div class="screen-reader-response"></div>
<?php $pid = $_GET['pid']; ?>
<form action="" method="post">
<input type="hidden" name="nl" value="" class="nl">
<!-- <div style="display: none;">
<input type="hidden" name="_wpcft7" value="217">
<input type="hidden" name="_wpcft7_version" value="5.0.4">
<input type="hidden" name="_wpcft7_locale" value="vi">
<input type="hidden" name="_wpcft7_unit_tag" value="wpcft7-f217-o1">
<input type="hidden" name="_wpcft7_container_post" value="0">
</div> -->
<div class="bt">
			<?php $pid = isset($_GET['pid']) ? $_GET['pid']:""; ?>
			<?php $per = isset($_GET['person']) ? $_GET['person']:"" ?>
			<h3 class="f_title">Thông tin tour</h3>
			<p class="p_note">Các trường hợp được đánh dấu <span>*</span> là bắt buộc</p>
			<p><label><span>*</span> Ngày đi : </label><span class="wpcft7-form-control-wrap your-datego">
			<select name="your-datego" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false">
				<?php  $date_start = get_field('date_start',$pid);?>
				<?php $i=0; foreach ($date_start as $key => $dv) { $i++; ?>
				<option <?php  if($i==1){ echo 'selected'; } else { echo  '';} ;?> value="<?php echo $dv['ngay_di'];?>"><?php echo $dv['ngay_di'];?></option>
				<?php } ?>
			</select></span></p>
			<p><label><span>*</span> Địa điểm : </label><span class="wpcft7-form-control-wrap your-dateto">
				<select name="your-dateto" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false">
					<?php $place_start = get_field('diem_khoi_hanh',$pid); ?>
					<?php $j=0; foreach ($place_start as $key => $place_v) { $j++; ?>
					<option <?php  if($j==1){ echo 'selected'; } else { echo  '';} ;?> value="<?php echo $place_v['place_start'];?>"><?php echo $place_v['place_start'];?></option>
					<?php } ?>
				</select></span>
			</p>
			<div class="row">
				<div class="col-md-12">
						<p class="ctf_service">Dịch vụ :</p>
						<div class="coll">
								<span class="wpcft7-form-control-wrap service">
									<span class="wpcft7-form-control wpcft7-checkbox">
									<?php  $service = get_field('dich_vu',$pid);?>
									<?php foreach ($service as $key => $service_v) { ?>
										<p class="wpcft7-list-item">
											<input type="checkbox" name="service[]" value="<?php echo $service_v['list_dv'];?>">
											<span class="wpcft7-list-item-label"><?php echo $service_v['list_dv'];?></span>
										</p>
									<?php } ?>
									</span>
								</span>
						</div>
						
				</div>
				<div class="col-md-12">
					<p class="tour_alt_ctf">Tour phụ : </p>
					<div  class="coll">
						<p class="cc">
						<span class="wpcft7-form-control-wrap tour-alt"><span class="wpcft7-form-control wpcft7-checkbox">
							<?php $alt_id = get_field('tour_alt',$pid);?>
							<?php query_posts(array('post_type'=>'tour_phu','posts_per_page' =>10,'tax_query'=>array(array('taxonomy'=>'tour_phu_cat','terms'=>'term_id','terms'=>$alt_id))));?>
							<?php if(have_posts()):while(have_posts()):the_post(); ?>
							<p class="wpcft7-list-item"><input type="checkbox" name="tour-alt[]" value="<?php the_title(); ?>">
							<span class="wpcft7-list-item-label"><?php the_title(); ?></span></p>
							<?php endwhile;endif;wp_reset_query(); ?>
						</span></span>
					</p>
					</div>
						
				</div>
			</div>
			<p><label>Số hành khách</label><select name="number_person" id="number_person" style="width:60px" aria-invalid="false" class="valid wpcft7-select"> <option value="01" selected="selected">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="01">>5</option></select></p>
</div>
<div class="bt2">
			<h3 class="f_title">Thông tin khách hàng</h3>
			<p class="p_note"><span>*</span>Nếu nhóm của bạn có hơn 5 Hành khách , vì mục đích bảo mật, vui lòng chỉ cung cấp thông tin cho 1 người và Đại diện Dịch vụ Khách hàng của chúng tôi sẽ liên hệ để hoàn tất chi tiết đặt phòng của bạn.</p>
			<h4>Hành khách - người liên hệ chính</h4>
			<div class="Personal">
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
			</div>
		</div>
<p><input type="submit" value="Book tour" class="wpcft7-form-control wpcft7-submit" name="send"></p>
</form></div>