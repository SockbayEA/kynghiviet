<a class="post media" href="<?php the_permalink(); ?>">
    <div class="pull-left thumb">
        <?php the_post_thumbnail('thumbnail', array('class' => 'media-object')); ?>
    </div>
    <div class="post_desc media-heading">
        <h4 class="title"><?php the_title(); ?></h4>
    </div>
</a>

