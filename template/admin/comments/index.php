<?php

require_once BASE_PATH . "/template/admin/layouts/header.php";

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Comments</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="#" class="btn btn-sm btn-success disabled">create</a>
    </div>
</div>
<section class="table-responsive">
    <?php if ($comments->rowCount() != 0) { ?>
        <table class="table table-striped table-sm">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>user ID</th>
                    <th>post ID</th>
                    <th>comment</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment) { ?>
                   
                    <tr>
                        <td>
                            <?= $comment["id"] ?>
                        </td>
                        <td>
                            <?= $comment["username"] ?>
                        </td>
                        <td>
                            <?= $comment["post_title"] ?>
                        </td>
                        <td>
                            <a href="<?= url("admin/comments/showComment/" . $comment["id"]) ?>">
                                <?= $comment["comment"] ?>
                            </a>
                        </td>
                        <td>
                            <?= $comment["status"] ?>
                        </td>
                        <td>
                            <?php if ($comment["status"] != "approved") {  ?>
                                <a role="button" class="btn btn-sm btn-success text-white" href="<?= url("admin/comments/changeStatus/" . $comment["id"]) ?>">click to approved</a>
                            <?php } else { ?>
                                <a role="button" class="btn btn-sm btn-warning text-white" href="<?= url("admin/comments/changeStatus/" . $comment["id"]) ?>">click not to approved</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <center>
            <h1>
                no comment found !
            </h1>
            <h6>
                check your DataBase or write a comment
            </h6>
        </center>
    <?php } ?>
</section>


<?php

require_once BASE_PATH . "/template/admin/layouts/footer.php";


?>