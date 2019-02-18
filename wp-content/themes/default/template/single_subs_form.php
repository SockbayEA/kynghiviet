<div class="qcol">
    <h3 class="sub-title text-center text-uppercase"><i class="fa fa-edit"></i> Đăng ký tư vấn và nhận báo giá</h3>
    <div class="form_content box_content">
        <div class="row">
            <div class="col-sm-7">
                <?php query_posts(array('post_type' => 'tu_van', 'show_posts' => -1)); ?>
                <ul class="advices_box text-center">
                    <?php if(have_posts()):while(have_posts()):the_post(); ?>
                    <li>
                        <div class="icon"><?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); ?></div>
                        <h4 class="title"><?php the_title(); ?></h4>
                    </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
            </div>
            <div class="col-sm-5">
                <?php echo do_shortcode('[contact-form-7 id="75" title="Đăng ký tư vấn"]'); ?>
            </div>
        </div>
    </div>
</div>
