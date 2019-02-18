<div class="main-container">

    <div id="carousel-example-generic" class="carousel slide">

      <!-- Indicators -->

      <ol class="carousel-indicators">

        <?php query_posts(array('post_type' => 'slide', 'posts_per_page' => -1,'order'=>'ASC')); ?>

        <?php $i=0; if(have_posts()):while(have_posts()):the_post(); $i++; ?>

        <?php if($i == 0 ): ?>

        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="active"></li>

        <?php else: ?>

        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li>

        <?php endif;?>

        <?php endwhile; endif; wp_reset_query(); ?>

      </ol>

      <!-- Wrapper for slides -->

      <div class="carousel-inner" role="listbox">



        <?php query_posts(array('post_type' => 'slide', 'posts_per_page' => -1,'order'=>'ASC')); ?>



        <?php $i=0; if(have_posts()):while(have_posts()):the_post(); $i++; ?>



          <div class="item <?php if ($i==1) {echo 'active' ;} else { echo 'no-active';} ?>">



          <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>

            <div class="carousel-caption">

              <h3 data-animation="animated bounceInUp"><?php the_content(); ?></h3>
              <a href="<?php the_field('link'); ?>"><button class="btn-sl" data-animation="animated bounceInUp"><?php the_field('button'); ?></button></a>
            </div>

          </div>

        <?php endwhile; endif; ?>

      </div><!-- /.carousel-inner -->

      <!-- Controls -->

      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

        <span class="sr-only">Previous</span>

      </a>

      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

        <span class="sr-only">Next</span>

      </a>

    </div><!-- /.carousel -->



</div><!-- /.container -->





<style type="text/css">

.skyblue {

  background-color: #22c8ff;

}

.deepskyblue {

  background-color: #00bfff;

}

.darkerskyblue {

  background-color: #00a6dd;

}

.carousel-indicators {

  bottom: 0;

}

.carousel-control.right,

.carousel-control.left {

  background-image: none;

}

/*.carousel .item {

  min-height: 350px; 

  height: 100%;

  width:100%; 

}*/

.carousel-caption h3,

.carousel .icon-container,

.carousel-caption button {

background-color: rgba(0, 0, 0, 0.5);

}

.carousel-caption h3 {

  padding: .5em;

}

.carousel .icon-container {

  display: inline-block;

  font-size: 25px;

  line-height: 25px;

  padding: 1em;

  text-align: center;

  border-radius: 50%;

}

.carousel-caption button {

  border-color: #00bfff;

  margin-top: 1em; 

}



/* Animation delays */

.carousel-caption h3:first-child {

  animation-delay: 1s;

}

.carousel-caption h3:nth-child(2) {

  animation-delay: 2s;

}

.carousel-caption button {

  animation-delay: 3s;

}



h1 {

  text-align: center;  

  margin-bottom: 30px;

  font-size: 30px;

  font-weight: bold;

}



.p {

  padding-top: 125px;

  text-align: center;

}



.p a {

  text-decoration: underline;

}

.slide img {

    display: block;

    margin: auto;

  /*  width: 100%;*/

}

</style>

