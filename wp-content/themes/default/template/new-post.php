<div class="col-md-3 col-sm-6 box_related">



    <div class="thumbs">



       <a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail('thumbmd', array('class' => 'img-responsive')); ?></a>



        <div class="inner">



            <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>



            <div class="excerpt">



                <?php echo fl_short_desc(get_the_ID(),25,'...'); ?>



            </div>

            <div class="more">

            	<a href="<?php the_permalink(); ?>">Xem thêm</a>

            </div>



        </div>



    </div>



</div>