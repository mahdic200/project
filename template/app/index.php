<!-- header -->
<?php require_once BASE_PATH . "/template/app/layouts/header.php"; ?>
<!-- end of header -->

<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row small-gutters">
                <?php 
                if (isset($topSelectedPosts[0])) { ?>
                    <div class="col-lg-8 top-post-left">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= asset($topSelectedPosts[0]['image']) ?>" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li>
                                    <a href="#">
                                        <?= $topSelectedPosts[0]['category'] ?>
                                    </a>
                                </li>
                            </ul>
                            <a href="image-post.html">
                                <h3>
                                    <?= $topSelectedPosts[0]['title'] ?>
                                </h3>
                            </a>
                            <ul class="meta">
                                <li>
                                    <a href="#">
                                        <?= $topSelectedPosts[0]['username'] ?>
                                        <span class="lnr lnr-user">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?= jalaliDate($topSelectedPosts[0]['created_at']) ?>
                                        <span class="lnr lnr-calendar-full">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?= $topSelectedPosts[0]['comments_count'] ?>
                                        <span class="lnr lnr-bubble">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 top-post-right">
                        <!-- top selected [1] -->
                    <?php }
                if (isset($topSelectedPosts[1])) { ?>
                        <div class="single-top-post">
                            <div class="feature-image-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= asset($topSelectedPosts[1]['image']) ?>" alt="">
                            </div>
                            <div class="top-post-details">
                                <ul class="tags">
                                    <li>
                                        <a href="#">
                                            <?= $topSelectedPosts[1]['category'] ?>
                                        </a>
                                    </li>
                                </ul>
                                <a href="image-post.html">
                                    <h4>
                                        <?= $topSelectedPosts[1]['title'] ?>
                                    </h4>
                                </a>
                                <ul class="meta">
                                    <li>
                                        <a href="#">
                                            <?= $topSelectedPosts[1]['username'] ?>
                                            <span class="lnr lnr-user">
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <?= jalaliDate($topSelectedPosts[1]['created_at']) ?>
                                            <span class="lnr lnr-calendar-full">
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <?= $topSelectedPosts[1]['comments_count'] ?>
                                            <span class="lnr lnr-bubble">
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- top selected [2] -->
                    <?php }
                if (isset($topSelectedPosts[2])) { ?>
                        <div class="single-top-post mt-10">
                            <div class="feature-image-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= url($topSelectedPosts[2]['image']) ?>" alt="">
                            </div>
                            <div class="top-post-details">
                                <ul class="tags">
                                    <li>
                                        <a href="#">
                                            <?= $topSelectedPosts[2]['category'] ?>
                                        </a>
                                    </li>
                                </ul>
                                <a href="image-post.html">
                                    <h4>
                                        <?= $topSelectedPosts[2]['title'] ?>
                                    </h4>
                                </a>
                                <ul class="meta">
                                    <li>
                                        <a href="#">
                                            <?= $topSelectedPosts[2]['username'] ?>
                                            <span class="lnr lnr-user">
                                            </span>
                                        </a>
                                    </li>
                                    <li><a href="#">
                                            <?= jalaliDate($topSelectedPosts[2]['created_at']) ?>
                                            <span class="lnr lnr-calendar-full">
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <?= $topSelectedPosts[2]['comments_count'] ?>
                                            <span class="lnr lnr-bubble">
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <?php if (!empty($breakingNews)) { ?>
                        <div class="col-lg-12">
                            <div class="news-tracker-wrap">
                                <h6>
                                    <span>
                                        خبر فوری:
                                    </span>
                                    <a href="#">
                                        <?= $breakingNews['title'] ?>
                                    </a>
                                </h6>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">آخرین اخبار</h4>
                        <?php foreach ($lastPosts as $lastPost) { ?>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($lastPost['image']) ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li>
                                            <a href="#">
                                                <?= $lastPost['category'] ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="image-post.html">
                                        <h4>
                                            <?= $lastPost['title'] ?>
                                        </h4>
                                    </a>
                                    <ul class="meta">
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-user"></span>
                                                <?= $lastPost['username'] ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <?= jalaliDate($lastPost['created_at']) ?>
                                                <span class="lnr lnr-calendar-full">

                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <?= $lastPost['comments_count'] ?>
                                                <span class="lnr lnr-bubble">

                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="excert">
                                        <?= $lastPost['summary'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- End latest-post Area -->

                    <!-- Start banner-ads Area -->
                    <?php if (!empty($bodyBanner)) { ?>
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="<?= asset($bodyBanner['image']) ?>" alt="">
                        </div>
                    <?php } ?>
                    <!-- End banner-ads Area -->
                    <!-- Start popular-post Area -->
                    <?php if (!empty($popularPosts)) { ?>
                        <div class="popular-post-wrap">
                            <h4 class="title">اخبار پربازدید</h4>
                            <!-- first post -->
                            <?php if (isset($popularPosts[0])) { ?>
                                <div class="feature-post relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= $popularPosts[0]['image'] ?>" alt="">
                                    </div>
                                    <div class="details">
                                        <ul class="tags">
                                            <li>
                                                <a href="#">
                                                    <?= $popularPosts[0]['category'] ?>
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="image-post.html">
                                            <h3>
                                                <?= $popularPosts[0]['title'] ?>
                                            </h3>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#">
                                                    <span class="lnr lnr-user"></span>
                                                    <?= $popularPosts[0]['username'] ?>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <?= jalaliDate($popularPosts[0]['created_at']) ?>
                                                    <span class="lnr lnr-calendar-full"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <?= $popularPosts[0]['comments_count'] ?>
                                                    <span class="lnr lnr-bubble">

                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- box for two next post -->
                            <div class="row mt-20 medium-gutters">
                                <!-- second post -->
                                <?php if (isset($popularPosts[1])) { ?>
                                    <div class="col-lg-6 single-popular-post">
                                        <div class="feature-img-wrap relative">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="<?= $popularPosts[1]['image'] ?>" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li>
                                                    <a href="#">
                                                        <?= $popularPosts[1]['category'] ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="details">
                                            <a href="image-post.html">
                                                <h4>
                                                    <?= $popularPosts[1]['title'] ?>
                                                </h4>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-user"></span>
                                                        <?= $popularPosts[1]['username'] ?></a></li>
                                                <li><a href="#">
                                                        <?= jalaliDate($popularPosts[1]['created_at']) ?>
                                                        <span class="lnr lnr-calendar-full"></span></a></li>
                                                <li><a href="#">
                                                        <?= $popularPosts[1]['comments_count'] ?>
                                                        <span class="lnr lnr-bubble"></span></a></li>
                                            </ul>
                                            <p class="excert">
                                                <?= $popularPosts[1]['summary'] ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- third post -->
                                <?php if (isset($popularPosts[2])) { ?>
                                    <div class="col-lg-6 single-popular-post">
                                        <div class="feature-img-wrap relative">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="<?= $popularPosts[2]['image'] ?>" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li>
                                                    <a href="#">
                                                        <?= $popularPosts[2]['category'] ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="details">
                                            <a href="image-post.html">
                                                <h4>
                                                    <?= $popularPosts[2]['title'] ?>
                                                </h4>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#">
                                                        <span class="lnr lnr-user"></span>
                                                        <?= $popularPosts[2]['username'] ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <?= jalaliDate($popularPosts[2]['created_at']) ?>
                                                        <span class="lnr lnr-calendar-full"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <?= $popularPosts[2]['comments_count'] ?>
                                                        <span class="lnr lnr-bubble"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <p class="excert">
                                            <?= $popularPosts[2]['summary'] ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- end of box -->
                        </div>
                    <?php } ?>
                    <!-- End popular-post Area -->
                </div>
                <!-- sidebar -->
                <?php require_once BASE_PATH . "/template/app/layouts/sidebar.php"; ?>
                <!-- end of sidebar -->
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>

<!-- start footer Area -->
<?php require_once BASE_PATH . "/template/app/layouts/footer.php"; ?>