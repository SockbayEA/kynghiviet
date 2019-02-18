<div class="sb_content gt_bx">
    <div class="sb_box sidebar_menu_box">
           <h3 class="sb-title">About me</h3>
        <?php $ab = get_field('about_me',193) ;?>
           <div class="owl-carousel aboutme">
           <?php foreach ($ab as $key => $abv) { ?>
            <div class="item">
                <div class="thubm">
                    <img src="<?php echo $abv['image']; ?>" alt="<?php echo $abv['title']; ?>">
                </div>
                <div class="p_ct">
                  <?php echo $abv['content']; ?>
                </div>
              
            </div>
          <?php  } ?>
        </div>
    </div>

    <div class="sb_box newest">
        <h3 class="sb-title">Tin tức</h3>
        <div class="media_posts posts">
            <?php query_posts(array('post_type' => 'post', 'posts_per_page' => 3)); ?>
            <?php if(have_posts()):while(have_posts()):the_post(); ?>
                <div class="sb_post">
                <h3 class="news-post"><a href="<?php the_permalink();?>"><?php the_title() ?></a></h3>
                <div class="thubm">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbmd', array('class' => 'img-responsive')); ?></a>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </div>
</div>
