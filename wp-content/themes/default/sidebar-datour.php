<div class="sb_content info_t">
	<div class="osb1">
		<?php $pid = $_GET['pid']; ?>
		<h3 class="name_tour"><?php echo get_the_title($pid); ?></h3>
		<div class="box_in">
			<p class="time">Thời gian : <span><?php the_field('time',$pid); ?> Ngày</span></p>
			<?php $price_nomal = get_field('price',$pid);
			$price_sale = get_field('sale_price',$pid);
			?>
			<hr>
			<p>Tour code : <span><?php the_field('tour_code',$pid);?></span></p>
			<hr>
			<p>Lộ trình : <a href="<?php the_field('lich_trinh_tour',$pid);?>" download>Download</a></p>
			<hr>
			<p class="sb_custom_book"><?php the_field('content',$pid); ?></p>
			<hr>
			<p class="total">Giá : <span> <?php if($price_sale) { ?><?php echo fl_price_format($price_sale); ?> <?php } else { ?><?php echo fl_price_format($price); ?><?php } ?> VNĐ</span> <span class="star-right"><?php the_field('star') ?></span></p>
		</div>
	</div>
</div>
<div class="sb_content sb_dt">
    <div class="sb_box">
        <h3 class="dt_title">Điều Khoản Thanh Toán  </h3>
        <p class="p_dt">Huỷ trước <span>20- 30</span> ngày : <span>20%</span> tổng giá tour </p>
        <p class="p_dt">Huỷ trước <span>25</span> ngày : <span>20%</span> tổng giá tour </p>
        <p class="p_dt">Huỷ trước <span>15</span> ngày : <span>30%</span> tổng giá tour </p>
        <p class="p_dt">Huỷ trước <span>07</span> ngày : <span>40%</span> tổng giá tour </p>
        <p class="p_dt">Huỷ trước <span>03 - 06</span> ngày : <span>75%</span> tổng giá tour </p>
    </div>
    <hr>
    <div class="sb_box">
        <h3 class="dt_title">Điều Khoản Thanh Toán  </h3>
        <ul class="dt_li">
            <li>Tổng giá cuối cùng có thể thay đổi tùy vào tình trạng sẵn có</li>
            <li>Nếu chỉ được một bên gửi, tôi xác nhận rằng tôi được ủy quyền ký thay mặt cho tất cả hành khách được liệt kê trong mẫu đặt phòng này</li>
            <li>Tất cả các bên đã đọc, hiểu và đồng ý tuân theo các điều khoản, điều kiện đặt phòng và trách nhiệm</li>
            <li>Tất cả các bên hiểu rằng nếu tên không được cung cấp theo hộ chiếu, phí phát hành thêm sẽ được áp dụng</li>
            <li>Tất cả những người có tên trên mẫu đơn này đều phù hợp và thể chất có thể tham gia trong chuyến tham quan nhóm đã chọn của họ theo lịch trình được nêu trong chi tiết chuyến tham quan</li>
        </ul>
    </div>
</div>
