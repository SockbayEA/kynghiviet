<div class="post">
    <div class="row">
        <div class="col-sm-6 thumb">
            <?php if(get_field('youtube_link')){
                echo get_field('youtube_link', false, false);
            }else{
                the_post_thumbnail('thumblg', array('class' => 'img-responsive'));
            } ?>
        </div>
        <div class="col-sm-6 post_desc">
            <div class="inner">
                <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <div class="excerpt">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

