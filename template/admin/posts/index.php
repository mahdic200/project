<?php

require_once BASE_PATH . "/template/admin/layouts/header.php";

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url("admin/posts/create") ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<div class="table-responsive">
    <?php if ($posts->rowCount() != 0) { ?>
        <table class="table table-striped table-sm">
            <caption>List of posts</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>summary</th>
                    <th>view</th>
                    <th>status</th>
                    <th>user ID</th>
                    <th>cat ID</th>
                    <th>image</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($posts as $post) { ?>
                    <tr>
                        <td>

                            <?= $post["id"] ?>

                        </td>
                        <td>
                            <?= $post["title"] ?>
                        <td>
                            <?= $post["summary"] ?>
                        </td>
                        <td>
                            <?= $post["view"] ?>
                        </td>
                        <td style="display: flex; flex-flow: column; align-items: center;">
                            <?php if ($post["breaking_news"] != 2) { ?>
                                <span class="badge badge-success" style="margin: 5px 0;">#breaking_news</span>
                            <?php } ?>
                            <?php if ($post["selected"] != 2) {  ?>
                                <span class="badge badge-dark">#editor_selected</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?= $post["username"] ?>
                        </td>
                        <td>
                            <?= $post["cat_name"] ?>
                        </td>
                        <td>
                            <img style="width: 80px;" src="<?= asset($post["image"]) ?>" alt="">
                        </td>
                        <td style="width: 25rem;">
                            <a role="button" class="btn btn-sm btn-warning text-dark" style="margin: 5px 0;" href="<?= url("admin/posts/breaking-news/" . $post["id"]); ?>">
                                <?= ($post["breaking_news"] != 2) ? "remove breaking news" : "add breaking news" ?>
                            </a>
                            <a role="button" class="btn btn-sm btn-warning text-dark" href="<?= url("admin/posts/selected/" . $post["id"]) ?>">
                                <?= ($post["selected"] == 1) ? "remove selcted" : "add selected" ?>
                            </a>
                            <hr class="my-1" />
                            <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url("admin/posts/edit/" . $post["id"]) ?>">edit</a>
                            <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url("admin/posts/delete/" . $post["id"]) ?>">
                                delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    <?php } else { ?>
        <center>
            <h1>
                no post found !
            </h1>
            <h6>
                check your DataBase or make a post
            </h6>
        </center>
    <?php } ?>
</div>


<?php

require_once BASE_PATH . "/template/admin/layouts/footer.php";


?>