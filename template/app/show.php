<!-- header -->
<?php require_once BASE_PATH . "/template/app/layouts/header.php"; ?>
<!-- end of header -->


<div class="site-main-container">
    <!-- Start top-post Area -->
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <!-- main -->
                <div class="col-lg-8 post-list">
                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <div class="feature-img-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= asset($post['image']) ?>" alt="">
                        </div>
                        <div class="content-wrap">
                            <ul class="tags mt-10">
                                <li><a href="#">
                                        <?= $post['category'] ?>
                                    </a>
                                </li>
                            </ul>
                            <a href="#">
                                <h3>
                                    <?= $post['title'] ?>
                                </h3>
                            </a>
                            <ul class="meta pb-20">
                                <li>
                                    <a href="#">
                                        <span class="lnr lnr-user"></span>
                                        <?= $post['username'] ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?= jalaliDate($post['created_at']) ?>
                                        <span class="lnr lnr-calendar-full"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?= $post['comments_count'] ?>
                                        <span class="lnr lnr-bubble"></span>
                                    </a>
                                </li>
                            </ul>
                            <?= $post['body'] ?>

                            <div class="navigation-wrap justify-content-between d-flex">
                                <?php if (!empty($nextPost)) { ?>
                                    <a class="prev" href="<?= url('show-post/' . $nextPost['id']) ?>">
                                        <span class="lnr lnr-arrow-right"></span>خبر بعدی
                                    </a>
                                <?php }
                                if (!empty($previousPost)) { ?>
                                    <a class="next" href="<?= url('show-post/' . $previousPost['id']) ?>">
                                        خبر قبلی
                                        <span class="lnr lnr-arrow-left"></span>
                                    </a>
                                <?php } ?>
                            </div>

                            <div class="comment-sec-area">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h6>نظرات</h6>
                                        <!-- comment -->
                                        <?php if (!empty($relatedComments)) {
                                            foreach ($relatedComments as $comment) {
                                        ?>
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">

                                                            <div class="desc">
                                                                <h5>
                                                                    <a href="#">
                                                                        <?= $comment['username'] ?>
                                                                    </a>
                                                                </h5>
                                                                <p class="date mt-3">
                                                                    <?= jalaliDate($comment['created_at']) ?>
                                                                </p>
                                                                <p class="comment">
                                                                    <?= $comment['comment'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>
                                        <!-- end of comment -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h4>درج نظر جدید</h4>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <form action="<?= url('comment-store') ?>" method="POST">
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="comment" placeholder="متن نظر" onfocus="this.placeholder = ''" onblur="this.placeholder = 'متن نظر'" required=""></textarea>
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['user'] ?>" style="display: none;">
                                        <input type="hidden" name="post_id" value="<?= $id ?>" style="display: none;">
                                    </div>
                                    <button type="submit" class="primary-btn text-uppercase">ارسال</button>
                                </form>
                            <?php } else {?>
                            <center>
                                <h4>
                                    لطفا برای ارسال نظر ابتدا 
                                    <a href="<?= url('login') ?>">وارد</a>
                                    سایت شوید یا
                                    <a href="<?= url("register") ?>">ثبت نام</a>
                                    کنید .
                                </h4>
                            </center>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- End single-post Area -->
                </div>
                <!-- end main -->
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
<!-- end footer Area -->