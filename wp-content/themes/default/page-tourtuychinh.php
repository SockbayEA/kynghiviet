<?php
/*
* Template Name:Page Tour tùy chỉnh
*/ get_header(); // This fxn gets the header.php file and renders it ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="head_page" <?php $head_bn= get_field('image'); ?><?php if($head_bn) { ?> style="background-image:url(<?php echo $head_bn; ?>);" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri();?>/images/header.jpg);" <?php } ?> >
</div>
<div class="custom_tour">
<div class="container">
    <div class="row">
        
        <div class="col-md-12 content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            <div class="entry_content">
                <?php the_content(); ?>
                
            </div>
            
            <?php endwhile; endif; ?>

            <div class="tour_custom_box">
                    <div role="form" class="wpcft7"  lang="vi"  method="POST">
                      <div class="screen-reader-response"></div>
                      <form action="" method="post">
                        <div class="bt">
                          <h3 class="f_title">Đặt tour tùy chỉnh</h3>
                          <p class="p_note">Các trường hợp được đánh dấu <span>*</span> là bắt buộc</p>
                          <p>
                            <label>Điểm đến <span>*</span></label>
                            <span class="wpcft7-form-control-wrap diemden">
                              <select name="diemden" class="wpcft7-form-control wpcft7-select form-controls" id="diemden" aria-invalid="false">
                                <option value selected="selected">Chọn điểm đến</option>
                                    <?php
                                      $status = array(
                                      'hierarchical' =>0,
                                      'taxonomy' => 'tour_custom_cat',
                                      'hide_empty' => 0,
                                      'parent' =>0,
                                      );
                                    $sta = get_categories($status); ?>
                                    <?php foreach($sta as $st) {
                                    echo '<option value="'.$st->term_id.'" >' . $st->name .'</option>';
                                    }
                                    ?>                              
                              </select>
                            </span>
                          </p>
                          <p>
                            <label>Điểm du lịch <span>*</span></label>
                            <span class="wpcft7-form-control-wrap diemdulich">
                              <select name="diemdulich" class="wpcft7-form-control wpcft7-select form-controls" id="diemdulich" aria-invalid="false">
                                  <option>Chọn điểm du lịch</option>
                              </select>
                            </span>
                          </p>
                          <p><label>Ngày đi <span>*</span></label><span class="wpcft7-form-control-wrap your-date"><input type="text" name="your-date" value="" class="wpcft7-form-control wpcft7-date wpcft7-validates-as-required wpcft7-validates-as-date form-controls" aria-required="false" aria-invalid="false" placeholder="dd/mm/yy"></span> </p>
                          <p><label>Thời gian <span>*</span></label><span class="wpcft7-form-control-wrap your-time"><input type="text" name="your-time" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false" placeholder="ngày"></span> </p>
                          <p>
                            <label>Điểm khởi hành <span>*</span></label>
                            <span class="wpcft7-form-control-wrap diemkhoihanh">
                              <input name="diemkhoihanh" class="wpcft7-form-control wpcft7-text form-controls dkh"  aria-invalid="false">
                                <!-- <?php // include 'template/tinhthanh.php'; ?> -->
                              </select>
                            </span>
                          </p>
                          <p>
                            <label>Hạng tour <span>*</span></label>
                            <span class="wpcft7-form-control-wrap hangtour">
                              <select name="hangtour" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false">
                                <option value="Tiết kiệm">Tiết kiệm</option>
                                <option value="Phổ thông">Phổ thông</option>
                                <option value="Hạng sang">Hạng sang</option>
                              </select>
                            </span>
                          </p>
                          <p>
                            <label>Số người lớn <span>*</span></label>
                            <span class="wpcft7-form-control-wrap nguoilon">
                              <select name="nguoilon" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                              </select>
                            </span>
                          </p>
                          <p>
                            <label>Số trẻ em <span>*</span></label>
                            <span class="wpcft7-form-control-wrap treem">
                              <select name="treem" class="wpcft7-form-control wpcft7-select form-controls" aria-invalid="false">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                              </select>
                            </span>
                          </p>
                        </div>
                        <div class="bt3">
                          <h3 class="f_title">Thông tin liên hệ</h3>
                          <p><label>Họ tên : </label> <span class="wpcft7-form-control-wrap your-name2"><input type="text" name="your-name2" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
                          <p><label>Email <span>*</span> : </label><span class="wpcft7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-email wpcft7-validates-as-required wpcft7-validates-as-email form-controls" aria-required="true" aria-invalid="false"></span></p>
                          <p><label>Số điện thoại <span>*</span> : </label><span class="wpcft7-form-control-wrap your-tel"><input type="tel" name="your-tel" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-tel wpcft7-validates-as-required wpcft7-validates-as-tel form-controls" aria-required="true" aria-invalid="false"></span></p>
                          <p><label>Địa chỉ <span>*</span> : </label><span class="wpcft7-form-control-wrap your-add"><input type="text" name="your-add" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
                          <p><label>Thành phố <span>*</span> :</label> <span class="wpcft7-form-control-wrap your-city"><input type="text" name="your-city" value="" size="40" class="wpcft7-form-control wpcft7-text wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></span></p>
                          <p><label>Yêu cầu khác :</label> <span class="wpcft7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcft7-form-control wpcft7-textarea wpcft7-validates-as-required form-controls" aria-required="true" aria-invalid="false"></textarea></span></p>
                        </div>
                        <p class="tour_c"><input type="submit" value="Book tour" class="wpcft7-form-control wpcft7-submit" name="send"></p>
                        <div class="wpcft7-response-output wpcft7-display-none"></div>
                      </form>
                    </div>
            </div>
            
        </div>
    </div>
</div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<script>
document.addEventListener( 'wpcft7mailsent', function( event ) {
    location = 'http://kynghiviet.quangcaosangtao.vn/cam-on';
}, false );
</script>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
     $('.wpcft7-date').datepicker({ dateFormat:'dd/mm/yy'});
  });
</script>
<script type="text/javascript">
  jQuery("#diemden").change(function(){
    var id = jQuery(this).val();
    jQuery.ajax({
      type: 'POST',
      url: ajaxurl,
      data: { id_city: id , action : 'district' },
      dataType: 'html',
      success: function(data) {
        jQuery("#diemdulich").html(data);
        jQuery(".dkh").html(data);
      }
    });
    return false;
  });
</script>
<?php 
  require 'PHPMailer/PHPMailerAutoload.php';
  if(isset($_POST['send']))
  {
  $diemden = $_POST['diemden'];
  $term = get_term($diemden, 'tour_custom_cat');
  $dd =  $term->name;
  $diemdulich = $_POST['diemdulich'];
  $ngaydi = $_POST['your-date'];
  $thoigian = $_POST['your-time'];
  $diemkhoihanh = $_POST['diemkhoihanh'];
  $hangtour = $_POST['hangtour'];
  $nguoilon = $_POST['nguoilon'];
  $treem = $_POST['treem'];
  $hoten = $_POST['your-name2'];
  $email = $_POST['your-email'];
  $sdt = $_POST['your-tel'];
  $diachi = $_POST['your-add'];
  $thanhpho = $_POST['your-city'];
  $message = $_POST['your-message'];

  $subject = 'Book Tour KyNghiViet Tuy Chinh';
  $mailto = 'lori.itvnn@gmail.com';
  $from = 'KyNghiViet';
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username ='nguyenvantuy.it@gmail.com';
  $mail->Password = 'bxpcubkkjmmlzkid';
  $mail->addAddress($mailto);
  $mail->setFrom($email);
  $mail->Subject = $subject;
  $mail->msgHTML($message);
  $mail->Body = 'Địa điểm:'.$dd.'<br>Điểm du lịch  : '.$diemdulich.'<br>';
  $mail->Body .= 'Ngày đi:'.$ngaydi.'<br>';
  $mail->Body .= 'Điểm khởi hành:'.$diemkhoihanh.'<br>';
  $mail->Body .= 'Hạng tour:'.$hangtour.'<br>';
  $mail->Body .= 'Số người lớn :'.$nguoilon.'<br>';
  $mail->Body .= 'Số trẻ em :'.$treem.'<br>';
  $mail->Body .= 'Thông tin liên hệ <br>';
  $mail->Body .= 'Họ tên:'.$hoten.'<br>';
  $mail->Body .= 'Email:'.$email.'<br>';
  $mail->Body .='SĐT:'.$sdt.'<br>';
  $mail->Body .='Địa chỉ:'.$diachi.'<br>';
  $mail->Body .='Thành phố:'.$thanhpho.'<br>';
  $mail->Body .='Yêu cầu:'.$message.'<br>';
  if (!$mail->send()) {
  $error = "Mailer Error: " . $mail->ErrorInfo;
  echo '<p id="para">'.$error.'</p>';
  }
  else {
  echo '<div class="container"><p id="para">Message đã gửi!</p></div>';
  }
  }
  else{
  echo '';
  }
  ?>