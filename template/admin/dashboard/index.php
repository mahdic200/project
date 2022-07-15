<?php

require_once BASE_PATH . "/template/admin/layouts/header.php";

?>


<div class="row mt-3">

    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/category') ?>" class="text-decoration-none">
            <div class="card text-white bg-gradiant-green-blue mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-clipboard-list">

                        </i>
                        Categories
                    </span>
                    <span class="badge badge-pill right">
                        <!-- number of categories -->
                        <?= $categoryCount["COUNT(*)"] ?>
                    </span>
                </div>
                <div class="card-body">
                    <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> GO TO Categories!</section>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/users') ?>" class="text-decoration-none">
            <div class="card text-white bg-juicy-orange mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-users">

                        </i>
                        Users
                    </span>
                    <span class="badge badge-pill right">
                        <!-- number of users -->
                        <?= $userCount["COUNT(*)"] ?>

                    </span>
                </div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class="">
                            <i class="fas fa-users-cog">

                            </i>
                            Admin
                            <span class="badge badge-pill mx-1">
                                <!-- number of Admins -->
                                <?= $adminCount["COUNT(*)"] ?>

                            </span>
                        </span>
                        <span class="">
                            <i class="fas fa-admin">

                            </i>
                            All Users
                            <span class="badge badge-pill mx-1">
                                <!-- number of all users -->
                                <?= $allusersCount["COUNT(*)"] ?>

                            </span>
                        </span>
                    </section>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/posts') ?>" class="text-decoration-none">
            <div class="card text-white bg-dracula mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <span>
                        <i class="fas fa-newspaper">

                        </i>
                        Article
                    </span>
                    <span class="badge badge-pill right">
                        <!-- number of posts -->
                        <?= $postCount["COUNT(*)"] ?>

                    </span>
                </div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class="">
                            <i class="fas fa-bolt">

                            </i>
                            Views
                            <span class="badge badge-pill mx-1">
                                <!-- number of Admins -->
                                <?= $postsViews["SUM(view)"] ?>

                            </span>
                        </span>
                    </section>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/comments') ?>" class="text-decoration-none">
            <div class="card text-white bg-neon-life mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-comments">

                        </i>
                        Comment
                    </span>
                    <span class="badge badge-pill right">
                        <!-- number of comments -->
                        <?= $commentCount["COUNT(*)"] ?>

                    </span>
                </div>
                <div class="card-body">
                    <!--                        <h5 class="card-title">Info card title</h5>-->
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class="">
                            <i class="far fa-eye-slash">

                            </i>
                            Unseen
                            <span class="badge badge-pill mx-1">
                                <!-- number of comments -->
                                <?= $unseenComments["COUNT(*)"] ?>

                            </span>
                        </span>
                        <span class="">
                            <i class="far fa-check-circle">

                            </i>
                            Approved
                            <span class="badge badge-pill mx-1">
                                <!-- number of comments -->
                                <?= $approvedComments["COUNT(*)"] ?>

                            </span>
                        </span>
                    </section>
                </div>
            </div>
        </a>
    </div>

</div>


<div class="row mt-2">
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most viewed posts
        </h2>
        <div class="table-responsive">
            <?php if ($mostViewedPosts != null) { ?>
                <!-- most viewed posts table -->
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>view</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($mostViewedPosts as $mostViewedPost) {

                        ?>
                            <tr>
                                <td>
                                    <a class="text-primary" href="">
                                        <?= $mostViewedPost['id'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $mostViewedPost['title'] ?>
                                </td>
                                <td>
                                    <span class="badge badge-secondary">
                                        <?= $mostViewedPost['view'] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <!-- end of most viewed posts table -->
            <?php } else { ?>
                <center>
                    <h4 class="mt-5">
                        found nothing !
                    </h4>
                    <p>
                        check your database or make a post
                    </p>
                </center>
            <?php } ?>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most commented posts

        </h2>
        <div class="table-responsive">
            <?php if ($mostCommentedPosts != null) { ?>
                <!-- most commented posts -->
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mostCommentedPosts as $mostCommentedPost) {

                        ?>

                            <tr>
                                <td>
                                    <a class="text-primary" href="">
                                        <?= $mostCommentedPost['id']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $mostCommentedPost['title']; ?>
                                </td>
                                <td>
                                    <span class="badge badge-success">
                                        <?= $mostCommentedPost['comments_number']; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <!-- end of most commented posts -->
            <?php } else { ?>
                <center>
                    <h4 class="mt-5">
                        found nothing !
                    </h4>
                    <p>
                        check your database or make a post
                    </p>
                </center>
            <?php } ?>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Comments
        </h2>
        <div class="table-responsive">
            <?php if ($recentComments) { ?>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>username</th>
                            <th>comment</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recentComments as $recentComment) {
                        ?>

                            <tr>
                                <td>
                                    <a class="text-primary" href="">
                                        <?= $recentComment['id'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $recentComment['username'] ?>
                                </td>
                                <td>
                                    <?= $recentComment['comment'] ?>
                                </td>
                                <td>
                                    <span class="badge badge-warning">
                                        <?= $recentComment['status'] ?>

                                    </span>
                                </td>
                            </tr>
                        <?php  } ?>

                    </tbody>
                </table>
            <?php } else { ?>
                <center>
                    <h4 class="mt-5">
                        found nothing !
                    </h4>
                    <p>
                        check your database or write a comment
                    </p>
                </center>
            <?php } ?>
        </div>
    </div>
</div>



<?php

require_once BASE_PATH . "/template/admin/layouts/footer.php";


?>