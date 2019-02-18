<div class="col-md-4 col-sm-6">
    <div class="tour_box">
        <div class="thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbmd', array('class' => 'img-responsive')); ?></a>
             <!-- <a href="<?php the_permalink(); ?>"><button class="view">View tour</button></a> -->
        </div>
        <div class="tour_if">
            <div class="col-tour">
                <h3 class="title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="tinfo">
                    <div class="price">
                        <p class="line1"><?php the_field('address') ?></p>
                        <?php $price_nomal = get_field('price');$price_sale = get_field('sale_price');?>
                        <p class="t_price"><?php if($price_sale){ ?><?php echo fl_price_format($price_sale);?><?php } else { ?><?php echo fl_price_format($price_nomal);?><?php } ?> <?php if(empty($price_nomal)&&empty($price_sale)){ echo 'Liên hệ';} else { echo  'VNĐ';} ?></p>
                    </div>
                    <div class="day">
                        <!-- <p><?php the_field('time'); ?></p> <p class="day_text"> day</p> -->
                        <p><?php the_field('time');?> days</p> <p class="day_text cus"><a href="<?php the_permalink(); ?>">View tour</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>