
</div>
<!--end main body-->

<div id="to_top" style="display: block;">
<a href="#" class="btn btn-primary"><i class="fa fa-chevron-up"></i></a>
</div>
<div id="footer" class="padding">
<div class="container">
    <div class="row">
        <div class="col-md-4  ftcol">
          <div class="ft_logo">
            <img src="<?php echo ot_get_option('fl_logo'); ?>" alt="Kỳ Nghỉ Việt">
          </div>
            <div class="footer-intro">
               <?php the_field('footer_about',5); ?>
            </div>
           <div class="footer-social">
                <?php include ('template/social.php') ;?>
            </div>
        </div>
        <div class="col-md-4 ftcol">
            <div class="col-md-6 col-sm-6">
                 <?php wp_nav_menu(array(
            'theme_location' => 'footer_menu1'
            )); ?>
            </div>
            <div class="col-md-6 col-sm-6">
                 <?php wp_nav_menu(array(
            'theme_location' => 'footer_menu2'
            )); ?>
            </div>                                                                                                                                                      
        </div>
        <div class="col-md-4 ftcol">
            <?php query_posts(array('post_type' => 'tour', 'posts_per_page' =>4)); ?>
             <div class="ft_tour row">
                 <?php $i=0; if (have_posts()):while (have_posts()): $i++;the_post(); ?>
                  <div class="ft_im">
                       <a href="<?php the_permalink(); ?>" target="_blank"><?php  the_post_thumbnail('thummd', array('class' => 'img-responsive')); ?></a>
                  </div> 
              <?php endwhile; endif; ?>
              </div>    
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
</div>
<div class="copyright">
<div class="container"><p>Copyright &copy; 2018 by VDO . All right reserved</p></div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.mhead.js"></script>
<script type="text/javascript">
     jQuery(document).ready(function($){
      $(".fancybox").fancybox();
      $('.select_time').on('click', function() {
        $.fancybox($("a.fancybox1"));
      });
      $('.btn-ask').on('click', function() {
        $.fancybox($("a.comment"));
      });
    });
</script>
<?php wp_footer(); ?>
<nav id="menu">    
    <?php
    wp_nav_menu(array(
    'menu' => 'primary',
    'theme_location' => 'primary',
    'depth' => 4,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'bsmenu',
    'menu_class' => 'nav navbar-nav',
    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
    'walker' =>'')
    );
    ?>
    
</nav>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c20afe182491369ba9f5307/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php echo ot_get_option('facebook_api'); ?>
<?php echo ot_get_option('google_analytics'); ?>
<?php echo ot_get_option('fl_ggadcode'); ?>
</body>
</html>