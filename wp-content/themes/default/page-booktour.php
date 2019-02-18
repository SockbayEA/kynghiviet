<?php
/*
* Template Name:Page Đặt tour
*/ get_header(); // This fxn gets the header.php file and renders it ?>
<div class="page_about">
<div class="container">
    <div class="row">
        
        <div class="col-md-8 content_col">
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
            
            <h2 class="single-title hidden"><span><?php the_title(); ?></span></h2>
            <div class="entry_content">
                <?php the_content(); ?>
                
            </div>
            <div class="booktour">
                <?php // echo do_shortcode('[contact-form-7 id="217" title="Đặt tour"]'); ?>
              <?php  include 'template/form_dt.php'; ?>
            </div>
            
            <?php endwhile; endif; ?>
            
        </div>
        <div class="col-md-4 sidebar_col">
          <?php get_sidebar('datour'); ?>
        </div>
    </div>
</div>
</div>
<?php
$pid = $_GET['pid'];
  $post_title = get_the_title($pid);
  require 'PHPMailer/PHPMailerAutoload.php';
  $number = isset($_SESSION['number'])? $_SESSION['number']:1;
  if(isset($_POST['send']))
  {
  $ngaydi = $_POST['your-datego'];
  $diadiem = $_POST['your-dateto'];
  $dichvu = $_POST['service'];
  $tourphu = $_POST['tour-alt'];

  $hoten1 = $_POST['your-name1'];
  $ngaysinh1 = $_POST['your-since1'];
  $loaikhach1 = $_POST['your-type1'];
  $gioitinh1 = $_POST['your-sex1'];
  $cmnd1 = $_POST['your-pasport1'];
  $ngayhethan1 = $_POST['your-exp-date1'];
  $quoctich1 = $_POST['your-nat1'];

  $hoten2 = $_POST['your-name2'];
  $ngaysinh2 = $_POST['your-since2'];
  $loaikhach2 = $_POST['your-type2'];
  $gioitinh2 = $_POST['your-sex2'];
  $cmnd2 = $_POST['your-pasport2'];
  $ngayhethan2 = $_POST['your-exp-date2'];
  $quoctich2 = $_POST['your-nat2'];

  $hoten3 = $_POST['your-name3'];
  $ngaysinh3 = $_POST['your-since3'];
  $loaikhach3 = $_POST['your-type3'];
  $gioitinh3 = $_POST['your-sex3'];
  $cmnd3 = $_POST['your-pasport3'];
  $ngayhethan3 = $_POST['your-exp-date3'];
  $quoctich3 = $_POST['your-nat3'];

  $hoten4 = $_POST['your-name4'];
  $ngaysinh4 = $_POST['your-since4'];
  $loaikhach4 = $_POST['your-type4'];
  $gioitinh4 = $_POST['your-sex4'];
  $cmnd4 = $_POST['your-pasport4'];
  $ngayhethan4 = $_POST['your-exp-date4'];
  $quoctich4 = $_POST['your-nat4'];

  $hoten5 = $_POST['your-name5'];
  $ngaysinh5 = $_POST['your-since5'];
  $loaikhach5 = $_POST['your-type5'];
  $gioitinh5 = $_POST['your-sex5'];
  $cmnd5 = $_POST['your-pasport5'];
  $ngayhethan5 = $_POST['your-exp-date5'];
  $quoctich5 = $_POST['your-nat5'];
  
  $yourname = $_POST['your-namett'];
  $email = $_POST['your-email'];
  $phone = $_POST['your-tel'];
  $address  = $_POST['your-add'];
  $city = $_POST['your-city'];
  $message = $_POST['yeucau'];
  $subject = 'Book Tour KyNghiViet';
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
  $mail->Body = $post_title.'<br>';
  $mail->Body .= 'ngày đi:'.$ngaydi.'<br>Địa điểm : '.$diadiem.'<br>';
  foreach ($dichvu as $key => $dv) {
  $mail->Body .='Dịch vụ:'.$dv.' ,';
  }
  $mail->Body .='<br>';
  foreach ($tourphu as $key => $tp) {
   $mail->Body .='Tour phụ:'.$tp.' ,';
  }
  for($i=1;$i<=$number;$i++) {
  $mail->Body .='<br>Person'.$i.':<br> 
  Họ tên :'. ${'hoten'.$i}.'<br>
  Ngày sinh: '.${'ngaysinh'.$i}.'<br>
  Loai khách:'.${'loaikhach'.$i}. '<br>
  Giới tính:'.${'gioitinh'.$i}.'<br>
  CMND:'.${'cmnd'.$i}.'<br>
  Ngày hết hạn:'.${'ngayhethan'.$i}. '<br>
  Quốc tịch:'.${'quoctich'.$i}. '<br>';
  }
  if($number==1){
  $mail->Body .='Thông tin người đặt tour <br>
  Email:'.$email. '<br>
  Phone:'.$phone. '<br>
  Địa chỉ:'.$address. '<br>
  Thành phố :'.$city. '<br>';
  } else { echo ''; }
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
</div>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<style type="text/css">
    p.ctf_service span,p.tour_alt_ctf span{
    color: #000;
    }
    .item h5 {
    font-weight: bold;
    margin: 15px 0px;
}
select#number_person {
    outline: none;
}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
jQuery(document).ready(function($) {
    $(document).on('change', '#number_person', function(ev) {
    var numberofentry = parseInt($("#number_person").val());
    $('.nl').val(numberofentry);
    jQuery.ajax({
      type: 'POST',
      url:ajaxurl,
      data: { number: numberofentry , action : 'numberofentry' },
      dataType: 'html',
      success: function(data) {
        console.log(data);
        jQuery(".Personal").html(data);
      }
    });
    return false;

}); 

        $('.wpcft7-date').datepicker({ dateFormat:'dd/mm/yy'});
});
</script>