<div class="col-lg-4">
    <div class="sidebars-area">
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">انتخاب سردبیر</h6>
            <!-- single top sidebar post -->
            <?php if (!empty($topSelectedPosts)) { ?>
                <div class="editors-pick-post">
                    <div class="feature-img-wrap relative">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="
                                <?= asset($topSelectedPosts[0]['image']) ?>" alt="">
                        </div>
                        <ul class="tags">
                            <li>
                                <a href="#">
                                    <?= $topSelectedPosts[0]['category'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="details">
                        <a href="image-post.html">
                            <h4 class="mt-20">
                                <?= $topSelectedPosts[0]['title'] ?>
                            </h4>
                        </a>
                        <ul class="meta">
                            <li>
                                <a href="#">
                                    <span class="lnr lnr-user"></span>
                                    <?= $topSelectedPosts[0]['username'] ?>
                                </a>
                            </li>
                            <li><a href="#">
                                    <?= jalaliDate($topSelectedPosts[0]['created_at']) ?>
                                    <span class="lnr lnr-calendar-full"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?= $topSelectedPosts[0]['comments_count'] ?>
                                    <span class="lnr lnr-bubble"></span>
                                </a>
                            </li>
                        </ul>
                        <p class="excert">
                            <?= $topSelectedPosts[0]['summary'] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
            <!-- end of single top sidebar post -->
        </div>

        <?php if (!empty($sidebarBanner)) { ?>
            <div class="single-sidebar-widget ads-widget">
                <img class="img-fluid" src="<?= asset($bodyBanner['image']) ?>" alt="">
            </div>
        <?php } ?>

        <?php if (!empty($mostCommentPosts)) { ?>
            <div class="single-sidebar-widget most-popular-widget">
                <h6 class="title">پر بحث ترین ها</h6>
                <?php foreach ($mostCommentPosts as $mostCommentPost) { ?>
                    <div class="single-list flex-row d-flex">
                        <div class="thumb sidebar-commentedposts-img">
                            <img src="<?= asset($mostCommentPost['image']) ?>" alt="">
                        </div>
                        <div class="details">
                            <a href="image-post.html">
                                <h6>
                                    <?= $mostCommentPost['title'] ?>
                                </h6>
                            </a>
                            <ul class="meta">
                                <li><a href="#">
                                        <?= jalaliDate($mostCommentPost['created_at']) ?>
                                        <span class="lnr lnr-calendar-full"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?= $mostCommentPost['comments_count'] ?>
                                        <span class="lnr lnr-bubble"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>
</div>