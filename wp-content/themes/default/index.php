<?php
/*
* Template Name: Blog
*/
?>
<?php get_header(); // This fxn gets the header.php file and renders it  ?>
<div class="container">
    <div class="row">
        <div class="col-md-9 content_col">
            <h2 class="page-title"><span><?php the_title(); ?></span></h2>
            <div class="row_posts">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                <?php include 'template/row_post.php'; ?>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3 sidebar_col">
            <?php include_once 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>