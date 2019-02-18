<?php get_header(); ?>

<div class="container">

    <div class="row">
        <div class="col-md-9 content_col">
            <h2 class="page-title">Error 404 - Page Not Found</h2>
            <div class="entry_content">
                <p>Trang bạn vừa truy cập hiện không tồn tại, vui lòng chọn <a href="<?php echo home_url('/'); ?>">Vào đây </a> để quy về trang chủ</p>
            </div>
        </div>

        <div class="col-md-3 sidebar_col">
            <?php get_sidebar() ?>
        </div>

    </div>

</div>


<?php get_footer(); ?>