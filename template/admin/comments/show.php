<?php

require_once BASE_PATH . "/template/admin/layouts/header.php";

?>


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Show Comment</h1>
</section>
<section class="row my-3">
    <section class="col-12">
        <h1 class="h4 border-bottom">
            <?= $comment["comment"] ?>
        </h1>
        <p class="border-bottom">
            <span style="margin-right: 15px;">Author : </span>
            <?= $comment["username"] ?>
        </p>
        <p class="border-bottom">
            <span style="margin-right: 15px;">underPost : </span>
            <a href="<?= url("/path/to/post/" . $comment["post_id"]) ?>">
                <?= $comment["post_title"] ?>
            </a>
        </p>
        <p class="border-bottom">
            <span style="margin-right: 15px;">Status : </span>
            <?= $comment["status"] ?>
        </p>
        <p class="border-bottom">
            <span style="margin-right: 15px;">Created_at : </span>
            <?= jalaliDate($comment["created_at"]) ?>
            <span> , </span>
            <?= jalaliDate($comment["created_at"], "%B %d") ?>
        </p>
        <p class="border-bottom">
            <span style="margin-right: 15px;">Updated_at : </span>
            <?= jalaliDate($comment["updated_at"]) ?>
            <span> , </span>
            <?= jalaliDate($comment["updated_at"], "%B %d") ?>
        </p>
        <?php if ($comment["status"] != "approved") {  ?>
            <a role="button" class="btn btn-sm btn-success text-white" href="<?= url("admin/comments/changeStatus/" . $comment["id"]) ?>">click to approved</a>
        <?php } else { ?>
            <a role="button" class="btn btn-sm btn-warning text-white" href="<?= url("admin/comments/changeStatus/" . $comment["id"]) ?>">click not to approved</a>
        <?php } ?>

    </section>
</section>



<?php

require_once BASE_PATH . "/template/admin/layouts/footer.php";


?>